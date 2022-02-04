 <!-- Header -->
 <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Log In</h1>
                   <p>You don't have a password? Then please <a class="white" href="index.php?PageName=Signup">Sign Up</a> 
                   
                   <br>If You forgot password? Click <a class="white" href="index.php?PageName=Forgot">Here </a></p>
                    <!-- Sign Up Form -->
                    <div class="form-container">
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
                                <input type="email" name="UserEmail" class="form-control-input"  required>
                                <label class="label-control" for="lemail">Email</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" name="UserPassword" required>
                                <label class="label-control" for="lpassword">Password</label>
    
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control-submit-button" name="Login" value='Login' >
                            </div>
                            
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->