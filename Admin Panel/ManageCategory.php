<header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>ADD CATEGORY </h1>
                    <div class="form-group">
                    
                     <!-- Sign Up Form -->
                    <div class="form-container">
                        <form method='post'>
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
                            </div>
                             <div class="form-group">
                                
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="CategoryName" required>
                                <label class="label-control" for="catname">Category Name</label>
                                <div class="text-danger h6">
                                    <?php
                                       if(isset($errors['cateError'])){
                                           echo $errors['cateError'];
                                       }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                            <input type="submit" class="form-control-submit-button" name="AddCategory" value='Add Category' >
                               
                            </div>
                            </div>
                
                        </form>
                    
                                
                            
                            <div class="form-group">
                                 <a class=" form-control btn-outline-lg " href="Admin.php?PageName=UpdateCategory"> Update Category</a>
                           </div>

                           <div class="form-group">
                                 <a class=" form-control btn-outline-lg " href="Admin.php?PageName=DeleteCategory"> Remove Category</a>
                           </div>
                            
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