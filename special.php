<?php
$answer=$_POST['answer'];
$db=new PDO("mysql:host=localhost;dbname=special","root","");
    if($db)
    {
    	$sql="INSERT INTO special1(answer)VALUES(?)";
    	$test=$db->prepare($sql);
    	$test->bindParam(1,$answer);
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