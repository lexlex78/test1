<?php
$sql = 'SELECT * FROM '.DB_PREFIX.'hara_stroy WHERE en=1 and url=\''.$route_file.'\'';
$query = $db->select($sql);

if ($query){
 
    // пажинация    
$sqll =$db->select("SELECT COUNT(id) FROM ".DB_PREFIX."hara_proj WHERE en=1 and pid='".$query[0]['id']."'"); 
$all=$sqll[0]['COUNT(id)'];
$pagin=paging($all,16,5);
    
// выборка проектов 
$sel=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj WHERE en=1 and pid='".$query[0]['id']."' ORDER BY sort DESC   limit ".$pagin[1]);

$meta_title=$sel[0]['title_meta'];
$meta_keyw=$sel[0]['keyw_meta'];
$meta_descr=$sel[0]['descr_meta'];



$gal='';
foreach ($sel as $key => $value) {
    
  $ur=''; if ($_GET['page'])$ur='?page='.$_GET['page'];
    
 $gal.='<a href="/engineering/'.$query[0]['url'].'/'.$value['url'].'.html'.$ur.'" class="item">
            <img src="img/hara_proj/'.$value['img'].'">
            <div class="item_title item_title_black">
            <span>'.$value['zag'].'</span>
            </div> 
        </a>';  
    
}
$gal.='';



$center_area=showtempl(dirname(__FILE__).'/templ/tpl_pr.php');
}
else $_GET['error']=404;



