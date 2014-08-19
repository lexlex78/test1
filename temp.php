<?php

$url=$_SERVER['REQUEST_URI'];
$aurl=explode('/', $url);
if ($aurl[1]=='index.php'){
unset ($aurl[1]);
$url=  implode('/', $aurl);

header('HTTP/1.1 301 Moved Permanently');
header('Location: '.$url);
exit();

}

?>
