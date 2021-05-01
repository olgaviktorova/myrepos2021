<?php
$ofset = isset($_GET['o'])?$_GET['o']:false;
$method = isset($_GET['m'])?$_GET['m']:'getUpdates';
$method = str_replace('@', '&', $method);
$token = $token = $_SERVER['token'];
$url = "https://api.telegram.org/bot$token/$method";
if ($ofset)
	$url .= "?&offset=$ofset";
echo($url);
$res = file_get_contents($url);
$result = json_decode($res, true);
echo('<pre>');
print_r($result);
echo('</pre>');
?>