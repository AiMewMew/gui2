<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location:index.php');
}
?>
 <!-- Header -->
 <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>New Password</h1>
                
                    <!-- Sign Up Form -->
                    <div class="form-container">

                    <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                            <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center p-2">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                        <form  method="post">
                            <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                            </div>
                           
                            <div class="form-group">
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                            </div>
                            <div class="form-group">
                            <input class="form-control-submit-button" type="submit" name="ChangePassword" value="Change">
                                
                            </div>
                            
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->