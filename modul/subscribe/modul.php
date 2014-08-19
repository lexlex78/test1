<?php
//модуль подписки и рассылки новостей

// формирование блоков
//$subscribe_mod=showtempl(dirname(__FILE__).'/templ/tpl_mod.php');
$subscribe_mod='';
// активация
if ($_GET['activ'] and $_GET['cod']){
$_GET['activ']=  base64_decode($_GET['activ']);  
$_GET['cod']=  base64_decode($_GET['cod']);  
    
$res=$db->select("SELECT id from ".DB_PREFIX."sub WHERE email='".$_GET['activ']."' and id='".$_GET['cod']."' ");    
if ($res){
$db->execute("UPDATE ".DB_PREFIX."sub SET activ=1 WHERE id=".$res[0]['id']); 
$subscribe_mod.='<script type="text/javascript">alert (\'Вы активировали расcылку!!!\');</script>';
}
}

// деактивация
if ($_GET['deactiv'] and $_GET['cod']){
$_GET['deactiv']=  base64_decode($_GET['deactiv']);  
$_GET['cod']=  base64_decode($_GET['cod']);
    
$res=$db->select("SELECT id from ".DB_PREFIX."sub WHERE email='".$_GET['deactiv']."' and id='".$_GET['cod']."' ");    
if ($res){
$db->execute("UPDATE ".DB_PREFIX."sub SET unset=1 WHERE id=".$res[0]['id']); 
$subscribe_mod.='<script type="text/javascript">alert (\'Вы отписались от расcылки!!!\');</script>';
}
}



//обработка блоков
if ($_POST['sub']=='ok'){
$res=$db->select("SELECT id from ".DB_PREFIX."sub WHERE email='".$_POST['email']."'");    
if  (count($res)==0){   
    
$db->execute("INSERT ".DB_PREFIX."sub SET en=1 , email='".$_POST['email']."' , data_cr=now()"); 
$codd=$db->insert_id();
// отправка письма с активацией

$to  = $_POST['email'];
$subject ='Активация рассылки '.$site_url; 

$message = ' 
<html> 
    <head> 
        <title>Активация рассылки '.$site_url.'</title> 
    </head> 
    <body> 
      Для активации рассылки перейдите по сылке: 
        <a href="'.$site_url.'/?activ='.base64_encode($_POST['email']).'&cod='.base64_encode($codd).'"> активация <a>    
    </body> 
</html>'; 

$headers  = "Content-type: text/html; charset=utf8 \r\n";
$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers); 




$subscribe_mod.='<script type="text/javascript">alert (\'Вам на почту отправленно письмо активации расcылки!!!\');</script>'; 
}
else {
$subscribe_mod.='<script type="text/javascript">alert (\'Вы уже зарегестрированны!!!\');</script>'; 
}

}
