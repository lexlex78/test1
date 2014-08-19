<?php
////////////////////// слайдер с товарами товары //////////////////////////////////////////
// вход $where , $limit 
// выход $soput;

$soput='<div class="clearfix related_items_slider">
                                <ul id="3items_slider" class="jcarousel-skin-tango display_table clearfix">'; 


    
 $zz=$db->select('SELECT p.* , i.img  , e.name as f_en FROM '.DB_PREFIX.'shop_produkt  as p LEFT JOIN '.DB_PREFIX.'shop_produkt_img as i ON  p.id=i.pid  LEFT JOIN '.DB_PREFIX.'f_en as e  ON p.f_en=e.id  WHERE p.en=1 and '.$where.'  GROUP BY p.id '.$limit);
 
 foreach ($zz as $v) {
     if ($v[img]){
 
$special='';if ($v['spec'])$special='special';
$news='';if ($v['new'])$news='new'; 
if ($v['price_old']>0)$v['price_old']='<span class="line-through old">'.number_format($v['price_old'], 0, '.', ' ').' руб.</span>';
else $v['price_old']='';
     
  $soput.='
      
      <li>
                                        <div class="labels clearfix">
                                            <div class="tags '.$special.' '.$news.'">
                                                <p class="tag_new">Новинка!</p>
                                                <p class="tag_special">Спецпредложение</p>
                                            </div>
                                            <div class="fl_l item_img">
                                                <center>
                                                    <a href="shop/'.shop_pid_url($v['pid']).$v['url'].'.html"><img src="img/shop/'.$v[img].'"></a>
                                                </center>
                                            </div>
                                            <div class="fl_r item_text">
                                                <h4><a href="shop/'.shop_pid_url($v['pid']).$v['url'].'.html">'.$v[name].'</a></h4>
                                                <p class="descriptions">'.$v[descr].'</p>
                                                <p class="item_price">
                                                    '.$v['price_old'].'
                                                    <span class="new">'.number_format($v['price'], 0, '.', ' ').' руб.</span>
                                                </p>';
  
                                     if (  $v['f_en']!='Нет в наличии')$soput.=' <a href="javascript:void(0);" onclick="bay('.$v['id'].')" class="btn">Купить</a>';
                                               
                                          $soput.= ' </div>
                                        </div>
                                    </li>';   
     }
 }   
   
 $soput.='</ul></div>';

//////////////////////////////////////////////////////