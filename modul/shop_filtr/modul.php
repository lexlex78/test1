<?php


$sql =$db->select('SELECT * FROM '.DB_PREFIX.'brend WHERE en=1 ORDER BY sort desc');

$li='<h2 class="title">Бренды</h2>
                        <div class="clearfix brand_slider">
                            <ul id="5_items_slider" class="jcarousel-skin-tango clearfix">';
foreach ($sql as $v)
{ 
//$kk=$k+1;if (strlen($kk)==1) $kk='0'.$kk;
//$aktiv='';
//if ($kk==1) $aktiv='class="active"';
$li.='
     <li>
                                    <center>
                                       <a href="/?s='.$v['name'].'" > <img src="/img/banner/'.$v[img].'"></a>
                                    </center>
                                </li>';

}
$li.='</ul></div>';

$brend_main.=$li;