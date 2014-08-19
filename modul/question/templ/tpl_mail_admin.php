<!DOCTYPE html>
<html lang="ru">
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">    
</head> 
<body>

<h1>Вопрос - <?=$GLOBALS['ins_id']?> в интернет магазине <?=$GLOBALS['site_url']?> </h1><br>

Имя: <? echo $_POST['name'] ?><br>
Телефон: <? echo $_POST['tel'] ?><br>
E-mail: <? echo $_POST['email'] ?><br>  
Вопрос: <? echo $_POST['text'] ?><br> 



</body>
</html>