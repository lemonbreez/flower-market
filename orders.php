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
		<h1>order</h1>
	</div>
	
	<div class="order-section">
		<div class="box-container">
			<?php 
				$select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id='$user_id'") or die('query failed');
				if(mysqli_num_rows($select_orders) > 0){
					while($fetch_orders = mysqli_fetch_assoc($select_orders)){

					

			?>
			<div class="box">
				<p>placed on : <span><?php echo $fetch_orders['placed_on']; ?></span></p>
				<p>name : <span><?php echo $fetch_orders['name']; ?></span></p>
				<p>number : <span><?php echo $fetch_orders['number']; ?></span></p>
				<p>email : <span><?php echo $fetch_orders['email']; ?></span></p>
				<p>address : <span><?php echo $fetch_orders['address']; ?></span></p>
				<p>payment method : <span><?php echo $fetch_orders['method']; ?></span></p>
				<p>your order : <span><?php echo $fetch_orders['total_products']; ?></span></p>
				<p>total price : <span><?php echo $fetch_orders['total_price']; ?></span></p>
				<p>payment status : <span><?php echo $fetch_orders['payment_status']; ?></span></p>
			</div>
			<?php 
					}
				}else{
					echo '
						<div class="empty">
							<img src ="img/empty.webp">
							<p>no order place yet!</p>
						</div>
					';
				}
			?>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>