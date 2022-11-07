<?php include 'inc/header.php' ?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
 	<!-- sl-pagebody Start-->
      <div class="sl-pagebody">
        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title mg-b-20 text-center">Add Services</h6>
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
              <form action="services-post.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <label class="col-sm-2 form-control-label">Thumbnail: </label>
                  <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                    <input type="file" name="logo" class="form-control" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                  </div>
                </div>
                <!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-2 form-control-label">Title: </label>
                  <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                    <input type="text" name="title" class="form-control" placeholder="Title here">
                  </div>
                </div>
                <!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-2 form-control-label">Summery: </label>
                  <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                    <textarea name="summary" class="form-control" placeholder="What's Your Services?"></textarea>
                  </div>
                </div>
                <div class="form-layout-footer mg-t-30 text-center">
                  <button class="btn btn-info mg-r-5" style="cursor: Pointer; text-align: center"> Submit</button>
                </div><!-- form-layout-footer -->
              </form>
            </div><!-- card -->
          </div><!-- col-6 -->
          </div><!-- col-6 -->
        </div><!-- row -->
      <!-- sl-pagebody close-->
<?php include 'inc/footer.php'; ?>