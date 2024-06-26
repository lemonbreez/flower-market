<?php 
	include 'connection.php';
	session_start();

	$user_id = $_SESSION['user_id'];
	if (!isset($user_id)) {
		header('location:login.php');
	}
	if (isset($_POST['logout'])) {
		session_destroy();
		header('location:login.php');
	}
	/*----------------send message-------------------------*/
	if (isset($_POST['submit-btn'])) {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$number = mysqli_real_escape_string($conn, $_POST['number']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		$select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email='$email' AND number = '$number' AND message='$message'") or die('query failed');
		if (mysqli_num_rows($select_message)>0) {
			echo 'message already send';
		}else{
			mysqli_query($conn, "INSERT INTO `message`(`user_id`,`name`,`email`,`number`,`message`) VALUES('$user_id','$name','$email','$number','$message')") or die('query failed');

		}
	}
	

?>
<style type="text/css">
	<?php include 'main.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<title>flower shop</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="banner">
		<h1>my contact</h1>
	</div>
	
	<div class="help">
		<h1 class="title">need help</h1>
		<div class="box-container">
			<div class="box">
				<div>
					<img src="img/icon0.png">
					<h2>address</h2>
				</div>
			</div>
			<div class="box">
				<div>
					<img src="img/icon1.png">
					<h2>opening</h2>
				</div>
				
			</div>
			<div class="box">
				<div>
					<img src="img/icon0.png">
					<h2>our contact</h2>
				</div>
				
			</div>
			<div class="box">
				<div>
					<img src="img/icon.png">
					<h2>special offer</h2>
				</div>
				
			</div>
		</div>
	</div>
	<div class="form-container">
		<div class="form-section">
			<form method="post">
				<h1>send us your question!</h1>
				<p>we'ii get back to you within two days.</p>
				<div class="input-field">
					<label>your name</label>
					<input type="text" name="name">
				</div>
				<div class="input-field">
					<label>your email</label>
					<input type="text" name="email">
				</div>
				<div class="input-field">
					<label>your number</label>
					<input type="number" name="number">
				</div>
				<div class="input-field">
					<label>message</label>
					<textarea name="message"></textarea>
				</div>
				<input type="submit" name="submit-btn" class="btn" value="send message">
			</form>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>