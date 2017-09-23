<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	#one
	{
		width:400px;
		height:300px;
		background-color:cyan;
	}
</style>

</head>
<body>

<div id="one">
</div>
<button  onclick="show()">PRESS HERE</button>

<script>
function show()

 {
 	console.log("1");
      var x= new XMLHttpRequest();
        x.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200)
             {
                document.getElementById("one").innerHTML = this.responseText;
            }
        };
        x.open("GET","data.php",true);
        x.send();
    }


</script>
</body>

</html>