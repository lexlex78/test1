<?php
// защита от запростов с дургих сайтов
if (strpos($_SERVER['HTTP_REFERER'],'http://'.$_SERVER['HTTP_HOST'])===false)exit();
// проверка на сесию админа
session_start();
if ($_SESSION['admin']!='admin')exit();

//подключение БД
require_once '../conf.php';
require_once '../db.php';
//подключение библиотек
require './core.php';

// чистка поста
//foreach ($_POST as $v=>$k){$_POST[$k]=mysql_real_escape_string($v);}

//разбираем посты
$dop_wh=($_POST['dop_wh']&&$_POST['p_tabl']?','.$_POST['dop_wh']:(!$_POST['p_tabl']&&$_POST['dop_wh']?$_POST['dop_wh']:''));
$tabl=$_POST['p_tabl'];
$dat=str_replace("\\", "",$_POST['p_dat']);
$dat=unserialize($dat);

$sort='';
$sql='';
// типы даннх с '';
$tipy=array('color','text','img','img_m','data','tel','time','datatime','datatime','email','ftext','btext','sel_tabm','url','url_s','int');

// перебераем поля состовляем запрос
foreach ($dat as $k => $v) {
$val='';   
// проверяем есле поле для записи  добовляем
if ($v['w']==1)
{
    $val=$_POST[$k];
    // разбирвем по типам и делаем действия
    
    
 /////////////////////////////////////////////////////////   
  //есле картинка
  if ($v['tip']=='img'){           
$path ="../..".$v['path'];


$iw=$v[imgw];$ih=$v[imgh];

if (empty($iw)){
$size = getimagesize ($_FILES[$k][tmp_name]); 
$iw=$size[0];$ih=$size[1];
}

$val=uploadimage($iw,$ih,$path,$k);
}   


/////////////////////////////////////////////////////////   
  //есле картинка много картинок
if ($v['tip']=='img_m'){
$path ="../..".$v['path'];
$iw=$v[imgw];$ih=$v[imgh];




foreach ($_FILES[$k]['name'] as $kk=>$vv){
$_FILES[('t_'.$k.$kk)]['name']=$_FILES[$k]['name'][$kk];    
$_FILES[('t_'.$k.$kk)]['type']=$_FILES[$k]['type'][$kk]; 
$_FILES[('t_'.$k.$kk)]['tmp_name']=$_FILES[$k]['tmp_name'][$kk];
$_FILES[('t_'.$k.$kk)]['error']=$_FILES[$k]['error'][$kk];
$_FILES[('t_'.$k.$kk)]['size']=$_FILES[$k]['size'][$kk];

if (empty($iw)){    
$size = getimagesize ($_FILES[$k][tmp_name]); 
$iw=$size[0];$ih=$size[1];
}

// сохроняем файл
$t_val=uploadimage($iw,$ih,$path,('t_'.$k.$kk));

// пишем в БД доп таблица
$db->execute("INSERT ".DB_PREFIX.$v['tabl']." SET  img='$t_val'");
$t_id=mysql_insert_id();

//значение для БД
$val.=$t_id.',';

}
$val=trim ($val,",");
$table_img[$v['tabl']]=$val;
    
//TODO: Удалить
//$qqq=print_r($_FILES,true);
//file_put_contents('./mass.txt', $qqq);
    
    
}


if ($v['tip']=='bool'){
 if (!isset($val))$val=0; 
 }
}
// флаг ели есть сортировка
if (($v['tip']=='sort')){$sort=$k;}

//добовляем кавычки где нужно
if ($val!=''){ 
if (in_array($v['tip'],$tipy)){$val="'".$val."'";}
$sql.=' `'.$k.'`='.$val.',';
}

 }
$sql=trim($sql,",");
  if($val1||$val2){
     $sql.=",`".$tabl_1."`='".$val1."',`".$tabl_2."`='".$val2."'";
 }
 $sql=trim($sql,",");
 
//TODO: Удалить
//file_put_contents('./mass.txt', "INSERT  ".DB_PREFIX."$tabl SET $sql");

$db->execute("INSERT ".DB_PREFIX."$tabl SET $sql $dop_wh");
$ins_id=mysql_insert_id();
if ($sort!='')$db->select("UPDATE ".DB_PREFIX."$tabl SET $sort=".$ins_id." WHERE id=".$ins_id."");
if(count($table_img)>0){
    
 // добовляем пид ко множеству картинок
    
 foreach ($table_img as $k=>$v){    
    
 $db->execute("UPDATE  ".DB_PREFIX.$k." SET  pid='$ins_id' WHERE id in ($v)");
 
 
 }   
   
}
echo "ok";
