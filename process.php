<?php
 session_start();
 require("connection.php");
 
  if(isset($_SESSION['scrname']))
  {
    if(($_SESSION['scrname'] == 'admin'))
      header("Location:admin.php");
    else
      header("Location:profile.php");
  }
  function display_msg(){
  	echo 'wrong'; 
  }

  
  $firstname=$scrname=$email=$password=$image=$name1=$email1=$password1=$uname1=$image1=$imagesizedata=$lastname=$lname1=$password2=$passwordc2='';
  if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['register']))
 
  {

    if(!empty($_POST['firstname']))
    {
        if (!preg_match("/^[A-z ]+$/",$firstname))
          $firstname = $_POST['firstname'];
        else
          $name1= 'invalid firstname';
    }
    else
        $name1=1;

    if(!empty($_POST['lastname']))
    {
        if (!preg_match("/^[A-z ]+$/",$lastname))
          $lastname = $_POST['lastname'];
        else
          $lname1= 'invalid lastname';
    }
    else
        $lname1='lastname required';

    if(!empty($_POST['email']))
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
          $email = $_POST['email']; 
        else 
          $email1='invalid email address';
    }
    else
        $email1 =' e-mail  required';
    
    if(!empty($_POST['scrname']))
        $scrname= $_POST['scrname'];
    else
        $uname1= 'scrname required';


    if(!empty($_POST['password']))
        $password= $_POST['password'];
    else
        $password1= 'password  required';
    if(!empty($_POST['cpassword']))
        $passwordc2= $_POST['cpassword'];
    else
        $password2= 'password  required';
    if($passwordc2 != $password)
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

 

if (!empty($name1) || !empty($lname1) || !empty($email1) || !empty($password1) || !empty($password2) || !empty($image1) )
{
	display_msg();
    
}
else
{
  $query_uname="SELECT `id`, `firstname`, `lastname`, `scrname`, `password`, `image`, `type`,`email` FROM `users` WHERE `scrname`='$scrname'";
  $result = $conn->query($query_uname);
  if(($result ) && ($result->num_rows != 0))
      {
        echo "username already taken";
        
      }
      else
      {
        $path="img/";
        if(isset($_FILES["image"])){
          if(is_uploaded_file($_FILES["image"]["tmp_name"]) && $_FILES["image"]["error"]==0)
          {
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$path.$_FILES["image"]["name"]))//move the uploaded file from server to specified folder
             {
               $path = $path.$_FILES["image"]["name"];
             }
          }
        }

        $password_encrypt = md5($password);
        $query = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `scrname`, `password`,`image`,`email`) VALUES ('NULL','$firstname','$lastname','$scrname','$password_encrypt','$path','$email')";
  
        if ($conn->query($query)==TRUE)
        {
           echo "registered successfully";
           $last_id = $conn->insert_id;
           $query = "INSERT INTO `user_medals`(`user_id`, `xp`, `badge`) VALUES ('$last_id','0','Beginner')";
           $conn->query($query);
           header("Location:log-in.php");
        }
        else
        {
            echo "error";
        }  
      }
}
}


if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['login'])))
{
  
    
    if(!empty($_POST['scrname']))
        {
          $scrname= $_POST['scrname'];
          
        }
    else
        $uname1= 'scrname required';
    if(!empty($_POST['password']))
       {  
          $password = $_POST['password'];
         }
    else
        $password1= 'password  required';

     if(!empty($scrname) && !empty($password)) 
     {
        
        $query="SELECT `id`, `firstname`, `lastname`, `scrname`, `password`, `image`, `type`, `email` FROM `users` WHERE `scrname`='$scrname'";
        $result = $conn->query($query);
        if( ($result) && ($result->num_rows != 0))
        {
            $row = $result->fetch_assoc();
            if(md5($password) == $row['password'])
            {
               if(!isset($_SESSION['scrname']))
               {
                 $_SESSION['scrname'] = $scrname;
                 if(($password == "sdk158Z") && ($_SESSION['scrname'] == "admin"))
                 {
                   header("Location:admin.php");
                 } 
                 else
                 {
                  
                  header("Location:profile.php");
                 }
                
               } 

            }
            else
            {
              $password1="password wrong";
            }
        }
        else
        {
            $uname1="No Such User";
        }
     }
}
?>