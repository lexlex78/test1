<!DOCTYPE html>
<html lang="ru">
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">    
</head> 
<body>

<h1>ЗАКАЗ - <?=$GLOBALS['ins_id']?> в интернет магазине <?=$GLOBALS['site_url']?> </h1><br>

Имя: <? echo $_SESSION['user']['name'] ?><br>
Адрес: <? echo $GLOBALS['adr'] ?><br>
Контактный телефон: <? echo $_SESSION['user']['tel'] ?><br>
Контактный e-mai: <? echo $_SESSION['user']['email'] ?><br>

<hr>
<?=$GLOBALS['zak']?>


</body>
</html>