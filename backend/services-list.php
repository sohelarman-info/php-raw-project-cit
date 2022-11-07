<?php 
include 'inc/header.php'; 
// Active User Query
$active_post_select      = "SELECT * FROM services  WHERE status = 1 ORDER BY id DESC";
$active_post_query       = mysqli_query($db, $active_post_select) ;
$active_post_count       = "SELECT COUNT(*) as total, id, title, summary FROM services WHERE status = 1 ORDER BY id DESC";
$active_post_count_query = mysqli_query($db, $active_post_count) ;
$active_post_assoc       = mysqli_fetch_assoc($active_post_count_query);

//Deactive User Query
$deactive_post_select      = "SELECT * FROM services  WHERE status = 2 ORDER BY id DESC";
$deactive_post_query       = mysqli_query($db, $deactive_post_select) ;
$deactive_post_count       = "SELECT COUNT(*) as total, id, title, summary FROM services WHERE status = 2 ORDER BY id DESC";
$deactive_post_count_query = mysqli_query($db, $deactive_post_count) ;
$deactive_post_assoc       = mysqli_fetch_assoc($deactive_post_count_query);
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
        <div class="card pd-20 pd-sm-40 mg-t-50">
          <h6 class="card-body-title">Active Post (<?php echo $active_post_assoc['total'] ?>)</h6>
          <p class="mg-b-20 mg-sm-b-30">Deactive Services Post list (<?php echo $deactive_post_assoc['total'] ?>) <span class="float-right"><a href="services-add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Services</a></span></p>
          <div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th class="text-center">SL</th>
                  <th class="text-center">Title</th>
                  <th class="text-center">Summary</th>
                  <th class="text-center">Images</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
              		$select = "SELECT * FROM services WHERE status = 1";
              		$services = mysqli_query($db, $select);
              		foreach ($services as $key => $value) {
              	?>
              		<tr>
                  <td class="text-center"><?= $key+1 ?></td>
                  <td><?=$value['title'] ?></td>
                  <td width="40%"><?= $value['summary'] ?></td>
                  <td><img class="top-center" height="40px" width="80px" src="../upload/services/<?= $value['image'] ?>" alt="<?= $value['image'] ?>"></td>
                  <td class="text-center">
		            <a class="btn btn-success" href="../user-edit.php?id=<?= $value['id'];?>">Update</a>
		            <a class="btn btn-danger" href="../user-trash.php?id=<?= $value['id'];?>">Deactive</a>
                  </td>
                </tr>
              	<?php 
              		}
              	 ?>
              </tbody>
            </table>
          </div>
          </div>
          <!-- table-responsive -->

      </div>
      <!-- sl-pagebody close-->

<?php include 'inc/footer.php'; ?>