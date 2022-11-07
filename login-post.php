<?php 
session_start();
Require 'db.php' ;
?>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$email 			= $_POST['email'];
		$password 		= $_POST['password'];
		$check_user 	= "SELECT COUNT(*) as total, name, email, password FROM user WHERE email = '$email'";
		$user_query 	= mysqli_query($db, $check_user);
		$after_assoc	= mysqli_fetch_assoc($user_query);


		if ($after_assoc['total'] > 0) {
			$hash = $after_assoc['password'];
			if (password_verify($password, $hash)) {
				$_SESSION['email'] = $after_assoc['email'];
				$_SESSION['name'] = $after_assoc['name'];
				header('location:backend/dashboard.php');
				// echo $after_assoc['email'];
			}else{
				$_SESSION['password'] = "<div style='color:red'>Don't match your Password!</div>";
				header('location:login.php');
			}
		}else{
			$_SESSION['email'] = '<div style="color:red">Your email dose not exist!</div>';
			header('location:login.php');
		}
	}else{
		$_SESSION['email'] = '<div style="color:red">Your email dose not exist!</div>';
		header('location:404.php');
	}
?>
<?php include 'footer.php' ?>