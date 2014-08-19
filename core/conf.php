<?php
//mysql connection params
define('DB_SERVER', 'localhost');
define('DB_USER', 'test7');
define('DB_PASS', 'v4JDJF1L');
define('DB_NAME', 'test7');
define('DB_PREFIX', 'site_');


/// режим отладки 1 -да 0 - нет
define(DEBAG, 1);


$site_url='http://'.$_SERVER['HTTP_HOST'];

$arr = pathinfo(__FILE__);
$arr = pathinfo($arr['dirname']);
define('SITE_PATH', $arr['dirname'].'/');


// языки используемые на сайте 1 й по умолчанию
$yaz=array('ru',);

//параметры кеширование
// тип кеширования 0 - нет, 1 - файл , 2 - мемкеш
define('CASH', 0);