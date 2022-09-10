<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="big();">
	<div class='flex-container'>
	<div class='left'>
<img src="img/login.png">
</div>
<!-- popup box-->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3><p>Reset Password</p><h3>
  <form method="post" action="">

    <input class="input em" type="text" id='mail' name="femail" placeholder="enter your Email"><i></i>
    
    <input class="input em" disabled="disabled" type="text" name="ans" placeholder="enter your Answer">

    <input type="submit" class='login-btn' id='buttt' name="reset" value="reset">
    
</form>
<span>Your Security Question:</span> <span id='ques'>edfde</span>
  </div>

</div>
<div class='right'>
	<h1>Login</h1>
<form method="post" action="">
	<label id='label'>Invalid Username or password</label>
	<input type="email" name="email" id='email' class="input" placeholder="Email" required="required" onclick="cal();">

	<input type="password" name="password" id='password' class="input" placeholder="Password" required="required">

	<input type="submit" name="submit" value='Login' class='login-btn'>

	<input type="submit" name="submit" value='Create New Account' class='login-btn' onclick="call();">
</form>
<br><br><br>
<u><a id='myBtn'>forgot password</a></u>
</div>
</div>
<script src="script/script.js">
</script>
</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','rohith');
if(!$con){echo("<script>alert('not connected');</script>");}


if(isset($_POST['reset'])){
	echo("<script>alert('how');</script>");
}

if(isset($_POST['submit'])){
   extract($_POST);
   $password=md5($password);
	$sql="select * from lrms where EMAIL='$email' AND PASSWORD='$password'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count>0){
		session_start();
		$_SESSION['user']=$email;
		header("location:profile/index.php");
	}
	else{
		echo("<script>document.getElementById('label').style.display='block';</script>");
	}

}
?>
