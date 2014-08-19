<?php
$sel=$db->select("SELECT * FROM ".DB_PREFIX."hara_contact ");


$meta_title=$sel[0]['title_meta'];
$meta_keyw=$sel[0]['keyw_meta'];
$meta_descr=$sel[0]['descr_meta'];
$sql=$sel[0];



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






$center_area=showtempl(dirname(__FILE__).'/templ/tpl_contact.php');