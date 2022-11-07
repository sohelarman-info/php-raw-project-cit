<?php 
	session_start();
	require '../db.php';
	//Select
	$id 	= $_GET['id'];
	$select = "SELECT * FROM about WHERE id = $id";
	$query 	= mysqli_query($db, $select);
	$assoc 	= mysqli_fetch_assoc($query);
	//Delete
	$delete = "DELETE FROM about WHERE id = $id";
	$del_qu = mysqli_query($db, $delete);
	if ($del_qu) {
		if (file_exists('../upload/about/'.$assoc['image'])) {
		unlink('../upload/about/'.$assoc['image']);
		$_SESSION['delete'] = 'About delete successfully.';
		header('location:about-list.php');
		}else{
		$_SESSION['delete'] = 'About image delete not successfully.';
		header('location:about-list.php');
}
	}else{
		$_SESSION['delete'] = 'About delete not successfully.';
		header('location:about-list.php');
	}


	/*
	$delete_id 	= $_GET['id'];
	//Delete Query
	$delete 		= "DELETE FROM slider WHERE id = $delete_id";
	$delete_query 	= mysqli_query($db, $delete);

	if ($delete_query) {
		if (file_exists('../upload/slider/')) {
			# code...
		}
	}else{
		$_SESSION['delete'] = 'Slider delete not successfully.';
		header('location:slider-list.php');
	}*/
 ?>