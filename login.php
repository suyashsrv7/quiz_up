<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
	#details
	{
		margin-left:35%;
		margin-top:15%;
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
        alert("invalid name");
        return false;
     }
     var y = document.forms["myForm"]["uname"].value;
    if (y == "")
    alert("username must be filled out");
     
    var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/;
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
}
</script>
 

<?php
$name=$uname=$email=$password=$password1='';
if ($_SERVER["REQUEST_METHOD"] == "POST")

{

    if(!empty($_POST['name']))
    {
        if (preg_match("/^[a-zA-Z ]*$/",$name))
        $name = $_POST['name'];
    else
        $name= 'invalid name';
    }
    else
        $name='name required';

    if(!empty($_POST['email']))
    {
         if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $email = $_POST['email']; 
    else 
        $email='invalid email address';
    }
    else
        $email =' e-mail  required';
    
    if(!empty($_POST['uname']))
        $uname= $_POST['uname'];
    else
        $uname= 'username required';
    if(!empty($_POST['password']))
        $password= $_POST['password'];
    else
        $password1= 'password  required';
}

?> 

<div id="details">
<form name="myForm" method="post" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br><br>
 <input type="text" name="name" placeholder="your name here"><?php echo $name?><br><br><br>
 <input type="text" name="uname" placeholder="enter username" ><?php echo $uname?><br><br><br>
 <input type="text" name="email" placeholder="your e-mail here"><?php echo $email?><br><br><br>
 <input type="password" name="password" maxlength="8" placeholder="enter password"><?php echo $password1?></label><br><br><br>
<input type="submit" name="login" value="LOGIN"><br><br>
</label>
</form>
</div>


</body>

</html>