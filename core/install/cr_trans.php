<?php
require './core/db.php';

// сканируем папку modul формируем масив
$tt = scandir(SITE_PATH.'/modul/translation/trans');
foreach ($tt as $k => $v) {    
if ($v!='.' && $v!='..') { 
    unset($p);  
    include './modul/translation/trans/'.$v;   

$leg=substr(trim($v,'.php'),12);

foreach ($p as $k => $v) {
echo $leg.' '.$k.'-'.$v.'<br>';   
$mod=$db->select('SELECT * FROM '.DB_PREFIX.'translation  WHERE variable="'.$k.'"');
if (!$mod) $db->select('INSERT '.DB_PREFIX.'translation  SET variable="'.$k.'" , '.$leg.'="'.$v.'" ');
else $db->select('UPDATE '.DB_PREFIX.'translation  SET '.$leg.'="'.$v.'" WHERE variable="'.$k.'"  ');

}

}
}
