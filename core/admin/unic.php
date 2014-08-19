<?php
// проверка на уникальность


// защита от запростов с дургих сайтов
if (strpos($_SERVER['HTTP_REFERER'],'http://'.$_SERVER['HTTP_HOST'])===false)exit();
// проверка на сесию админа
session_start();
if ($_SESSION['admin']!='admin')exit();

//подключение БД
require '../conf.php';
require '../db.php';


/* RECEIVE VALUE */
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];



$validateError= "Запись не уникальна!!!";
$validateSuccess= "OK!";



/* RETURN VALUE */
$arrayToJs = array();
$arrayToJs[0] = $validateId;
        
$dan=  explode(';;', $_REQUEST['extraData']);
   
/// сама валидация
$valid=0; 
if ($validateValue!=''){

  
    if (isset($dan[0]) && isset($dan[1]) && !isset($dan[2]) ){
    $result = $db->select("SELECT id FROM ".DB_PREFIX.$dan[1]." WHERE ".$dan[0]."='".$validateValue."'");
        if (count($result)==0)$valid=1;
    }
    if (isset($dan[0]) && isset($dan[1]) && isset($dan[2]) ){
       $result = $db->select("SELECT id FROM ".DB_PREFIX.$dan[1]." WHERE ".$dan[0]."='".$validateValue."' AND id != ".$dan[2]);          
       if (count($result)==0)$valid=1;
    }
}
// ответ    
    
if($valid == 1){
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{	
        $arrayToJs[1] = false;
        echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
			
}

?>