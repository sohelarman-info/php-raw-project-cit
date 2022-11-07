<?php Require 'db.php';
session_start();
?>

<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username 		= $_POST['username'];
		$email 			= $_POST['email'];
		$email_regex	= '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/';
		$password 		= password_hash($_POST['password'], PASSWORD_DEFAULT);
		$username_regex = '/^[a-z0-9][a-z0-9_]{2,28}[a-z0-9]$/';
		$phone 			= $_POST['phone'];
		$br 		 	= "<br>";

		//Username Field
	 	if (empty($username)){
	 			echo "Your name is Required! $br";
	 		}elseif(!empty($username)){
	 			if (preg_match($username_regex, $username)) {
	 				echo 'Your name is: $username';
	 			}else{
	 				$_SESSION['warning'] = 'Your Name is Invalid!';
        			header('location:register.php');
	 			}
	 		}else{
	 			echo  'Your Your name is: $username';
	 		}

	 	//Email Field
	 	if (empty($email)) {
	 		$_SESSION['warning'] = 'Email Field is Required';
        	header('location:register.php');
	 	}elseif (!empty($email)) {
			if (preg_match($email_regex, $email)) {
				echo "Your email is: $email <br>";
			}else{
				$_SESSION['warning'] = 'Your email is Invalid';
        		header('location:register.php');
			}
		}

	 	//Password Field
	 	if (empty($password)) {
	 		$_SESSION['warning'] = 'Your password is Required!';
        	header('location:register.php');
	 	}elseif (!empty($password)) {
	 		$str = strlen($password);
	 		if ($str < 4) {
	 			$_SESSION['warning'] = 'Your password is less then 4.';
        		header('location:register.php');
	 		}else{
	 			echo "Your password is: $password $br";
	 		}
	 	}

	 	//Database connection
	 	$insert = "INSERT INTO user(name, email, password, phone) VALUES('$username', '$email', '$password', '$phone')";

	 	//Data insert Query
	 	$query 	= mysqli_query($db, $insert);
	 	if ($query) {
	 		$_SESSION['Success'] = 'Registration Success!';
        	header('location:login.php');
	 	}else{
	 		$_SESSION['warning'] = 'Registration not Successfully!';
        	header('location:register.php');
	 	}
	 	//Database connection close

	 	}else{
	 		$_SESSION['warning'] = 'Please first Registration';
        	header('location:register.php');
	 	}
?>