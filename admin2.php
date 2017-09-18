<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>





<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     INSERT VALUE:<input type="text" name="val1">
	 <input type="text" name="val2">
  	 <input type="text" name="val3">
  	 <input type="text" name="val4"><br>
   	 <input type="text" name="val5">
     <input type="text" name="val6">
     <input type="text" name="val7">
     <input type="text" name="val8"><br><br><br>
     UNDER HEADING(respectively):<input type="text" name="head1">
	 <input type="text" name="head2">
  	 <input type="text" name="head3">
  	 <input type="text" name="head4"><br>
   	 <input type="text" name="head5">
     <input type="text" name="head6">
     <input type="text" name="head7">
     <input type="text" name="head8"><br>
     <input type="submit" name="go"><br>
     </form>
    <?php    

     if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['go']))
     {
     	header("Location:admin.php");
     	$one=$_POST['val1'];
     	$two=$_POST['val2'];
     	$three=$_POST['val3'];
     	$four=$_POST['val4'];
     	$five=$_POST['val5'];
     	$six=$_POST['val6'];
     	$seven=$_POST['val7'];
     	$eight=$_POST['val8'];
     	$one1=$_POST['head1'];
     	$two2=$_POST['head2'];
     	$three3=$_POST['head3'];
     	$four4=$_POST['head4'];
     	$five5=$_POST['head5'];
     	$six6=$_POST['head6'];
     	$seven7=$_POST['head7'];
     	$eight8=$_POST['head8'];
echo $table;
$query1 = "INSERT INTO `$SESSION_('table')` ($one1, $two2, $three3, $four4, $five5, $six6, $seven7, $eight8)
	VALUES ('$one', '$two', '$three', '$four','$five','$six','$seven','$eight')";

	if($conn->query($query1)==TRUE)
		echo "UPDATED SUCCESSFULLY";
}
?>
</body>
</html>