<?php
	require("connection.php");
	$query="SELECT * FROM `users` WHERE 1";
	$result = $conn->query($query);
	$rows = many_rows($query);
	echo count($rows);
    $x = $result->num_rows;//number of rows returned
    echo "<form action='choosefrnz.php' method='post' name='form' id='form'>
         <input type='hidden' id='datain' name='name' value=''>";
	for($i=0;$i<$x;$i++)
	{
		echo "<div class='box' id='b".$i."' onclick='setsubmit(this);'>hello</div>";
	}

	

		

?>
<html>
	<head>
		<style>
			.box{
				height:100px;
				width: 500px;
				background-color: #fff;
				margin-bottom: 5px;
				margin:5px auto;
			}
			body{
				background-color: #eee;
			}
		</style>
	</head>
	<body>
		<script>
			function setsubmit(e)
			{
				var x=document.getElementById(e.id).innerHTML;
				form.name.value=x;
				console.log(x);
				console.log(e.id);
				document.getElementById('form').submit();


			}
		</script>
	</body>
</html>