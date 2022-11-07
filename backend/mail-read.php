<?php 
include 'inc/header.php'; 
// Active User Query
$mail       = "SELECT * FROM contact_message  WHERE status = 1 ORDER BY id DESC";
$mail_query = mysqli_query($db, $mail) ;
$mail_assoc = mysqli_fetch_assoc($mail_query);

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
          <h6 class="card-body-title">Name: (<?php echo $mail_assoc['name'] ?>)</h6>
          <p class="mg-b-10 mg-sm-b-10">All Active users list <span class="float-right"><a href="deactive-users.php">Unread Message (<?php echo $deactive_user_assoc['total'] ?>)</a></span></p>

          <div class="table-responsive">

          </div>
        </div>
          <!-- table-responsive -->

      </div>
      <!-- sl-pagebody close-->

<?php include 'inc/footer.php'; ?>