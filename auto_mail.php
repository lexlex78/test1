<?php
require './core/conf.php';
require './core/db.php';
require './core/core.php';

$subscribe=$db->select ( "SELECT * FROM ".DB_PREFIX."sub 
    WHERE en=1 AND activ=1 AND unset=0 ORDER BY data_update  limit 5");

// перебираем подписчиков
foreach ($subscribe as $v){
//echo $v[email];
//запрашиваем свежие новости для подписчика
 $news=$db->select ( "SELECT * FROM ".DB_PREFIX."news 
    WHERE en=1 AND data_cr>'".$v['data_update']."' limit 10"); 
 
 // есле новсти есть отправляем и обновляем data_update в базе
 if ($news){
  
 //формируем письмо 
  $message='<table>';   
 foreach ($news as $n){
 $message.='<tr>
 <td><span>'.$n[data].'</span>
 <td><a href="'.$site_url.'/news/'.$n[id].'"><img src="'.$site_url.'/img/news/'.$n[img].'" width="178" alt=""></a>
 <td><h2><a class="article-title" href="'.$site_url.'/news/'.$n[id].'">'.$n[name].'</a></h2>
 <br>'.str_smoll($n['text_ru'],300).'
 <br><a class="read-more" href="'.$site_url.'/news/'.$n[id].'">Читать подробнее</a><br> <br>   


';     
     
 } 
 $message.='</table>'; 
     
     
     
 $message='   

<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">    
    </head> 
    <body>
<center>
<h1>Новости с '.$site_url.'</h1>
<div>
'.$message.'
<hr>

Для отказа от рассылки перейдите по сылке: 
        <a href="'.$site_url.'/?deactiv='.base64_encode($v['email']).'&cod='.base64_encode($v[id]).'"> отписаться <a> 

</div>
</center>
    </body>
</html>
     


';
     
     
     
//отправляем письмо
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$to=$v['email'];
$subject = "Новости с ".$site_url; 
$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);

//echo $message;

$db->execute( "UPDATE  ".DB_PREFIX."sub  
    SET data_update=now() 
    WHERE id=".$v['id']);

}
        
    
    
}