<?php


if ($_POST['send']=='call'){
 
 
    // отправка почты 
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$subject = "Обратная связь - ".$site_url; 

// админу
$to=$set[email];
$message = showtempl(dirname(__FILE__).'/templ/tpl_mail_admin.php');  

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);
 
$mes_zak='alert ("Менеджер свяжеться с вами в ближайшее время!!!")';
}

