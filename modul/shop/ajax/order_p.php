<?php
// защита от запростов с дургих сайтов
if (strpos($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST'])===false)exit();



//подключение БД
require '../../../core/conf.php';
require '../../../core/db.php';
//подключение библиотек
require '../../../core/core.php';

// чистка поста
foreach ($_POST as $v){$v=mysql_real_escape_string($v);}

session_start();

$dat=$db->select('SELECT * FROM '.DB_PREFIX.'shop_order WHERE id ='.$_GET[id]);

echo showtempl(dirname(__FILE__).'/templ/tpl_order.php');





