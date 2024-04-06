
<?php
include 'connection.php';
session_start();
$admin_id= $_SESSION['admin_id'];
if(!isset($admin_id)){
header('location:login.php');
}
if (isset($_POST['logout'])) {
  session_destroy();
  header('location:login.php');
}

/*-------deleting order detail from database---------*/
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');

    header('location:admin_user.php');
}

/*----- update order detail */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>admin pannel </title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '
                        <div class="message">
                            <span>'.$message.'</span>
                            <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                        </div>
                    ';
                }
            }
    ?>
<section class="user-container">
		<h1 class="title">total registered users</h1>
		<div class="box-container">
			<?php 
				$select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
				if(mysqli_num_rows($select_users)>0){
					while($fetch_users = mysqli_fetch_assoc($select_users)){


			?>
			<div class="box">
				<p>user id: <span><?php echo $fetch_users['id']; ?></span></p>
				<p>user name: <span><?php echo $fetch_users['name']; ?></span></p>
				<p>email: <span><?php echo $fetch_users['email']; ?></span></p>
				<p>user type: <span style="color:<?php if($fetch_users['user_type']=='admin'){echo 'orange';}; ?>"><?php echo $fetch_users['user_type']; ?></span></p>
				<a href="admin_user.php?delete=<?php echo $fetch_users['id']; ?>" class="delete" onclick="return confirm('delete this')">Delete</a>
			</div>
			<?php 
					}
				}

			?>
		</div>
			<?php 
					
				

			?>
		</div>
	</section>
	


<script type="text/javascript" src="script.js"></script> 
</body>
</html>