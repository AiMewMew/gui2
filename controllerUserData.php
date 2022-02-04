<?php
//This Pages controls all management
session_start();
require "connection.php";
$errors = array();
$success = array();


if (isset($_POST['submitMessageForm'])) {
    
    $clientEmail = mysqli_real_escape_string($con, $_POST['Email']);
    $Subject = mysqli_real_escape_string($con, $_POST['Subject']);
    $Message = mysqli_real_escape_string($con, $_POST['Message']);
    $From = 'malikzada624@gmail.com';

            
      $retval = mail ($clientEmail,$Subject,$Message,$From);
       if( $retval == true ) 
       {
         $success['success'] = 'Your Message is successfuly Sent.!';
        } 
    else {
      $errors['mail-error'] = 'UserEmail is not Valid!';
    }
      
}


if(isset($_POST['Signup'])){
    $UserName = mysqli_real_escape_string($con, $_POST['UserName']);
    $UserEmail = mysqli_real_escape_string($con, $_POST['UserEmail']);
    $UserPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $ConfirmUserPassword = mysqli_real_escape_string($con, $_POST['ConfirmUserPassword']);

    $UserNameQuery = "SELECT * FROM users_tb  WHERE UserName = '$UserName'";
    $ResultUserName = mysqli_query($con, $UserNameQuery);
    $UserEmailQuery = "SELECT * FROM users_tb  WHERE UserEmail = '$UserEmail'";
    $ResultUserEmail = mysqli_query($con, $UserEmailQuery);

 
     if (mysqli_num_rows($ResultUserEmail) > 0) {
        $errors['Email'] = "UserEmail  that you have entered is already used.";
        if ($UserPassword !== $ConfirmUserPassword)
            $errors['UserPassword'] = "Password does't matched.";
    } else if ($UserPassword !== $ConfirmUserPassword) {
        $errors['UserPassword'] = "Password does't matched.";
    }
    else{
         $code = 0;
         $UserStatus = "verified";

        $UserPassword = password_hash($UserPassword, PASSWORD_BCRYPT);
        $InsertQuery = " INSERT INTO `users_tb` 
        (`UserId`, `UserName`, `UserEmail`, `UserPassword`,  `UserCode`, `UserStatus` , `UserType`)
              VALUES (NULL, '$UserName', '$UserEmail',  '$UserPassword', '$code', '$UserStatus','User')";
        $CheckQuery = mysqli_query($con, $InsertQuery);

        if ($CheckQuery) {
            $success['success'] = "Your account is successfuly created. <br> Now you can login..!";
        }
        else{
            $errors['error'] = "Failed To Insert data in database..!";
        }
    }
}

if(isset($_POST['Login'])){
    $email = mysqli_real_escape_string($con, $_POST['UserEmail']);
    $password = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $check_email = "SELECT * FROM users_tb WHERE UserEmail = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['UserPassword'];
        $status = $fetch['UserStatus'];
        $code = $fetch['UserCode'];
        if (password_verify($password, $fetch_pass)) {
        if ($status == 'verified' && $code==0) {
            $_SESSION['id'] = $fetch['UserId'];
            $_SESSION['name'] = $fetch['UserName'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['type'] =  $fetch['UserType'];
            if($fetch['UserType']=='User')
            header("location: Home.php");
            else
            header("location: Admin.php");
        }else
        {
            $errors['email'] = "It's look like you haven't still verify your email  $email";
        }
    }else
    {
        $errors['email'] = "Incorrect email or password!";
    }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
       
    }
}

if(isset($_POST['Forgot'])){
    $email = mysqli_real_escape_string($con, $_POST['UserEmail']);
    $check_email = "SELECT * FROM users_tb WHERE UserEmail='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE users_tb SET UserCode = $code WHERE UserEmail = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $_SESSION['email'] = $email;
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "malikzada624@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: index.php?PageName=ResetCode');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    }
    else {
        $errors['email'] = "This email address does not exist!";
    }
}

if (isset($_POST['Otp'])) {

    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM users_tb WHERE UserCode = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['UserEmail'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: index.php?PageName=NewPassword');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
if (isset($_POST['ChangePassword'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $password = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE users_tb SET UserCode = $code, UserPassword = '$password' WHERE UserEmail = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            //header('Location: index.php?PageName=PasswordChanged');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

if(isset($_POST['UpdateAccount'])){
    $UserName = mysqli_real_escape_string($con, $_POST['UserName']);
    $UserPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
    $ConfirmUserPassword = mysqli_real_escape_string($con, $_POST['ConfirmUserPassword']);
    if ($UserPassword !== $ConfirmUserPassword)
    {
        $errors['UserPassword'] = "Password does't matched.";
    }
    else{
        $UserPassword = password_hash($UserPassword, PASSWORD_BCRYPT);
        $email = $_SESSION['email'];
        $update_pass = "UPDATE users_tb SET UserName = '$UserName', UserPassword = '$UserPassword' WHERE UserEmail = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $_SESSION['name'] = $UserName;
            $success['success'] = "Your account is successfuly updated..";
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
if (isset($_POST['RemoveAccount'])) {
    $UserId = $_POST['UserId'];
    $sql = "DELETE FROM users_tb  WHERE UserId = $UserId ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success['success'] =" User Account Is Successfully Deleted.!";
    } else {
        $errors['error'] = "Failed while deleting User Account.";
    }

}
if (isset($_POST['AddCategory'])) {
    $CategoryName = mysqli_real_escape_string($con, $_POST['CategoryName']);

    $CategoryNameQuery = "SELECT * FROM category_tb  WHERE CategoryName = '$CategoryName'";
    $ResultCategoryName = mysqli_query($con, $CategoryNameQuery);

 
     if (mysqli_num_rows($ResultCategoryName) > 0) {
        $errors['cateError'] = "This category is already exist..!";
     }else{
        $InsertQuery = "INSERT INTO `category_tb` (`CategoryId`, `CategoryName`) VALUES (NULL, '$CategoryName') ";
        $CheckQuery = mysqli_query($con, $InsertQuery);
        if ($CheckQuery) {
            $success['success'] = "Category is successfuly added..!";
        }
        else{
            $errors['error'] = "Failed To Insert data in database..!";
        }
     }
  
}

if (isset($_POST['UpdateCategory'])) {
    $CategoryName = mysqli_real_escape_string($con, $_POST['CategoryName']);
    $CategoryId = mysqli_real_escape_string($con, $_POST['CategoryId']);
    $CategoryNameQuery = "SELECT * FROM category_tb  WHERE CategoryName = '$CategoryName'";
    $ResultCategoryName = mysqli_query($con, $CategoryNameQuery);

 
     if (mysqli_num_rows($ResultCategoryName) > 0) {
        $errors['cateError'] = "This category is already exist..!";
     }else{
        $Query = "UPDATE `category_tb` SET  CategoryName = '$CategoryName' WHERE CategoryId=$CategoryId ";
        $CheckQuery = mysqli_query($con, $Query);
        if ($CheckQuery) {
            $success['success'] = "Category is successfuly updated.!";
        }
        else{
            $errors['error'] = "Failed to update category..!";
        }
     }
  
}

if (isset($_POST['RemoveCategory'])) {
    $CategoryId = mysqli_real_escape_string($con, $_POST['CategoryId']);
    $sql = "DELETE FROM category_tb  WHERE CategoryId = $CategoryId ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success['success'] = " Category Is Successfully Deleted.!";
        
    } else {
        $errors['error'] = " Failed while deleting Category.!";
    }

}
if (isset($_POST['PostComment'])) {
   
    $PostName = mysqli_real_escape_string($con, $_POST['PostName']);
    $PostDescription = mysqli_real_escape_string($con, $_POST['PostDescription']);
    $PostBody = mysqli_real_escape_string($con, $_POST['PostBody']);
    $sql = "INSERT INTO `post_tb` (`Id`, `Name`, `Description`, `Body`) VALUES (NULL, '$PostName', '$PostDescription', '$PostBody') ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success['success'] = " Your comment is posted.!";
        
    } else {
        $errors['error'] = " Failed while posting comment.!";
    }
}

if (isset($_POST['UpdateComment'])) {
   
    $PostId = mysqli_real_escape_string($con, $_POST['PostId']);
    $PostDescription = mysqli_real_escape_string($con, $_POST['PostDescription']);
    $PostBody = mysqli_real_escape_string($con, $_POST['PostBody']);
    $sql = "UPDATE `post_tb` SET Description = '$PostDescription' , Body = '$PostBody'  WHERE Id = $PostId ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success['success'] = " Your comment is successfuly updated.!";
        
    } else {
        $errors['error'] = " Failed while updating posting .!";
    }
}

if (isset($_POST['DeleteComment'])) {
   
    $PostId = mysqli_real_escape_string($con, $_POST['PostId']);
    $sql = "DELETE FROM post_tb  WHERE Id = $PostId ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success['success'] = " Post Is Successfully Deleted.!";
        
    } else {
        $errors['error'] = " Failed while deleting Post.!";
    }
}
if (isset($_POST['UploadPhoto'])) {
   
    $PhotoType = mysqli_real_escape_string($con, $_POST['PhotoType']);
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $temp_name = $_FILES['file']['tmp_name'];
    $Description = mysqli_real_escape_string($con, $_POST['Description']);
    $allowed =  array('image/gif','image/png' ,'image/jpg', 'image/jpeg','image/pdf');
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_destination = "upload/" . $file_name;
    if (!in_array($file_type,$allowed)) {
        $errors['error'] =$file_type;
    } else
    if (move_uploaded_file($temp_name, $file_destination)) {

        $q = "INSERT INTO `image_tb` (`Id`, `PhotoType`, `PhotoUrl`, `Description`)
         VALUES (NULL, '$PhotoType', '$file_name', '$Description')";

        if (mysqli_query($con, $q)) {
            $success['success'] = "photo uploaded successfuly.";
        } else {

            $errors['error'] = "Something went wrong??";
        }
    } 

}
if (isset($_POST['UploadVideo'])) {
   
    $PhotoType = mysqli_real_escape_string($con, $_POST['PhotoType']);
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $temp_name = $_FILES['file']['tmp_name'];
    $Description = mysqli_real_escape_string($con, $_POST['Description']);
   
    $file_destination = "upload/" . $file_name;
    if ($file_type != 'video/mp4') {
        $errors['error'] =$file_type;
    } else
    if (move_uploaded_file($temp_name, $file_destination)) {

        $q = "INSERT INTO `video_tb` (`Id`, `VideoType`, `VideoUrl`, `Description`)
         VALUES (NULL, '$PhotoType', '$file_name', '$Description')";

        if (mysqli_query($con, $q)) {
            $success['success'] = "Video uploaded successfuly.";
        } else {

            $errors['error'] = "Something went wrong??";
        }
    } 

}
?>