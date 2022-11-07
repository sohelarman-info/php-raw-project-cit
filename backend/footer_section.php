<?php include 'inc/header.php';
$select = "SELECT COUNT(*) AS total, id, address, phone, email, description, link1, link2, link3, link4, name1, name2, name3, name4, icon1, icon2, icon3, icon4 FROM footer_section";
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
              <h6 class="card-body-title">Footer Option <span class="float-right"><a href="header_section.php">Go To Header</a></span></h6>
              <?php 
                if ($asc['total'] > 0) {
                  ?>
                  <!-- update -->
                  <form action="footer_section_update.php" method="POST">
                <div class="row">
                  <input type="hidden" name="id" value="<?php echo $asc['id']; ?>">
                  <label class="col-sm-4 form-control-label">Address:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="address" class="form-control" value="<?php echo $asc['address']; ?>" placeholder="Enter Your field 01">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Phone:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="phone" class="form-control" value="<?php echo $asc['phone']; ?>" placeholder="Enter Your field 02">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Email:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="email" class="form-control" value="<?php echo $asc['email']; ?>" placeholder="Enter Your field 03">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Description:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea3" rows="7" placeholder="What's On Your Mind?"><?php echo $asc['description']; ?></textarea>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><i class="<?php echo $asc['link1']; ?>" aria-hidden="true"></i> Link 01:</label>
                  <div class="form-row mg-l-10">
                    <div class="form-group col-md-4">
                      <label for="inputCity">Link (<span style="text-decoration: line-through">http//</span>)</label>
                      <input type="text" name="link1" value="<?php echo $asc['link1']; ?>" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputZip">Name</label>
                      <input type="text" name="name1" value="<?php echo $asc['name1']; ?>" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Icon</label>
                      <select id="inputState" name="icon1" class="form-control">
                        <option <?php echo $asc['icon1']=='fa fa-facebook'? 'selected':'' ?> value="fa fa-facebook">Facebook </option>
                        <option <?php echo $asc['icon1']=='fa fa-twitter'? 'selected':'' ?> value="fa fa-twitter">Twitter </option>
                        <option <?php echo $asc['icon1']=='fa fa-google-plus'? 'selected':'' ?> value="fa fa-youtube">Google Plus </option>
                        <option <?php echo $asc['icon1']=='fa fa-youtube'? 'selected':'' ?> value="fa fa-youtube">Youtube </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><i class="<?php echo $asc['link2']; ?>" aria-hidden="true"></i> Link 02:</label>
                  <div class="form-row mg-l-10">
                    <div class="form-group col-md-4">
                      <input type="text" name="link2" value="<?php echo $asc['link2']; ?>" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="name2" value="<?php echo $asc['name2']; ?>" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-4">
                      <select id="inputState" name="icon2" class="form-control">
                        <option <?php echo $asc['icon2']=='fa fa-facebook'? 'selected':'' ?> value="fa fa-facebook">Facebook </option>
                        <option <?php echo $asc['icon2']=='fa fa-twitter'? 'selected':'' ?> value="fa fa-twitter">Twitter </option>
                        <option <?php echo $asc['icon2']=='fa fa-google-plus'? 'selected':'' ?> value="fa fa-youtube">Google Plus </option>
                        <option <?php echo $asc['icon2']=='fa fa-youtube'? 'selected':'' ?> value="fa fa-youtube">Youtube </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><i class="<?php echo $asc['link3']; ?>" aria-hidden="true"></i> Link 03:</label>
                  <div class="form-row mg-l-10">
                    <div class="form-group col-md-4">
                      <input type="text" name="link3" value="<?php echo $asc['link3']; ?>" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="name3" value="<?php echo $asc['name3']; ?>" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-4">
                      <select id="inputState" name="icon3" class="form-control">
                        <option <?php echo $asc['icon3']=='fa fa-facebook'? 'selected':'' ?> value="fa fa-facebook">Facebook </option>
                        <option <?php echo $asc['icon3']=='fa fa-twitter'? 'selected':'' ?> value="fa fa-twitter">Twitter </option>
                        <option <?php echo $asc['icon3']=='fa fa-google-plus'? 'selected':'' ?> value="fa fa-google-plus">Google Plus </option>
                        <option <?php echo $asc['icon3']=='fa fa-youtube'? 'selected':'' ?> value="fa fa-youtube">Youtube </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label"><i class="<?php echo $asc['link4']; ?>" aria-hidden="true"></i> Link 04:</label>
                  <div class="form-row mg-l-10">
                    <div class="form-group col-md-4">
                      <input type="text" name="link4" value="<?php echo $asc['link4']; ?>" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="name4" value="<?php echo $asc['name4']; ?>" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-4">
                      <select id="inputState" name="icon4" class="form-control">
                        <option <?php echo $asc['icon4']=='fa fa-facebook'? 'selected':'' ?> value="fa fa-facebook">Facebook </option>
                        <option <?php echo $asc['icon4']=='fa fa-twitter'? 'selected':'' ?> value="fa fa-twitter">Twitter </option>
                        <option <?php echo $asc['icon4']=='fa fa-google-plus'? 'selected':'' ?> value="fa fa-youtube">Google Plus </option>
                        <option <?php echo $asc['icon4']=='fa fa-youtube'? 'selected':'' ?> value="fa fa-youtube">Youtube </option>
                      </select>
                    </div>
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
                  <!-- Insert -->
                  <form action="footer_section_insert.php" method="POST">
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Address:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="address" class="form-control" placeholder="Type your address">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Phone:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="phone" class="form-control" placeholder="Type your phone">
                  </div>
                </div><!-- row -->
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Email:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="email" class="form-control" placeholder="type your mail">
                  </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Description:</label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea3" rows="7" placeholder="What's On Your Mind?"></textarea>
                  </div>
                </div>
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