<?php

//страница спосибо за заказ

$dat=$db->select('SELECT * FROM '.DB_PREFIX.'shop_thanks limit 1');

$sl='3';
$where=' p.spec=1 ';
$limit=' limit 10 ';
include 'slider.php';
   
$center_area=showtempl(dirname(__FILE__).'/templ/tpl_thanks.php');

