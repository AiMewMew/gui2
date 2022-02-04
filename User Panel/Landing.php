 <!-- Header -->
 <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>WELCOME 
                        <?php echo $_SESSION['name'];?>
                    </h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                       
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->



    
  
        <div class="container">
            <div class="row"><!-- end of col -->
            <div class="col-lg-3"></div>
            <div class="col-lg-7 mt-3">
            <?php
                $Query = "SELECT * FROM video_tb ";
                $Result = mysqli_query($con, $Query);
                while ($data = mysqli_fetch_assoc($Result)) {
                  ?>

               <div class="card mt-3">
                <div class="card-header h3">
                   <?php
                      echo $data['VideoType']; 
                   ?>
                </div>
                <div class="card-body" align='center'>
                    <div class="lead">
                    <?php
                      echo $data['Description']; 
                   ?>
                    </div>
                    <video width="100%" controls>
                            <source src="<?php echo  'upload/' . $data['VideoUrl']; ?>" type="video/mp4">
                    </video>
                </div>
                 </div>
                  <?php
                }
            ?>
            <?php
                $Query = "SELECT * FROM image_tb ";
                $Result = mysqli_query($con, $Query);
                while ($data = mysqli_fetch_assoc($Result)) {
                  ?>

               <div class="card mt-3">
                <div class="card-header h3">
                   <?php
                      echo $data['PhotoType']; 
                   ?>
                </div>
                <div class="card-body" align='center'>
                    <div class="lead">
                    <?php
                      echo $data['Description']; 
                   ?>
                    </div>
                    <img src='upload/<?php echo $data['PhotoUrl']; ?>'  height='500px' width='500px'>
                </div>
                 </div>
                  <?php
                }
            ?>
         

            </div>
            
            </div> <!-- end of row -->
        </div> <!-- end of container -->



  
