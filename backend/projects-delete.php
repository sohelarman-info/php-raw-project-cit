<?php 
	session_start();
	require '../db.php';
	//Select
	$id 	= $_GET['id'];
	$select = "SELECT * FROM projects WHERE id = $id";
	$query 	= mysqli_query($db, $select);
	$assoc 	= mysqli_fetch_assoc($query);
	//Delete
	$delete = "DELETE FROM projects WHERE id = $id";
	$del_qu = mysqli_query($db, $delete);
	if ($del_qu) {
		if (file_exists('../upload/projects/'.$assoc['image'])) {
		unlink('../upload/projects/'.$assoc['image']);
		$_SESSION['delete'] = 'Projects delete successfully.';
		header('location:projects-list.php');
		}else{
		$_SESSION['delete'] = 'projects image delete not successfully.';
		header('location:projects-list.php');
}
	}else{
		$_SESSION['delete'] = 'Projects delete not successfully.';
		header('location:projects-list.php');
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