<?php include 'inc/header.php';
$select = "SELECT COUNT(*) AS total, id, text_logo, logo FROM settings";
$q      = mysqli_query($db, $select);
$asc    = mysqli_fetch_assoc($q);

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
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Logo Upload<span class="float-right"><a href="header_section.php">Navbar option</a></span></h6>
              <?php 
                if ($asc['total'] > 0) {
                  ?>
                  <form action="logo-update.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <input type="hidden" name="id" value="<?php echo $asc['id']; ?>">
                  <label class="col-sm-4 form-control-label">Image Logo: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="file" name="logo" class="form-control" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Text Logo: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="text" class="form-control" value="<?php echo $asc['text_logo']; ?>" placeholder="Enter Your Text Logo">
                  </div>
                </div>
                <div class="form-layout-footer mg-t-30">
                  <button class="btn btn-info mg-r-5 float-right" style="cursor: Pointer;"> Update</button>

                </div><!-- form-layout-footer -->
              </form>
              <?php 
                }else{
                  ?>
                  <form action="logo-insert.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <label class="col-sm-4 form-control-label">Image Logo: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="file" name="logo" class="form-control" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Text Logo: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="text" class="form-control" placeholder="Enter Your Text Logo">
                  </div>
                </div>
                <div class="form-layout-footer mg-t-30">
                  <button class="btn btn-info mg-r-5 float-right" style="cursor: Pointer;"> Submit</button>

                </div><!-- form-layout-footer -->
              </form>
                  <?php
                }
               ?>
            </div><!-- card -->
          </div><!-- col-6 -->
          <div class="col-xl-6 mg-t-25 mg-xl-t-0">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
              <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Logo Preview</h6>
              <div class="row row-xs">
                 <?php 
                    if ($asc['total'] > 0) {
                  ?>
                  <img id="logo" src="<?php echo '../upload/logo/'. $asc['logo']?>" height="177px" alt="logo">
                <?php 
              }else{
                echo '<img id="logo" src="assets/img/no_image.png" height="177px" alt="logo">';
              } 
              ?>
                
              </div>
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->


      </div>
      <!-- sl-pagebody close-->
<?php include 'inc/footer.php'; ?>