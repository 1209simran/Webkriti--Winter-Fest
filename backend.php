<?php
$name=$_POST['name'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$db=new PDO("mysql:host=localhost;dbname=form","root","");
    if($db)
    {
    	$sql="INSERT INTO register(name,gender,email,contact)VALUES(?,?,?,?)";
    	$test=$db->prepare($sql);
    	$test->bindParam(1,$name);
    	$test->bindParam(2,$gender);
    	$test->bindParam(3,$email);
    	$test->bindParam(4,$contact);
    	if ($test->execute())
          {
    		echo "Data Saved Successfully";
    	}
    	else
    	{
    		echo "error";
    	}
    }

?>