<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
extract($_FILES);
print_r($_FILES['fileToUpload']['name']);
?>
</body>
</html>