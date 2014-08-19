<?php


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'banner WHERE en=1 ORDER BY sort desc');

$li=' <div class="idx_slider_id flexslider">
                        <ul class="slides">
                            
                     ';
foreach ($sql as $v)
{ 
//$kk=$k+1;if (strlen($kk)==1) $kk='0'.$kk;
//$aktiv='';
//if ($kk==1) $aktiv='class="active"';
$li.='
     <li>
                                <a href="'.$v[url].'"><img src="/img/banner/'.$v[img].'" /></a>
                                <div class="slider_text"><span>'.$v[zag].'</span></div>
                            </li>';

}
$li.='</ul></div>';

$banner_main.=$li;