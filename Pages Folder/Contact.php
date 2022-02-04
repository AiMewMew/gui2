<header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>CONTACT WITH US TODAY</h1>
               
                    <div class="form-container">
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
                        <form method='post'>
                           
                            <div class="form-group">
                            <input type="text" name="Email"  id="Email"   placeholder='Enter your email' class="form-control" required>
                            </div>
                            <div class="form-group">
                            <input type="text" name="Subject" placeholder='Enter subject' id="Subject"   class="form-control" required>
                            </div>
                            <div class="form-group">
                            <textarea type="text" name="Message" placeholder='Enter message' id="Message"   class="form-control" required rows="5"></textarea>
                            </div>
                            <div class="form-group">
                            <input  type="submit" class="form-control-submit-button"  name="submitMessageForm" value="Send" required>
                            </div>

                            <div class="form-group">
                            <input  type="reset" class="form-control-submit-button"   value="Reset" required>
                            </div>
                          
                            
                           
                          
    
                           
                        </form>
                    </div> <!-- end of form container -->
                    
                    

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->



   


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">All Rights Reserved. </p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->