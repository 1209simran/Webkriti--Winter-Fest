<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Codemarts.com - Login & Registration System</title>
</head>
<body>
        <div id="content">
            Welcome <?php echo $_SESSION['username']; ?><a href="logout.php?logout">Sign Out</a>
        </div>
</body>
</html>