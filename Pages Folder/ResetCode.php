 <!-- Header -->
 <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Otp Code</h1>
                
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
                            <input class="form-control" type="number" name="otp" placeholder="Enter  otp code" onkeypress="return /[0-9]/i.test(event.key)" required>
                            </div>
                           
                            <div class="form-group">
                                <input type="submit" class="form-control-submit-button" name="Otp" value='Submit' >
                            </div>
                            
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->