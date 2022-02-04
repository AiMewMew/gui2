 <!-- Header -->
 <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Forgot Password</h1>
                    <p>You don't have a password? Then please <a class="white" href="index.php?PageName=Signup">Sign Up</a> </p>
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
                                <input type="submit" class="form-control-submit-button" name="Forgot" value='Continue' >
                            </div>
                            
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->