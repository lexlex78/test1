<?php

$cart_email=0;
require 'cart_mini.php';

$sql =$db->select('SELECT * FROM '.DB_PREFIX.'contacts limit 1'); 

if ($_POST[send]=='ok'){
    
 $_SESSION['user']['name']=$_POST['name']; 
 $_SESSION['user']['tel']=$_POST['tel'];
 $_SESSION['user']['email']=$_POST['email'];
    
if (empty($_POST['tel']))JSRedirect('/chekout');

}


$sell1='';$sell2='';$sell3='';$sell4='';
if ($_SESSION['user']['get_']=='Доставка по Санкт-Петербургу')$sell1=' checked="checked" ';
if ($_SESSION['user']['get_']=='Другой город')$sell2=' checked="checked" ';
if ($_SESSION['user']['get_']==$sql[0]['adr'])$sell4=' checked="checked" ';
if ($_SESSION['user']['get_']==$set['adr'])$sell3=' checked="checked" ';


if ($_SESSION['user']['get']!='Самовывоз'){
    $sel1='class="active"';
    $sel2='class=""';
}else{
 $sel2='class="active"';
    $sel1='class=""';   
}


$pay1='checked';$pay2='';
if ($_SESSION['user']['pay']=='Наличный расчет'){$pay1='checked';$pay2='';}
if ($_SESSION['user']['pay']=='Безналичный расчет'){$pay1='';$pay2='checked';}


$center_area=showtempl(dirname(__FILE__).'/templ/tpl_chekout1.php');