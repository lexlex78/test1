<?php


$cash_mod='akcii'.$_GET[page];
$cash=cash_read ($cash_mod);
if (!$cash){
  
// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'akcii WHERE en=1 and `data_to` >= now()'); 
$all=$sql[0]['COUNT(id)'];
$pagin=paging($all,5,6);


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'akcii WHERE en=1 and `data_to` >= now()  ORDER BY `data` desc LIMIT '.$pagin[1]);

$it='';
foreach ($sql as $k=>$v)
{ 

     $img='';   
if ($v['img']!='')$img='<img src="img/akcii/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';
    
$it.='
    <li>
                                    <h3><a href="'.$site_url.'/promotions/'.$v['id'].'" >'.$v['zag_ru'].'</a><span class="stock_date">('.date('d.m.Y', strtotime($v['data'])).'- '.date('d.m.Y', strtotime($v['data_to'])).')</span></h3>
                                    <div class="stock_content">
                                        <center>
                                            <a href="'.$site_url.'/promotions/'.$v['id'].'">
                                               '.$img.'
                                            </a>
                                        </center>
                                    </div>
                                    <p class="news_text">'.str_smoll($v['text_'.$site_language],300).'</p>
                                    <a href="'.$site_url.'/promotions/'.$v['id'].'">Подробнее</a>
                                </li>
    

';

}

$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');




cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;
unset ($cash);
