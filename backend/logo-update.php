<?php require '../db.php';
session_start();
/*
$text = $_POST["text"];
$id = $_POST["id"];
$update = "UPDATE settings SET text_logo = '$text' WHERE id = $id";
$query 	= mysqli_query($db, $update);
*/
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $text          = $_POST['text'];
   $id          = $_POST['id'];
   $upload_images = $_FILES['logo'];
   $explode       = explode('.', $upload_images['name']);
   $ext           = end($explode);
   $allow_format  = ['JPG','jpg','PNG','png','JPEG','jpeg','GIF','gif','psd','ai'];

   if (in_array($ext, $allow_format)) {
     if ($upload_images['size'] <= 999999) {
     	$id_select   = "SELECT * FROM settings WHERE id = $id";
     	$id_query 	 = mysqli_query($db, $id_select);
     	$assc 		 = mysqli_fetch_assoc($id_query);

     	if (file_exists('../upload/logo/'. $assc['logo'])) {
     		unlink('../upload/logo/'. $assc['logo']);
     	}
     	$image_name   = $id.'.'.$ext;
     	$update 	  = "UPDATE settings SET text_logo = '$text', logo = '$image_name' WHERE id = $id";
     	$update_query = mysqli_query($db, $update);

       $new_location = '../upload/logo/'.$image_name;
       move_uploaded_file($upload_images['tmp_name'], $new_location);
       $update    = "UPDATE settings SET logo = '$image_name' WHERE id = $id";
       $query     = mysqli_query($db, $update);

       if ($query) {
			$_SESSION['update'] = 'Logo updated successfully.';
			header('location:logo.php');
		}else{
			$_SESSION['update'] = 'Logo updated not successfully.';
			header('location:logo.php');
		}

     }else{
      echo "Images size to long!";
     }
   }else{

    $_SESSION['warning'] = 'Please select one logo!';
	header('location:logo.php');
   }
 }

?>