<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="flex">
            <a href="admin.php" class="logo">Admin <span>Pannel</span></a>
            <nav class="navbar">
                <a href="admin.php">Home</a>
                <a href="admin_product.php">products</a>
                <a href="admin_orders.php">orders</a>
                <a href="admin_user.php">users</a>
                <a href="admin_message.php">message</a>
            </nav>
            <div class="icons">
                <i class="bi bi-list" id="menu-btn"></i>
                <i class="bi bi-person" id="user-btn"></i>
            </div>
            <div class="user-box">
                <p>username : <span><?php echo $_SESSION['admin_name'];?></span></p>
                <p>email : <span><?php echo $_SESSION['admin_email'];?></span></p>
                <form method="post" class="logout">
                    <button name="logout" class="logout-btn">LOG OUT</button>
                </form>
            </div>
        </div>
    </header>
</body>
</html>

