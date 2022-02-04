<header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>UPLOAD VIDEO</h1>
                   
                    <!-- Sign Up Form -->
                    <div class="form-container">
                    <div class="form-group  text-danger h6">
                    <?php
          if (isset( $errors['error'])) {
          ?>
            <div class="alert alert-danger text-center p-2">
              <?php
                echo $errors['error'];
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
                        <form method='post' enctype="multipart/form-data">
                            
                            
                             <div class="form-group">
                                <select class="form-control-input" name='PhotoType'>
                               <option>  </option>
                                <option>Personal </option>
                                <option>Incident </option>
                                <option> Technology </option>
                                </select>
                                <label class="label-control" for="posttype">Video Type</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-input" name='file' required>
                                <label class="label-control" for="photo">Choose Video</label>
                                <div class="help-block with-errors"></div>
                            </div>
                             <div class="form-group">
                                <input type="text" class="form-control-input" name='Description' required>
                                <label class="label-control" for="descr"> Description</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            
                            <div class="form-group">
                            <input type="submit" class="form-control-submit-button" value="Upload Video" name="UploadVideo" >
                            </div>
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

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