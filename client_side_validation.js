function validateForm()
 {
    var x = document.forms["myForm"]["firstname"].value;//firstname
    if (x == "")
     {

        document.getElementById("error1").innerHTML = "*Name must be filled out";
        console.log(x);
        return false;
     }
     if(( /^[A-z ]+$/.test(x))!=true)
     {
        document.getElementById("error1").innerHTML = "*Inavlid Firstname";
        console.log(x);
        return false;
     }

    
    var l = document.forms["myForm"]["lastname"].value;
    if (l == "")
     {
        document.getElementById("error2").innerHTML = "*Lastame must be filled out";
        return false;
     }
    if(( /^[A-z ]+$/.test(l))!=true)
     {
        document.getElementById("error2").innerHTML = "Invalid lastname" ;
        return false;
     }

    
    var y = document.forms["myForm"]["scrname"].value;
    if (y == "")
     {
        document.getElementById("error3").innerHTML = "username must be filled out" ;
        return false;
     }
    

    var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])/;
    var address = document.forms["myForm"]["email"].value;
    if (reg.test(address) == false) 
     {
      document.getElementById("error6").innerHTML = "invalid email";
      return false;
     }
    

    var z = document.forms["myForm"]["password"].value;
    if (z == "")
     {
       document.getElementById("error4").innerHTML = "password must be filled out";
        return false;
     }
     var z1 =  document.forms["myForm"]["cpassword"].value;
     if(z != z1)
     {
        document.getElementById("error5").innerHTML = "password didnot match";
        return false;
     }

  
    var img = document.getElementById('Iimage');
    var FileUploadPath = img.value;
    console.log(FileUploadPath);
    if (FileUploadPath == "")
     {
        document.getElementById("error7").innerHTML =  "Please upload an image";
         return false;
     }
    else 
     {
         var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase() ;
     }

    if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg")
     {
     }
     else 
     {
        document.getElementById("error7").innerHTML = "Photo only allows file types of GIF, PNG, JPG, JPEG. ";
        return false;
     }

 }
function delete_err_msg(x)
{
   if(x == "error1")
     document.getElementById("error1").innerHTML = "";
   else if(x == "error2")
     document.getElementById("error2").innerHTML = "";
   else if(x == "error3")
     document.getElementById("error3").innerHTML = "";
   else if(x == "error4")
     document.getElementById("error4").innerHTML = "";
   else if(x == "error5")
     document.getElementById("error5").innerHTML = "";
   else if(x == "error6")
     document.getElementById("error6").innerHTML = "";
   else if(x == "error7")
     document.getElementById("error7").innerHTML = "";
} 
        
    