<?php include 'inc/header.php';

  $id           = $_GET['id'];
  $update       = "SELECT * FROM slider WHERE id = $id";
  $update_query = mysqli_query($db, $update);
  $after_assoc  = mysqli_fetch_assoc($update_query);

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
  <!-- sl-pagebody Start-->
      <div class="sl-pagebody">
         <?php 
      //logo Inserted msg
        if (isset($_SESSION['insert'])) {
         ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>
              <?php 
                echo $_SESSION['insert'];
                unset($_SESSION['insert']);
               ?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
       }
       ?>
      <?php 
      //logo updated msg
        if (isset($_SESSION['update'])) {
         ?>
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>
              <?php 
                echo $_SESSION['update'];
                unset($_SESSION['update']);
               ?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
       }
       ?>
       <?php 
      //logo updated msg
        if (isset($_SESSION['warning'])) {
         ?>
          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>
              <?php 
                echo $_SESSION['warning'];
                unset($_SESSION['warning']);
               ?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php 
       }
       ?>
    
        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Update Slider</h6>
                  <form action="slider-update-post.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                  <label class="col-sm-4 form-control-label">Banner:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Title:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="title" class="form-control" value="<?= $after_assoc['title'] ?>" placeholder="Enter Your Text Logo">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">More:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="more" class="form-control" value="<?= $after_assoc['more'] ?>" placeholder="Enter Your Text Logo">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Content:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <textarea class="form-control" name="content" placeholder="Type your content" value="<?= $after_assoc['content'] ?>"></textarea>
                  </div>
                </div>
                <div class="form-layout-footer mg-t-30">
                  <button class="btn btn-info mg-r-5 float-right" style="cursor: Pointer;"> Update</button>

                </div><!-- form-layout-footer -->
              </form>
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->


      </div>
      <!-- sl-pagebody close-->
<?php include 'inc/footer.php'; ?>