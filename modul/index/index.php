<?
// стартовая страница

$cash_mod='index'.$site_language;
$cash=cash_read ($cash_mod);
if (!$cash){

//подключения модуля для стартовой страницы
$d_modul=array('banner','shop_filtr');
foreach ($d_modul as $v) if (file_exists("./modul/$v/modul.php"))include "./modul/$v/modul.php";


// стартовая страница
$sel=$db->select("SELECT * FROM ".DB_PREFIX."index");
$meta_title=$sel[0]['title_meta'];
$meta_keyw=$sel[0]['keyw_meta'];
$meta_descr=$sel[0]['descr_meta'];
$sel=$sel[0];


$start_page=showtempl(dirname(__FILE__).'/templ/tpl.php');







/// спец предложения и акции    
$where=' p.spec=1 or p.new=1 ';
$limit=' limit 15 ';




$soput='<div class="clearfix">
                        <h1 class="title">Новинки, спецпредложения</h1>
                        <div class="clearfix new_items_slider">
                            <ul id="4_items_slider" class="jcarousel-skin-tango display_table clearfix">';

    
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
   
 $soput.='</ul></div></div>';








///////////////

$center_area.=showtempl(dirname(__FILE__).'/templ/tpl_index.php');

cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;