<?
session_start();

require 'conf.php';

if (DEBAG==1){
// клас замера времени работы скрипта
require 'timer.php';
$timer = new timer();
$timer->start_timer();

if ($_SERVER['REQUEST_URI']=='/install.ini'){require './core/install/install.php';exit();}
if ($_SERVER['REQUEST_URI']=='/tt.php'){require './core/install/cr_trans.php';exit();}

}
else error_reporting(0);


require 'router.php';
require 'db.php';
require 'core.php';


//чистка GET и POST
$_pattern = array('&', "'", '"', '<', '>', '\\');
$_replacement = array('&amp;', '&#039;', '&quot;', '&lt;', '&gt;', '\\\\');
$_GET = str_replace($_pattern, $_replacement, $_GET);
$_POST = str_replace($_pattern, $_replacement, $_POST);

//разбор роутера (r=модуль/файл)
//$file="";$modul="";
if (!empty($_GET['r'])){$temp= explode ('/', $_GET['r']);
$modul=$temp[0];
if (isset($temp[1])) $file=$temp[1];
else $file=$temp[0];
}


//подключения модуля поумолчанию
$d_modul=array('set','menus','dost','shop','news','article','akcii','question'); 
foreach ($d_modul as $v) if (file_exists("./modul/$v/modul.php"))include "./modul/$v/modul.php";





//подключение модуля по запросу
if (!$file && $modul)$file=$modul;
if( !empty ($modul) && !empty ($file)){
if (file_exists("./modul/$modul/$file.php"))include "./modul/$modul/$file.php";else $_GET['error']=404;
}else $_GET['error']=404;

//обработка 404
if ($_GET['error']==404){
  $title = "Ошибка 404 - Такой страницы не существует!";
  $templ = './templ/404_tpl.php';
  $all = showtempl($templ); 
  header("HTTP/1.0 404 Not Found");
  echo $all;
  exit;
}

//разруливаем шаблоны
$templ='./templ/main_tpl.php';
//if($modul=='albums' || $modul=='myroom') $templ='./templ/main_tpl.php'; 

    

/// есле нет мето тегов добовляем
if (!$meta_title)$meta_title='';
if (!$meta_descr)$meta_descr='';
if (!$meta_keyw)$meta_keyw='';

///вывод всего сайта
$all=showtempl($templ);
echo $all;

if (DEBAG==1){
echo '<div style="position: fixed;z-index: 99999;
    padding: 6px; bottom:10px;left: 10px;  opacity: 0.7;
    color: #0066FF; background: #fff;
    border: #ccc 1px solid;" >Режим разработки<br>';
echo round($timer->end_timer(),6);
echo  ' сек <br>';
echo memory_get_usage();
echo  ' байт <br>';
$tt='нет';if ($db->con==1)$tt='да';
echo 'БД подключение - '.$tt.'<br>';
echo 'БД запросов - '.$db->i.'<br>';
echo "</div>";
}