<script>
function validate()
{ 
var contact = document.register.contact.value;
var events = document.register.events.value;
var username = document.register.username.value; 
var password = document.register.password.value;
var conpassword= document.register.conpassword.value;
if (username==null || username=="")
{ 
alert("Username can't be blank"); 
return false; 
}
else if(password.length&amp;lt;6)
{ 
alert("Password must be at least 6 characters long."); 
return false; 
} 
else if (password!=conpassword)
{ 
alert("Confirm Password should match with the Password"); 
return false; 
} 
} 
</script> 
<?php
include("connection.php"); 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
$inevents = $_POST["events"]; 
$incontact = $_POST["contact"];
$inUsername = $_POST["username"];
$inPassword = $_POST["password"];
$stmt = $db->prepare("INSERT INTO page(username,password,events,contact) VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssss", $inUsername, $inPassword, $inevents, $incontact); 
$stmt->execute();
$result = $stmt->affected_rows;
$stmt -> close();
$db -> close(); 
if($result > 0)
{
header("location: login.html"); 
}
else
{
echo "Oops. Something went wrong. Please try again"; 
?>
<a href="register.html">Try Login</a>
<?php 
}
} 
?>