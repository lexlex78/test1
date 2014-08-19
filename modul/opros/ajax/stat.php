<?php
// защита от запростов с дургих сайтов
if (strpos($_SERVER['HTTP_REFERER'],'http://'.$_SERVER['HTTP_HOST'])===false)exit();
// проверка на сесию админа
session_start();
if ($_SESSION['admin']!='admin')exit();
    
//подключение БД
require '../../../core/conf.php';
require '../../../core/db.php';

$sel=$db->select("SELECT * FROM ".DB_PREFIX."opros WHERE id=".$_GET['id']);
$sel=$sel[0];
echo '<center><h1> Статистика </h1>';
echo ''.$sel['qw_ru'].'<br><br>';

for ($i = 1; $i < 6; $i++) {
if ($sel['a'.$i.'_ru']!='')echo $sel['a'.$i.'_ru'].' - '.$sel['s'.$i].'<br><br>';  
}
echo "</center>";