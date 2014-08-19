<?php
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'akcii WHERE en=1 and `data_to` >= now()   ORDER BY `data` desc LIMIT 3');

if ($sql){
$it='<div class="grey_block stock">
                            <div class="block_title">
                                <h3>Наши акции</h3>
                            </div>
                            <div class="block_content">
                                <ul> ';
foreach ($sql as $k=>$v)
{ 

//     $img='';   
//if ($v['img']!='')$img='<img src="img/news/'.$v['img'].'" alt="'.$v['zag_'.$site_language].'">';
    
$it.='
    

                                    <li>
                                        <span class="block_date">с '.date('d.m.Y', strtotime($v['data'])).'  по '.date('d.m.Y', strtotime($v['data_to'])).'</span>
                                        <a href="'.$site_url.'/promotions/'.$v['id'].'" class="block_list_title">'.$v['zag_ru'].'</a>
                                    </li>';

}
$mod_akcii=$it.'</ul>
                            </div>
                            <div class="block_more">
                                <a href="/promotions">Все акции</a>
                            </div>
                        </div> ';
}