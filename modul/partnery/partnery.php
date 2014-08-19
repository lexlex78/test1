<?php




$sel=$db->select("SELECT * FROM ".DB_PREFIX."partnery_gor WHERE en=1 ORDER BY sort desc  ");
if ($sel){
    
 $it='<h2>Наши партнеры</h2>';
 
 foreach ($sel as $v) {
     
 $it.='<h3>'.$v['sity'].'</h3>
     <p>'.$v['text'].'<p>';    
     
 }
    

    
$center_area=showtempl(dirname(__FILE__).'/templ/tpl_1.php');
}
else $_GET['error']=404;
