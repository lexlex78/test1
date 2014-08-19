<?php
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'dost limit1 ');

$sql=$sql[0];


$dost_popp=$sql['text_dp'];

$left_dost='<div class="grey_block no-border">
                <div class="block_content page_left_block">
                    <h3 class="warranty clearfix"><span></span>Гарантии</h3>
                    <p>'.$sql['text_g_'].'</p>
                    <hr class="margintop10 marginbottom10" />
                    <h3 class="car clearfix"><span></span>Доставка<i onclick="openPopGet();"></i></h3>
                    <p>'.$sql['text_d_'].'</p>
                    <hr class="margintop10 marginbottom10" />
                    <h3 class="cash clearfix"><span></span>Оплата</h3>
                    <p>'.$sql['text_o_'].'</p>
                </div>
            </div>';


