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
require_once './core.php';

// чистка поста
//foreach ($_POST as $k=>$v){$_POST[$k]=mysql_real_escape_string($v);}



//разбираем посты
$tabl=$_POST['p_tabl'];
$dat=str_replace("\\", "",$_POST['p_dat']);
file_put_contents('./mass.txt',$tabl );
$dat=unserialize($dat);
$id=$_POST['p_id'];

$sql='';
// типы даннх с '';
$tipy=array('color','text','img','img_m','data','tel','time','datatime','datatime','email','ftext','btext','sel_tabm','url');

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
 if ($_FILES[$k][tmp_name]){   
$path ="../..".$v['path'];

$iw=$v[imgw];$ih=$v[imgh];


if (empty($iw)){
$size = getimagesize ($_FILES[$k][tmp_name]); 
$iw=$size[0];$ih=$size[1];
}

$val=uploadimage($iw,$ih,$path,$k);
 }
else unset ($val);
}   
/////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////   
//есле картинка много картинок
if ($v['tip']=='img_m'){
$path ="../..".$v['path'];
$iw=$v[imgw];$ih=$v[imgh];

// удаление
$del=trim ($_POST[($k.'_del')],',');
if (!empty($del)){
// выборка с БД
  
 $ttemp=$db->select("SELECT * FROM ".DB_PREFIX.$v['tabl']." WHERE id in ($del)");
// удаляем файлы
    
foreach ($ttemp as $key => $value) {
    unlink($path.$value['img']);  
    echo $path.$value['img'];
                } 
// удаляем с БД
    
$db->execute("DELETE FROM ".DB_PREFIX.$v['tabl']."  WHERE id in ($del)");   
    
}

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
$db->execute("INSERT ".DB_PREFIX.$v['tabl']." SET pid=$id , img='$t_val'");
$t_id=mysql_insert_id();

}


$ttt='';
$zttt=$db->select ("SELECT * FROM ".DB_PREFIX.$v['tabl']."  WHERE pid=$id");
foreach ($zttt as $va) {
 $ttt.=$va['id'].',';  
}
$val=trim ($ttt,',');


$table_img[$v['tabl']]=$val;
    
//TODO: Удалить
//$qqq=print_r($_FILES,true);
//file_put_contents('./mass.txt', $qqq);
    
    
}

//////////////////////////////////////////////////////////////////////






if ($v['tip']=='bool'){
 if (!isset($val))$val=0; 
 }



//добовляем кавычки где нужно
if (isset($val)  && $k !='id' && $k !='sort'){ 
if (in_array($v['tip'],$tipy)){$val="'$val'";}
$sql.=' `'.$k."`=$val,";
}
}
 }
 $sql=trim($sql,",");
 
//TODO: Удалить
//file_put_contents('./mass.txt', "UPDATE ".DB_PREFIX."$tabl SET $sql WHERE id=$id");
 
$db->execute("UPDATE ".DB_PREFIX."$tabl SET $sql WHERE id=$id");

//// добовляем пид ко множеству картинок
// 
//if(count($table_img)>0){
// foreach ($table_img as $k=>$v){    
//    
// $db->execute("UPDATE  ".DB_PREFIX.$k." SET  pid='$id' WHERE id in ($v)");
// 
// 
// } 
//}

echo "ok";