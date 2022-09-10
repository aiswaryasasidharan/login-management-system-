<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
		<div class="parent">
		<div class="pic">
			<img src="img/register.png">
			
		</div>
		<div class="ln">
			<center>
			<h1 class="a">Register</h1><br>
			</center>
			<form method="post" action="" enctype="multipart/form-data">
			<input type="text" class="b" name="fname" id="fname" placeholder="FirstName" required>
			<input type="text" class="b" name="lname" id="lname" placeholder="LastName"required>
			<input type="email" class="b" name="email" id="email" placeholder="Email"required>
			<input type="file" class="b2" name="fileToUpload" id="fileToUpload" placeholder="NoFilechoosen" required>
			<input type="password" class="b" name="password" id="password"placeholder="Password" required>
			<input type="password" class="b" name="conpass" id="conpass" placeholder="Confirm Password" required onkeyup="call2();">

			<select class="b3" required name='securityq'>
				<option disabled selected>Choose security option </option>
				<option>Your nick name</option>
				<option>Your pet name</option>
				<option>Your Favorate 4 digit number</option>
			</select>
				<input type="text" class="b" name="answer" id='answer' placeholder="Your Answer" required>
			<input type="submit" class="b1" name="submit"  value="submit">
				</form>
			<input type="submit" class="b11" value="Already have an account??" name="" onclick="call3();">   <br><br>
		
		</div>
	</div>
<script src="script/script.js"></script>
</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','rohith');
if(!$con){echo("<script>alert('not connected');</script>");}

if(isset($_POST['submit'])){
	extract($_POST);
	$sql="select * from lrms where EMAIL='$email'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count>0){
	echo("<script>alert('Email already exist')</script>");
}
else{
$password=md5($password);
$file=$_FILES['fileToUpload']['name'];
	$sql = "INSERT INTO lrms (FNAME,LNAME,EMAIL,PICTURE,PASSWORD,SECURITYQ,ANSWER) VALUES ('$fname','$lname','$email','$file','$password','$securityq','$answer')";
  $result=mysqli_query($con,$sql);
  if($result){
    if(isset($_POST['submit'])){
$target_dir = "profile/img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}}
echo('<script>swal("good Job","you clicked the button","success");</script>');
        }
       else{
       echo("<script>alert('something went wrong');</script>");
   }

}

}
?>