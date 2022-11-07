<?php require '../db.php';
session_start();
/*
$text = $_POST["text"];
$id = $_POST["id"];
$update = "UPDATE settings SET text_logo = '$text' WHERE id = $id";
$query 	= mysqli_query($db, $update);
*/
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id            = $_POST['id'];
  $title         = $_POST['title'];
  $content       = $_POST['content'];
  $more          = $_POST['more'];
  $upload_images = $_FILES['image'];
  $explode       = explode('.', $upload_images['name']);
  $ext           = end($explode);
  $allow_format  = ['JPG','jpg','PNG','png','JPEG','jpeg','GIF','gif','psd','ai'];

   if (in_array($ext, $allow_format)) {
     if ($upload_images['size'] <= 999999) {
     	$id_select   = "SELECT * FROM projects WHERE id = $id";
     	$id_query 	 = mysqli_query($db, $id_select);
     	$assc 		 = mysqli_fetch_assoc($id_query);

     	if (file_exists('../upload/projects/'. $assc['image'])) {
     		unlink('../upload/projects/'. $assc['image']);
     	}
     	$image_name   = $id.'.'.$ext;
     	$update 	  = "UPDATE projects SET title = '$title', content = '$content', more = '$more', image = '$image_name' WHERE id = $id";
     	$update_query = mysqli_query($db, $update);

       $new_location = '../upload/projects/'.$image_name;
       move_uploaded_file($upload_images['tmp_name'], $new_location);
       $update    = "UPDATE projects SET image = '$image_name' WHERE id = $id";
       $query     = mysqli_query($db, $update);

       if ($query) {
			$_SESSION['update'] = 'Slider updated successfully.';
			header('location:projects-list.php');
		}else{
			$_SESSION['update'] = 'Slider updated not successfully.';
			header('location:projects-list.php');
		}

     }else{
      echo "Images size to long!";
     }
   }else{

    $_SESSION['warning'] = 'Please select one Banner photo!';
	header('location:projects-list.php');
   }
 }else{
  echo "Something was wrong";
 }

?>