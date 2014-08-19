<?php

$t_kor='';
foreach ($_SESSION['tov'] as $k=>$v) {
if ($v['kol']>0)$t_kor .=$k.',';          
}

$it_kor='';
$summa=0;
$counter_kor=0;
$t_kor=trim ($t_kor,',');
if ($t_kor!=''){    
$dat=$db->select_id('SELECT p.* , i.img , e.name as f_en 
    FROM '.DB_PREFIX.'shop_produkt as p
    LEFT JOIN ' . DB_PREFIX . 'shop_produkt_img as i ON  p.id=i.pid 
    LEFT JOIN '.DB_PREFIX.'f_en as e  ON p.f_en=e.id  WHERE p.en=1 and p.id IN ('.$t_kor.')
    GROUP BY p.id ');
//echo '<pre>';
//print_r($dat);
//echo '</pre>';
    
foreach ($_SESSION['tov'] as $k=>$v) {
if ($v['kol']>0){
   
//if ($dat[$k]['price_skid'])$dat[$k]['price']=$dat[$k]['price_skid'];
//вся сумма заказа
$summa=$summa+($dat[$k]['price']*$v['kol']);
//количество товаров
$counter_kor=$counter_kor+$v['kol']; 

$it_kor.='
 <tr>
                            <td>
                                <img width="160px" style="display: block;" class="fl_l" src="img/shop/'.$dat[$k]['img'].'" alt="'.$dat[$k]['name'].'">
                                <h4><a href="/shop/'.shop_pid_url($dat[$k]['pid']).$dat[$k]['url'].'.html">'.$dat[$k]['name'].'</a></h4>
                                <p class="item_price">
                                    <span class="new">'.$dat[$k]['price'].' руб.</span>
                                </p>
                            </td>
                            <td>
                                <input id="b_count" onchange="javascript:izm_shop('.$k.',this);" class="text" type="text" value="'.$v['kol'].'">
                            </td>
                            <td>
                                <p class="all_item_price">
                                    <span class="new">'.($dat[$k]['price']*$v['kol']).' руб.</span>
                                    <a href="javascript:void(0);" onclick="del_shop('.$k.')"  class="cancel_item"></a>
                                </p>
                            </td>
</tr>    

';    
}    
}

$it_kor.='';

$shop_cart['popup']=showtempl(dirname(__FILE__).'/templ/tpl_cart.php');
}
else $it_kor='<tr><td> Корзина пуста !!!<td><tr>';

$shop_cart['popup']=showtempl(dirname(__FILE__).'/templ/tpl_cart.php');

// корзинка в футере

if ($counter_kor==0)$shop_cart['kor']='
                        <div class="curent_basket empty_basket">
                            <a href="javascript:void(0);" class="basket_link">Корзина<span class="basket_count "> </span></a>
                        </div>';
else{$shop_cart['kor']='<div class="curent_basket">
                            <a href="/cart" class="basket_link">Корзина<span class="basket_count"> ('.$counter_kor.')</span></a>
                        </div>
                        ';}
$shop_cart['kol']=$counter_kor;
 
$script_shop=showtempl(dirname(__FILE__).'/templ/tpl_script_shop.php'); 

