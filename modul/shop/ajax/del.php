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
/// удаляем товар
//$_SESSION[tov][$_POST['tov']]['kol']--;
//if (($_SESSION[tov][$_POST['tov']]['kol'])<=0)
 unset($_SESSION[tov][$_POST['tov']]);


// создаем корзину
require '../cart.php';

// выводим

echo json_encode($shop_cart);


