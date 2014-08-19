<?php





// рекомендуем
$sel=$db->select_id("SELECT * FROM ".DB_PREFIX."hara_stroy WHERE en=1");


$rec='';
$d_rec=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj  WHERE en=1 and rec=1 ORDER BY sort");
if ($d_rec){
 $rec='<div class="body"><div class="recommendations">
                <h3>Мы рекомендуем</h3>
                <div class="recommendations_flexslider flexslider">
                    <ul class="slides">';   
    
 
   
 foreach ($d_rec as $key => $value) {
    
 $rec.=''.$value['raz'].'
<li>
    <img class="fl_r" src="img/hara_proj/'.$value['img'].'">
    <div class="rec_text">
        <div class="rec_text_content">
            <h3>'.$value['zag'].'</h3>
            <p class="cost">Стоимость проекта '.$value['price'].' руб.</p>
            <p>'.str_smoll($value['text'],300).' <a href="/engineering/'.$sel[$value['pid']]['url'].'/'.$value['url'].'.html'.$ur.'">Подробнее ></a></p>
        </div>
    </div>
</li>     
';  
    
}

$rec.='</ul>
                </div>
            </div></div>';
}

$d_tip=$db->select("SELECT * FROM ".DB_PREFIX."hara_tip_pr  WHERE en=1 ORDER BY sort DESC");
$price='';
foreach ($d_tip as $v) {
    


// прайс лист

$d_pr=$db->select("SELECT * FROM ".DB_PREFIX."hara_price  WHERE en=1 and pid = ".$v['id']." ORDER BY sort");
if ($d_pr){
 $price.='<h2>'.$v['name'].'</h2>
                        
                        <div class="price">
                            <div class="title_price">
                                <div class="price_line"><p>Размер, м</p></div>
                                <div class="price_line"><p>Стоимость, руб</p></div>
                                <div class="price_line"><p>Под рубанок</p></div>
                            </div>
                            <div class="price_slider_id flexslider">
                            <ul class="slides">';   
    
 
   
 foreach ($d_pr as $key => $value) {
    
 $price.='<li>
                        <div class="price_item">
                            <div class="price_item_line"><p>'.$value['raz'].'</p></div>
                            <div class="price_item_line"><p>'.$value['price'].'</p></div>
                            <div class="price_item_line"><p>'.$value['rub'].'</p></div>
                        </div>
           </li>';  
    
}

$price.=' </ul>
                                <div class="price_slider_right"></div>
                        </div>
                        </div>
                        <p>* - пятистенок</p>
                        <div class="dashed"></div>';
    
}   
    
}



$center_area=showtempl(dirname(__FILE__).'/templ/tpl_price.php');
