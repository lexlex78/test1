<?php
//модуль подписки и рассылки новостей


//обработка блоков
if ($_POST['question']=='ok'){
 
    $mess='openPopUp_ok();';
    
   
$db->execute("INSERT ".DB_PREFIX."question SET  text='".$_POST['text']."' ,  tel='".$_POST['tel']."' , name='".$_POST['name']."' , email='".$_POST['email']."' , data_cr=now()"); 
$ins_id=mysql_insert_id();

// отправка почты 
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$subject = "Вопрос - ".$ins_id; 

// админу
$to=$set[email];$subject = "Вопрос - ".$ins_id; 
$message = showtempl(dirname(__FILE__).'/templ/tpl_mail_admin.php');  

$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);

}

$question=showtempl(dirname(__FILE__).'/templ/tpl.php');