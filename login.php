<?php
session_start();
$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'re');

$username=$_POST['username'];

$password=$_POST['password'];
$q="select * from page where username='$username' && password='$password'";
$result=mysqli_query($con, $q);
$num=mysqli_num_rows($result);
if($num==1)
{
    echo "username and password are wrong";
}
else
{
    
    $_SESSION['username']=$username;
    header('location:welcome.php');
}
?>