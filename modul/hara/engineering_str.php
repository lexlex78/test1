<?php
$sql = 'SELECT * FROM '.DB_PREFIX.'hara_stroy WHERE en=1 and url=\''.$router[1].'\'';
$query = $db->select($sql);



// вывод страницы
if ($query){
$sel_str=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj WHERE en=1 and url='$route_file' and pid=".$query[0]['id']);
if (!$sel_str)$_GET['error']=404;
    
}
else $_GET['error']=404;

if ($_GET['error']!=404){
    
$sel_str=$sel_str[0];
 // фото
$pimg='';
if ($sel_str['img']!=''){$pimg='<img src="img/hara_proj/'.$sel_str['img'].'" alt="'.$sel_str['zag'].'" alt="'.$sel_str['zag'].'" />';   

$pimg_='img/hara_proj/'.$sel_str['img'];
}

$pimg1='';
if ($sel_str['img1']!=''){$pimg1='<img src="img/hara_proj/'.$sel_str['img1'].'" alt="'.$sel_str['zag'].'" title="План - 1" />';
$pimg_1='img/hara_proj/'.$sel_str['img1'];

}

$pimg2='';
if ($sel_str['img2']!=''){$pimg2='<img src="img/hara_proj/'.$sel_str['img2'].'" alt="'.$sel_str['zag'].'" title="План - 2" />';
$pimg_2='img/hara_proj/'.$sel_str['img2'];

}
// сылка след предидушая

$scount=$db->select("SELECT COUNT(id) FROM ".DB_PREFIX."hara_proj WHERE en=1 and pid=".$query[0]['id']." and sort > ".$sel_str['sort'].' ORDER BY sort DESC ');
$pi2=floor(($scount[0]['COUNT(id)']-1)/16);
$pi1=floor(($scount[0]['COUNT(id)']+1)/16);
// след
$ss=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj WHERE en=1 and pid=".$query[0]['id']." and sort < ".$sel_str['sort'].' ORDER BY sort DESC limit 1');
$ur='';if ($pi1>0)$ur='?page='.($pi1+1);
if ($ss)
$sled='<a class="next" href="/engineering/'.$query[0]['url'].'/'.$ss[0]['url'].'.html'.$ur.'" >След. проект</a>';

// pred
$ss=$db->select("SELECT * FROM ".DB_PREFIX."hara_proj WHERE en=1 and pid=".$query[0]['id']." and sort>".$sel_str['sort'].' ORDER BY sort ASC  limit 1');
$ur='';if ($pi2>0)$ur='?page='.($pi2+1);
if ($ss)
$pred='<a class="previus" href="/engineering/'.$query[0]['url'].'/'.$ss[0]['url'].'.html'.$ur.'" >Пред. проект</a>';

/// вывод каталога
 
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
     $act='';if($sel_str['id']==$value['id'])$act='active';
 $gal.='<a href="/engineering/'.$query[0]['url'].'/'.$value['url'].'.html'.$ur.'" class="item '.$act.' ">
            <img src="img/hara_proj/'.$value['img'].'">
            <div class="item_title item_title_black">
            <span>'.$value['zag'].'</span>
            </div>
        </a>';  
    
}
$gal.='';




$center_area=showtempl(dirname(__FILE__).'/templ/tpl_pr_str.php');
}