<?php
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'news WHERE en=1  ORDER BY `data` desc LIMIT 3');

$it='<div class="grey_block">
                            <div class="block_title">
                                <h3>Новости</h3>
                            </div>
                            <div class="block_content">
                                <ul>';
foreach ($sql as $k=>$v)
{ 

//     $img='';   
//if ($v['img']!='')$img='<img src="img/news/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';
    
$it.='
    
                                    <li>
                                        <span class="block_date">'.date('d.m.Y', strtotime($v['data'])).'</span>
                                        <a href="'.$site_url.'/news/'.$v['id'].'" class="block_list_title">'.$v['zag_ru'].'</a>
                                    </li>';

}
$mod_news=$it.' </ul>
                            </div>
                            <div class="block_more">
                                <a href="/news">Все новости</a>
                            </div>
                        </div>';