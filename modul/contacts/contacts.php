<?

    
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'contacts limit 1'); 



$center_area.=showtempl(dirname(__FILE__).'/templ/tpl.php');



