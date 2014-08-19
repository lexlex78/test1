<?php

//заказ каталога
if ($_POST['cat']=='ok'){
    
    // запись в базу
 $db->execute("INSERT ".DB_PREFIX."cat_order SET status=1, name='$_POST[name]' , `index`='$_POST[index]' , country='$_POST[country]' , sity='$_POST[sity]', tel='$_POST[tel]', adr='$_POST[adr]' , data_cr=now() ");
 $ins_id=mysql_insert_id();

    // отправка почты 
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$subject = "ЗАКАЗ каталога  в интернет магазине - ".$site_url; 

// админу
$to=$set[email];
$message = showtempl(dirname(__FILE__).'/templ/tpl_mail_admin.php');  

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);
 
$mes_zak='alert ("Менеджер свяжеться с вами в ближайшее время!!!");
    document.location.href=document.location.href; ';
}
