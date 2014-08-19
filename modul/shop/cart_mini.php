<?php

/// корзина мини (без редактирования)
/// можно использовать в письмах указать $cart_email=1;
/// 
/// возврашает $shop_cart_mini


$t_kor='';
foreach ($_SESSION['tov'] as $k=>$v) {
if ($v['kol']>0)$t_kor .=$k.',';          
}


$summa=0;
$counter_kor=0;
$t_kor=trim ($t_kor,',');

if (empty($t_kor))$t_kor=0;

$dat=$db->select_id('SELECT p.* , i.img , e.name as f_en 
    FROM '.DB_PREFIX.'shop_produkt as p
    LEFT JOIN ' . DB_PREFIX . 'shop_produkt_img as i ON  p.id=i.pid 
    LEFT JOIN '.DB_PREFIX.'f_en as e  ON p.f_en=e.id  WHERE p.en=1 and p.id IN ('.$t_kor.')
    GROUP BY p.id ');
//echo '<pre>';
//print_r($dat);
//echo '</pre>';


$it_kor_r='';    
foreach ($_SESSION['tov'] as $k=>$v) {
if ($v['kol']>0){
   
//if ($dat[$k]['price_skid'])$dat[$k]['price']=$dat[$k]['price_skid'];
//вся сумма заказа
$summa=$summa+($dat[$k]['price']*$v['kol']);
//количество товаров
$counter_kor=$counter_kor+$v['kol']; 

$it_kor_r.='
<tr>
                                                <td colspan="1" class="width30">
                                                    <img width="89px" style="display: block;" class="fl_l" src="'.$site_url.'/img/shop/'.$dat[$k]['img'].'" alt="'.$dat[$k]['name'].'">
                                                </td>
                                                <td colspan="2" class="width70">
                                                    <span>'.$dat[$k]['name'].'</span>
                                                    <p>
                                                        <span class="item_price">'.$dat[$k]['price'].' руб.</span>
                                                        <span class="item_count">x'.$v['kol'].'</span>
                                                        <span class="final_price">'.($dat[$k]['price']*$v['kol']).' руб.</span>
                                                    </p>
                                                </td>
                                            </tr>
';    
}    
}


// расчет доставки
$s_dost=0;
$dost='<p>Доставка: <span class="red strong">БЕСПЛАТНО</span></p>'; 
$dost='';

if ($_SESSION['user']['get_']=='Доставка по Санкт-Петербургу'){
if ($summa<5000){
 $dost='<p>Доставка: <span class="red strong">200 р.</span></p>'; 
 $s_dost=200;
} 
else $dost='<p>Доставка: <span class="red strong">БЕЗПЛАТНО</span></p>';
    
}

if ($_SESSION['user']['get_']=='Другой город'){
$dost='<p>Доставка: <span class="red strong">уточняйте у менеджера</span></p>'; 
    
}


////////////

$summa=$summa+$s_dost;



$it_kor='<table class="small_basket">
                                        <thead>
                                            <tr>
                                                <th class="width70 textleft" colspan="2">Ваш заказ: товара '.$counter_kor.'</th>

                                               <th class="width30 textright">';
                                                   
   if ($cart_email!=1) $it_kor.='<a href="/cart">Редактировать</a></th>';
                                           $it_kor.= '</tr>
                                        </thead>
                                        <tbody>'.$it_kor_r.'
                                            </tbody>
                                    </table>
                                    
<div class="final_price">
                             '.$dost.'
                                <p class="block_full_price">Сумма заказа: <span class="all_item_price">'.$summa.' руб.</span></p>
                                
                            </div>';

$shop_cart_mini=$it_kor;


