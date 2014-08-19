<?php


if ($_POST['send']=='ok'){
    
$_SESSION['user']['get']=$_POST['get']; 
$_SESSION['user']['get_']=$_POST['get_'];
$_SESSION['user']['pay']=$_POST['pay']; 

$_SESSION['user']['sity']=$_POST['sity'];
$_SESSION['user']['strit']=$_POST['strit'];
$_SESSION['user']['home']=$_POST['home'];
$_SESSION['user']['kv']=$_POST['kv'];

if ($_SESSION['user']['get_']=='Доставка по Санкт-Петербургу'){
 
$_SESSION['user']['sity']=$_POST['sity_'];
$_SESSION['user']['strit']=$_POST['strit_'];
$_SESSION['user']['home']=$_POST['home_'];
$_SESSION['user']['kv']=$_POST['kv_'];
    
}


}


$cart_email=0;
require 'cart_mini.php';


///заказ подтвержден

if ($_POST[send]=='okok'){
 
/// заказ    
$cart_email=1;
require 'cart_mini.php';
$zak=$shop_cart_mini;  
if ($_SESSION['user']['get']!='Самовывоз') {
$adr=$_SESSION['user']['sity'].'<br>'.$_SESSION['user']['strit'].' д. '.$_SESSION['user']['home'].', кв. '.$_SESSION['user']['kv'].'<br>'; 
}
else {
$adr=$_SESSION['user']['get_'];  
}
// запись в базу
 $db->execute("INSERT ".DB_PREFIX."shop_order SET status=1, summa=$summa, get='".$_SESSION['user']['get']."',  name='".$_SESSION['user']['name']."' , sity='$adr', tel='".$_SESSION['user']['tel']."', email='".$_SESSION['user']['email']."', data_cr=now() ,zak='$zak'");
 $ins_id=mysql_insert_id();
 
// отправка почты 
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$subject = "Заказ - ".$ins_id; 

// админу
$to=$set[email];$subject = "Заказ - ".$ins_id; 
$message = showtempl(dirname(__FILE__).'/templ/tpl_mail_admin.php');  

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);
 
// клиенту
if ($_SESSION['user']['email']){

$subject = "Заказ на сайте - ".$site_url; 
$to=$_SESSION['user']['email'];
$message = showtempl(dirname(__FILE__).'/templ/tpl_mail_client.php');  

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);
}

// удаление козины
unset ($_SESSION['tov']);

// для быстрого заказа востонавливваем козину
//if ($_POST['fast']){$_SESSION['tov']=$temp;}

JSRedirect('/thanks?id='.$ins_id);
}



$center_area=showtempl(dirname(__FILE__).'/templ/tpl_chekout2.php');