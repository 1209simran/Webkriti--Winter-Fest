<!DOCTYPE html>
<html>
<head>
	<title>first website</title>
	<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
$name=$email=$gender=$website=$comment="";
$nameErr=$emailErr=$genderErr=$websiteErr=$commentErr="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"]))
	 {
		$nameErr="Name is required";
	}
		else{
       $name=test_input($_POST["name"]);
	if(!preg_match("/^[a-zA-Z]*$/", $name))
		{$nameErr= "Letters and spaces are allowed";}
      }
    if (empty($_POST["email"]))
	 {
		$emailErr="";
	}
		else{
       $email=test_input($_POST["email"]);
       if(!filter_var($email, FILTER_VALIDATE_EMAIL))
       	$emailErr="Invalid E-mail Format";
    }  
    if (empty($_POST["website"]))
	 {
		$websiteErr="";
	}
		else{
       	$website=test_input($_POST["website"]);
       	if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website))
       		$websiteErr="Invalid URL";
       }   
    if (empty($_POST["comment"]))
	 {
		$commentErr="";
	}
		else{
    	$comment = test_input($_POST["comment"]);
    }   
    if (empty($_POST["gender"]))
	 {
		$genderErr="";
	}
		else{
    	$gender = test_input($_POST["gender"]);
    }
}
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Name:<input type="text" name="name" required><span class="error">* <?php echo $nameErr;?></span><br><br>
	E-mail:<input type="E-mail" name="email" required><span class="error">* <?php echo $emailErr;?></span><br><br>
    Website:<input type="text" name="website"><span class="error"><?php echo $websiteErr;?></span><br><br>
    Comment:<textarea type="text" name="comment" rows="5" columns ="40"></textarea><span class="error"><?php echo $commentErr;?></span><br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>