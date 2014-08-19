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
/// либо увеличиваем количество товара либо добовляем товар в корзину

if (isset ($_SESSION[tov][$_POST['tov']]['kol']))$_SESSION[tov][$_POST['tov']]['kol']++;
else {
 $dat=$db->select('SELECT * FROM '.DB_PREFIX.'shop_produkt WHERE en=1 and id='.$_POST['tov']);   
 if (isset($dat)){     
  $_SESSION[tov][$_POST['tov']]['kol']=1;
  $_SESSION[tov][$_POST['tov']]['cena']=$dat[0]['price'];
 // if($dat[0]['price_skid'])$_SESSION[tov][$_POST['tov']]['price']=$dat[0]['price_skid'];
 } 
}

// создаем корзину
require '../cart.php';

// выводим

echo json_encode($shop_cart);


