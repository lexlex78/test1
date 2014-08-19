<?php


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'banner1 WHERE en=1 ORDER BY sort desc');

$li='<div class="wrapper cf">
         <div id="footer-bannner-wrapper">';
foreach ($sql as $v)
{ 
//$kk=$k+1;if (strlen($kk)==1) $kk='0'.$kk;
//$aktiv='';
//if ($kk==1) $aktiv='class="active"';
$li.='<a href="'.$v[url].'"><img src="/img/banner1/'.$v[img].'" alt=""></a>';

}
$li.='</div></div>';

$b_logo=$li; 
 