
<!-- Header -->
<header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>SIGN UP</h1>
                   <p>Fill out the form below to sign up. <br>Already signed up? Then just <a class="white" href="index.php?PageName=Login">Log In</a></p> 
                    <!-- Sign Up Form -->
                    <div class="form-container">
                        <form  method="POST" >
                            <div class="form-group  text-danger h6">
                            <?php
          if (count($errors) > 0) {
          ?>
            <div class="alert alert-danger text-center p-2">
              <?php
                echo "Please Enter valid Information..!";
              ?>
            </div>
          <?php
          }if(isset( $success['success'])){
              ?>
          <div class="alert alert-success text-center p-2">
              <?php
                echo  $success['success'];
              ?>
            </div>
              <?php
          }
          ?>
                            </div>
                           <div class="form-group">
                                <input type="email" class="form-control-input" name="UserEmail"  required>
                                <label class="label-control" for="semail">Email</label>
                                <div class="text-danger h6">
                                    <?php
                                       if(isset($errors['Email'])){
                                           echo $errors['Email'];
                                       }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control-input" onkeypress="return /[a-zA-z]/i.test(event.key)" name="UserName" required>
                                <label class="label-control" for="sname">Name</label>
                            </div>
                             
                            <div class="form-group">
                                <input type="password" class="form-control-input"  name="UserPassword"  required>
                                <label class="label-control" for="spassword">Password</label>
                            
                            </div>
                        
                            
                            <div class="form-group">
                                <input type="password" class="form-control-input"  name="ConfirmUserPassword" required>
                                <label class="label-control" for="spassword">Re-Password</label>
                                <div class="text-danger h6">
                                    <?php
                                       if(isset($errors['UserPassword'])){
                                           echo $errors['UserPassword'];
                                       }
                                    ?>
                                </div>
                            </div>
                     
                            
                            <div class="form-group">
                                <input type="submit" class="form-control-submit-button" name="Signup" >
                            </div>
                        
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->