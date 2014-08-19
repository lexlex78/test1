<?php
require './core/conf.php';
require './core/db.php';
require './core/core.php';

/// уведомить о наличии //////////////////

$subscribe=$db->select ( "SELECT *, a.id as t_id FROM ".DB_PREFIX."product_en as a , ".DB_PREFIX."shop_produkt as b 
    WHERE a.en=0 and a.pid=b.id and f_en=1  ORDER BY data_cr  limit 10");

// перебираем подписчиков
foreach ($subscribe as $v){
//echo $v[email];

print_r($v);
    
//запрашиваем  фото
 $img=$db->select ( "SELECT * FROM ".DB_PREFIX."shop_produkt_img 
    WHERE pid=$v[id] limit 1"); 
 
 
  
 //формируем письмо 
  $message='Интернет магазин - '.$site_url.'.<br>
      Уведомление!!! У нас  появился в наличии
      интересующий Вас товар.<br><hr>
      
<table><tr>'; 
  
  $message.='                            <td>
                                <img width="100px" style="display: block;" class="fl_l" src="'.$site_url.'/img/shop/'.$img[0]['img'].'" alt="'.$v['name'].'">
                                <h4><a href="'.$site_url.'/shop/'.shop_pid_url($v['pid']).$v['url'].'.html">'.$v['name'].'</a></h4>
                                <p class="item_price">
                                    <span class="new">'.$v['price'].' руб.</span>
                                </p>
                            </td>
                            
 ';
  
$message.='<tr></table>'; 
     
     
     
 $message='   

<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">    
    </head> 
    <body>
<center>

<div>
'.$message.'
<hr>
</div>
</center>
    </body>
</html>
     


';
     
     
     
//отправляем письмо
$headers  = "Content-type: text/html; charset=utf8 \r\n"; 
$to=$v['email'];
$subject = "Уведомление с ".$site_url; 
$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
mail($to, $subject, $message, $headers);

//echo $message;

$db->execute( "UPDATE  ".DB_PREFIX."product_en  
    SET en=1 
    WHERE id=".$v['t_id']);


        
    
    
}