<?php
	require("connection.php");
if(isset($_POST["register"]))
{
   	$name      = $_POST["name"];
   	$lname     = $_POST["lname"];
   	$uname     = $_POST["uname"];
   	$password  = $_POST["password"];
   	$cpassword = $_POST["cpassword"];
   	$email	   = $_POST["email"];
    $path      = "img/";

    
    $query_uname="SELECT `id`, `firstname`, `lastname`, `scrname`, `password`, `image`, `type`,`email` FROM `users` WHERE `scrname`='$uname'";
    $result = $conn->query($query_uname);
    if(($result ) && ($result->num_rows != 0))
    	die( "scrname not available already exist");
    

    //getting the image file
    if(isset($_FILES["image"])){
    if(is_uploaded_file($_FILES["image"]["tmp_name"]) && $_FILES["image"]["error"]==0)
    {
    	if(move_uploaded_file($_FILES["image"]["tmp_name"],$path.$_FILES["image"]["name"]))//move the uploaded file from server to specified folder
    	{
    		
    		$path = $path.$_FILES["image"]["name"];
        }

    }
    else
    {
    	echo "error".$_FILES["image"]["error"];
    }
  }
    	
    $password_encrypt = md5($password);
	$query = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `scrname`, `password`,`image`,`email`) VALUES ('NULL','$name','$lname','$uname','$password_encrypt','$path','$email')";
	
	if ($conn->query($query)==TRUE)
	{
		echo "registered successfully";
	}
	else
	{
		echo "error";
	}

  }
?>