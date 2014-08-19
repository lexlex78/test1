<?php


if ($_POST['send']=='par'){
 
 
    // отправка почты 
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$subject = "Заявка на партнерство - ".$site_url; 

// админу
$to=$set[email];
$message = showtempl(dirname(__FILE__).'/templ/tpl_mail_admin.php');  

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);
 
$mes_zak='alert ("Менеджер свяжеться с вами в ближайшее время!!!")';
}


$sel=$db->select("SELECT * FROM ".DB_PREFIX."partnery ");
if ($sel){
    
$it=$sel[0]['text'];
$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');
$meta_title=$sel[0]['title'];
$meta_keyw=$sel[0]['keyw'];
$meta_descr=$sel[0]['descr'];
}
else $_GET['error']=404;
