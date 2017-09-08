<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
	#details
	{
		margin-left:35%;
		margin-top:5%;
		background-color:cyan;
		width:35%;
		text-align:center;
	}
    #back
    {
        background-image: url("4.jpg");
        background-repeat: no-repeat;
        background-size: cover
    }
    #sty
    {
    	width:120px;
    	height:30px;
    }
    #end
    {
        text-align: center;
        
        font-size: 300%;
    }
</style>
	
</head>
<body id="back">


<script>
function validateForm()
 {
    var x = document.forms["myForm"]["name"].value;
    if (x == "")
     {
        alert("Name must be filled out");
        return false;
    }
     if(( /^[A-z ]+$/.test(x))!=true)
     {
        alert("invalid lastname");
        return false;
     }
     var l = document.forms["myForm"]["lname"].value;
    if (l == "")
     {
        alert("Last name must be filled out");
        return false;
    }
     if(( /^[A-z ]+$/.test(l))!=true)
     {
        alert("invalid lastname");
        return false;
     }
     var y = document.forms["myForm"]["uname"].value;
    if (y == "")
    alert("username must be filled out");
     
    var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/;
    var address = document.forms["myForm"]["email"].value;
    if (reg.test(address) == false) 
     {
      alert('Invalid Email Address');
      return false;
                
     }
     var z = document.forms["myForm"]["password"].value;
    if (z == "")
     {
        alert("password must be filled out");
        return false;
    }

  
    var img = document.getElementById('Iimage');
    var FileUploadPath = img.value;
    console.log(FileUploadPath);
        if (FileUploadPath == "")
         {
            alert("Please upload an image");

        }
         else 
        {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        }

       if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg")
        {
         }
        else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG. ");

            }
        }
        
    
</script>
<?php
require("connection.php");
require("validation.php");

$name=$uname=$email=$password=$image=$name1=$email1=$password1=$uname1=$image1=$imagesizedata=$lname=$lname1=$password2=$passwordc2='';
if ($_SERVER["REQUEST_METHOD"] == "POST")

{

    if(!empty($_POST['name']))
    {
        if (!preg_match("/^[A-z ]+$/",$name))
        $name = $_POST['name'];
    else
        $name1= 'invalid name';
    }
    else
        $name1='name required';

    if(!empty($_POST['lname']))
    {
        if (!preg_match("/^[A-z ]+$/",$lname))
        $lname = $_POST['lname'];
    else
        $lname1= 'invalid name';
    }
    else
        $lname1='name required';

    if(!empty($_POST['email']))
    {
         if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $email = $_POST['email']; 
    else 
        $email1='invalid email address';
    }
    else
        $email1 =' e-mail  required';
    
    if(!empty($_POST['uname']))
        $uname= $_POST['uname'];
    else
        $uname1= 'username required';
    if(!empty($_POST['password']))
        $password= $_POST['password'];
    else
        $password1= 'password  required';
    if(!empty($_POST['cpassword']))
        $passwordc2= $_POST['cpassword'];
    else
        $password2= 'password  required';
    if($passwordc2==$password)
    {}
else
{
    $password2='password confirmation failed';
}
    
    if (file_exists($image))
    {
        $imagesizedata = getimagesize($image);
        if ($imagesizedata === FALSE)
        {
            $image1='entered file is not an image ';
        }
        else
        {
             $image=$_POST['image'];
            
        }
    }

}





?>

<h1 style=" text-align:center;"> <i><b>NEW USER? REGISTER NOW</b></i></h1>
<div id="details">
<form method="post" name="myForm" onsubmit="return validateForm()" action="registerform.php"><br><br><br>
<input type="text" name="name" placeholder="enter your firstname"><?php echo $name1?><br><br><br>
<input type="text" name="lname" placeholder="enter your lastname"><?php echo $lname1?><br><br><br>
<input type="text" name="uname" placeholder="enter your username"><?php echo $uname1?><br><br><br>
<input type="text" name="email" placeholder="enter your email"><?php echo $email1?><br><br><br>
<input type="password" name="password" placeholder="create password"><?php echo $password1?><br><br><br>
<input type="password" name="cpassword" placeholder="confirm password"><?php echo $password2?><br><br><br>
<input id="Iimage" type="file" name="image" value="image"><?php echo $image1?><br><br><br>
<input id="sty" type="submit" name="register" value="REGISTER NOW"><br><br><br>

</form>
</div>
<div id="end">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if($name1==''&&$uname1==''&&$email1==''&&$password1==''&&$image1=='')
echo 'SUCCESSFULLY REGISTERED!';
}
?>
</div>
</body>
</html>

