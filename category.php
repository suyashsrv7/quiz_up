<!DOCTYPE html>
<html>
<head>
<style>
#body
{
	background:url(th.jpg);
	background-size:cover;
}
#value
{
	width:400px;
	height:100px;
	background-color:cyan;
	text-align:center;
	margin-left:450px;
	margin-top:100px;

}
#action
{
	margin-left:450px;
	margin-top:50px;
	background-color:cyan;
	padding-top:50px;
	width:400px;
	text-align:center;
}
</style>


</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="value">
<b><i>ENTER VALUES</i></b><br><br>
ID<input type="text" name="one"><br>
CATEGORY_NAME<input type="text" name="two"><br>
ORIGINAL ID<input type="text" name="three"><br>
</div>
<div id="action">
<table>
<tr>
<td><input type="radio" name="insert">INSERT<br></td>
<td><input type="radio" name="update">UPDATE<br></td>
<td><input type="radio" name="delete">DELETE<br></td>
</tr>
</table>
<input type="submit" name="submit"><br>
</div>
</form>

<?php
require("connection.php");
if(($_SERVER["REQUEST_METHOD"] == "POST")&&isset($_POST['submit']))
{
$one=$_POST['one'];
$two=$_POST['two'];
$three=$_POST['three'];
if(isset($_POST['insert']))
{
$query = "INSERT INTO `categories`( `category_name`) VALUES ('$two')";


	if($conn->query($query)==TRUE)
		echo "INSERTED SUCCESSFULLY";
}
if(isset($_POST['update']))
{
	$query1="UPDATE `categories` SET `id`='$one',`category_name`='$two' WHERE `id`='$three'";
if($conn->query($query1)==TRUE)
		echo "UPDATED SUCCESSFULLY";
}
if(isset($_POST['delete']))
{
	$query2="DELETE FROM `categories` WHERE `id`='$three'";
	if($conn->query($query2)==TRUE)
		echo "DELETED SUCCESSFULLY";
}
}

?>
</body>
</html>