<?php
	require("connection.php");
	$query="SELECT * FROM `users` WHERE 1";
	$result = $conn->query($query);
	$rows = many_rows($query);
	echo count($rows);
    $x = $result->num_rows;//number of rows returned
	for($i=0;$i<$x;$i++)
	{
		echo "<div class='box'></div>";
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
	</body>
</html>