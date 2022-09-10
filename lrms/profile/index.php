<?php
session_start();
if(!isset($_SESSION['user'])){
echo("<script>alert('please login to access this page');</script>");
header("location:../index.php");
}
else{
	$con=mysqli_connect('localhost','root','','rohith');
if(!$con){echo("<script>alert('not connected');</script>");}
}
$user=$_SESSION['user'];
$sql="select * from lrms where EMAIL='$user'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form method="post" action=""><span><input class="span" type="submit" name="submit" value="logout"></span></form>
<div class='pro'><img class='imagez' src="<?php echo('img/'.$row['PICTURE'])?>"></div>
<h2>Welcome <?php echo($row['FNAME']." ".$row['LNAME']);}?></h2>
</body>
</html>
<?php
if(isset($_POST['submit'])){
	session_start();
	session_destroy();
	header("location:../");
}
?>