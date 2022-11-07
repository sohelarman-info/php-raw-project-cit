<?php 
include 'inc/header.php'; 
// Active User Query
$active_user_select      = "SELECT * FROM contact_message  WHERE status = 1 ORDER BY id DESC";
$active_user_query       = mysqli_query($db, $active_user_select) ;
$active_user_count       = "SELECT COUNT(*) as total, id, name, email, message FROM contact_message WHERE status = 1 ORDER BY id DESC";
$active_user_count_query = mysqli_query($db, $active_user_count) ;
$active_user_assoc       = mysqli_fetch_assoc($active_user_count_query);

//Deactive User Query
$deactive_user_select      = "SELECT * FROM contact_message  WHERE status = 2 ORDER BY id DESC";
$deactive_user_query       = mysqli_query($db, $deactive_user_select) ;
$deactive_user_count       = "SELECT COUNT(*) as total, id, name, email, message FROM contact_message   WHERE status = 2 ORDER BY id DESC";
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

        <div class="card pd-10 pd-sm-40 mg-t-10">
          <h6 class="card-body-title">Readed Message (<?php echo $active_user_assoc['total'] ?>)</h6>
          <p class="mg-b-10 mg-sm-b-10">All Active users list <span class="float-right"><a href="deactive-users.php">Unread Message (<?php echo $deactive_user_assoc['total'] ?>)</a></span></p>

          <div class="table-responsive">
            <table class="table table-hover mg-t-5 mg-b-0">
          <tbody>
            <?php 
                  $select = "SELECT * FROM contact_message ORDER BY status ASC";
                  $users = mysqli_query($db, $select);
                  foreach ($users as $key => $value) {
                ?>
            <tr>
              <td class="valign-middle">
                <p class="mg-b-0">
                  <?php 
                    if ($value['status'] == 1) {
                      ?>
                      <i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="tx-medium tx-gray-800"><?= $value['name'] ?> </span><strong><?php echo mb_strimwidth($value['message'], 0, 120,('...')); ?></strong>
              </td>
              <td width="10%"><a class="btn btn-success" href="read-unread.php?id=<?= $value['id'];?>">Read</a></td>
                  <?php }else{
                    ?>
                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span class="tx-medium tx-gray-800"><?= $value['name'] ?> </span><?php echo mb_strimwidth($value['message'], 0, 120, ('...')); ?>
              </td>
              <td width="10%"><a class="btn btn-warning" href="read-unread.php?id=<?= $value['id'];?>">Unred</a></td>
                    <?php 
                  }?>
                </p>
            </tr>
          <?php } ?>
          </tbody>
        </table>
          </div>
          </div>
          <!-- table-responsive -->

      </div>
      <!-- sl-pagebody close-->

<?php include 'inc/footer.php'; ?>