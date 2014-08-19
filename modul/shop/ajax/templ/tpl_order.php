<!DOCTYPE HTML>
<!--[if IE 7 ]>
<html class="ie7 ie"><![endif]-->
<!--[if IE 8 ]>
<html class="ie8 ie"><![endif]-->
<!--[if IE 9 ]>
<html class="ie9 ie"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html><!--<![endif]-->
<head>
          <title><?=$GLOBALS['meta_title']?></title>
          <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
          <base href="<?=$GLOBALS['site_url']?>"/>
        <meta name="description" content="<?=$GLOBALS['meta_descr']?>"/>
        <meta name="keywords" content="<?=$GLOBALS['meta_keyw']?>"/>
          <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
          <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>
          <script type="text/javascript" src="js/jquery.bxSlider.min.js"></script>
          <script type="text/javascript" src="js/jquery.plaxmove.js"></script>
          <script type="text/javascript" src="js/js.js"></script>
          <script type="text/javascript" src="js/jquery.validationEngine-ru.js"></script>
          <script type="text/javascript" src="js/jquery.validationEngine.js"></script>

          <link rel="stylesheet" type="text/css" href="css/all.css" media="all"/>
          <link type="text/css" href="css/validationEngine.jquery.css" rel="stylesheet" />
</head>
<body <?=$GLOBALS['body_cvet']?>  >
    <center>
    <h1>ЗАКАЗ № - <?=$GLOBALS['dat'][0]['id']?></h1>
    <div style="width: 400px;">
  <?=$GLOBALS['dat'][0]['zak']?>
     
<hr>
Имя: <?=$GLOBALS['dat'][0]['name']?><br>
Город: <?=$GLOBALS['dat'][0]['sity']?><br>
Контактный телефон: <?=$GLOBALS['dat'][0]['tel']?><br>
Контактный e-mai: <?=$GLOBALS['dat'][0]['email']?><br>
Комментарии: <?=$GLOBALS['dat'][0]['com']?><br>
   </div>
    </center>

</body>
</html>
