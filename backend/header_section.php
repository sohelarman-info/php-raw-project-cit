<?php include 'inc/header.php';
$select = "SELECT COUNT(*) AS total, id, section_1, section_2, section_3, section_4, section_5,call_today, phone1 FROM header_section";
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
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Navbar Option <span class="float-right"><a href="logo.php">Logo update</a></span></h6>
              <?php 
                if ($asc['total'] > 0) {
                  ?>
                  <form action="header_section_update.php" method="POST">
                <div class="row">
                  <input type="hidden" name="id" value="<?php echo $asc['id']; ?>">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['section_1'])){
                    echo "About";
                  }else{
                    echo $asc['section_1'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_1" class="form-control" value="<?php echo $asc['section_1']; ?>" placeholder="Enter Your field 01">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['section_2'])){
                    echo "Services";
                  }else{
                    echo $asc['section_2'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_2" class="form-control" value="<?php echo $asc['section_2']; ?>" placeholder="Enter Your field 02">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['section_3'])){
                    echo "Projects";
                  }else{
                    echo $asc['section_3'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_3" class="form-control" value="<?php echo $asc['section_3']; ?>" placeholder="Enter Your field 03">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['section_4'])){
                    echo "Testimonials";
                  }else{
                    echo $asc['section_4'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_4" class="form-control" value="<?php echo $asc['section_4']; ?>" placeholder="Enter Your field 04">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['section_5'])){
                    echo "Contact";
                  }else{
                    echo $asc['section_5'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_5" class="form-control" value="<?php echo $asc['section_5']; ?>" placeholder="Enter Your field 05">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['call_today'])){
                    echo "Call Today";
                  }else{
                    echo $asc['call_today'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="call_today" class="form-control" value="<?php echo $asc['call_today']; ?>" placeholder="Enter Your field 06">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['phone1'])){
                    echo "Phone";
                  }else{
                    echo $asc['phone1'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="phone1" class="form-control" value="<?php echo $asc['phone1']; ?>" placeholder="Enter Your field 07">
                  </div>
                </div>
                <div class="form-layout-footer mg-t-30">
                  <input class="btn btn-primary" style="cursor: pointer" type="reset" value="Clear">               
                  <input class="btn btn-primary float-right" style="cursor: pointer" type="submit" value="Update">               

                </div><!-- form-layout-footer -->
              </form>
              <?php 
                }else{
                  ?>
                  <form action="header_section_insert.php" method="POST">
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">About:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_1" class="form-control" value="<?php echo $asc['section_1']; ?>" placeholder="Enter Your About field">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Services:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_2" class="form-control" value="<?php echo $asc['section_2']; ?>" placeholder="Enter Your Services field">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Projects:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_3" class="form-control" value="<?php echo $asc['section_3']; ?>" placeholder="Enter Your Projects field">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Testimonials:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_4" class="form-control" value="<?php echo $asc['section_4']; ?>" placeholder="Enter Your Testimonials field">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Contact:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="section_5" class="form-control" value="<?php echo $asc['section_5']; ?>" placeholder="Enter Your Contact field">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['call_today'])){
                    echo "Call Today";
                  }else{
                    echo $asc['call_today'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="call_today" class="form-control" value="<?php echo $asc['call_today']; ?>" placeholder="Enter Your Phone field">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><?php if (empty($asc['phone1'])){
                    echo "Phone";
                  }else{
                    echo $asc['phone1'];
                  } ?>:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="phone1" class="form-control" value="<?php echo $asc['phone1']; ?>" placeholder="Enter Your Phone field">
                  </div>
                </div><!-- row -->
                <div class="form-layout-footer mg-t-30">
                  <button class="btn btn-info mg-r-5 float-right" style="cursor: Pointer;"> Submit</button>

                </div><!-- form-layout-footer -->
              </form>                  <?php
                }
               ?>
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->


      </div>
      <!-- sl-pagebody close-->
<?php include 'inc/footer.php'; ?>