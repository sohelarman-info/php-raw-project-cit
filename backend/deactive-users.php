<?php 
include 'inc/header.php'; 
// Active User Query
$active_user_select      = "SELECT * FROM user  WHERE status = 1 ORDER BY id DESC";
$active_user_query       = mysqli_query($db, $active_user_select) ;
$active_user_count       = "SELECT COUNT(*) as total, id, name, email, phone FROM user   WHERE status = 1 ORDER BY id DESC";
$active_user_count_query = mysqli_query($db, $active_user_count) ;
$active_user_assoc       = mysqli_fetch_assoc($active_user_count_query);

//Deactive User Query
$deactive_user_select      = "SELECT * FROM user  WHERE status = 2 ORDER BY id DESC";
$deactive_user_query       = mysqli_query($db, $deactive_user_select) ;
$deactive_user_count       = "SELECT COUNT(*) as total, id, name, email, phone FROM user   WHERE status = 2 ORDER BY id DESC";
$deactive_user_count_query = mysqli_query($db, $deactive_user_count) ;
$deactive_user_assoc       = mysqli_fetch_assoc($deactive_user_count_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
 	<!-- sl-pagebody Start-->
      <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40 mg-t-50">
          <h6 class="card-body-title">Deactive Users (<?php echo $deactive_user_assoc['total'] ?>)</h6>
          <p class="mg-b-20 mg-sm-b-30">All Deactive users list <span class="float-right"><a href="user-list.php">Active User (<?php echo $active_user_assoc['total'] ?>)</a></span></p>

          <div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th class="text-center">SL</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Phone</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
              		$select = "SELECT * FROM user WHERE status = 2";
              		$users = mysqli_query($db, $select);
              		foreach ($users as $key => $value) {
              	?>
              		<tr>
                  <td class="text-center"><?= $key+1 ?></td>
                  <td><?=$value['name'] ?></td>
                  <td><?= $value['email'] ?></td>
                  <td><?= $value['phone'] ?></td>
                  <td class="text-center">
		            <a class="btn btn-success" href="../user-undo.php?id=<?= $value['id'];?>">Active</a>
		            <a class="btn btn-danger" href="../user-delete.php?id=<?= $value['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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