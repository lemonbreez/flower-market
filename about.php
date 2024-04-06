<?php 
	include 'connection.php';
	session_start();

	$user_id = $_SESSION['user_id'];
	if (!isset($user_id)) {
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
		<h1>about us</h1>
	</div>
	<div class="services">
		<h1 class="title">What make us speical ? </h1>
		<div class="box-container">
			<div class="box">
				<i class="bi bi-asterisk"></i>
				<h3>FRESHEST BLOOMS</h3>
				<p>Exclusive farm-fresh flowers with our Happiness Guarantee</p>
			</div>
			<div class="box">
				<i class="bi bi-alarm"></i>
				<h3>SUPER FLEXIBLE</h3>
				<p>Customize recipient, date, or flowers. Skip or cancel anytime.</p>
			</div>
		</div>
	</div>
	<div class="stylist">
		<h1 class="title">Meet the Team On This websites </h1>
		<div class="box-container">
			<div class="box">
				<h3>Shatha Khalid </h3>
				<p>Project Manager</p>
			</div>
			<div class="box">
				<h3>Johara Khabti</h3>
				<p>Senior Developer</p>
			</div>
			<div class="box">
				<h3>Maysa Saeed</h3>
				<p>Back-end Developer</p>
			</div>
		</div>
	</div>
	
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
		let slides = document.querySelectorAll('.testimonial-item');
			let index = 0;

			function nextSlide(){
			    slides[index].classList.remove('active');
			    index = (index + 1) % slides.length;
			    slides[index].classList.add('active');
			}
			function prevSlide(){
			    slides[index].classList.remove('active');
			    index = (index - 1 + slides.length) % slides.length;
			    slides[index].classList.add('active');
			}
	</script>
</body>
</html>