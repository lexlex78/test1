<?php
$name_mod='';
echo 'Создание БД <br>';
$db->execute("CREATE DATABASE IF NOT EXISTS ".DB_NAME." CHARACTER SET utf8 COLLATE utf8_general_ci");

function tab_admin($tabl,$naz,$dan,$dan1){
    global $db,$name_mod;
    $name_mod=$naz;
    $tabl=DB_PREFIX.$tabl;

echo "Создание таблицы - ".$tabl.'<br>';
$db->execute("CREATE TABLE IF NOT EXISTS ".DB_NAME.".$tabl (`id` INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (`id`)) ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci");
$fild=$db->select('SHOW FIELDS FROM '.DB_NAME.'.'.$tabl);

foreach ($fild as $v) {
$fil[$v['Field']]='1';    
}
        

foreach ($dan as $k => $v) {
 
    // создаем папки
if ($v['path']){

  if (mkdir( SITE_PATH.trim ($v['path'],"/"), 0777)){
          chmod  ( SITE_PATH.trim ($v['path'],"/") , 0777);
          echo 'Созданна папка -'.$v['path'].'<br>';
  }
    }
    
 if (!isset($fil[$k])){
$sql='ALTER TABLE '.DB_NAME.'.'.$tabl.' ADD `'.$k.'` ';  
$tip='VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';



if ($v['tip']=='img')$tip='VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';

if ($v['tip']=='img_m'){$tip='TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
 //  создаем таблицу для картинок
echo 'Создание таблицы - '.DB_PREFIX.$v['tabl'].'<br>';

$db->execute("CREATE TABLE IF NOT EXISTS ".DB_PREFIX.$v['tabl']." 
(
`id` INT NOT NULL AUTO_INCREMENT ,
`pid` INT NOT NULL ,
`img` VARCHAR( 128 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = MYISAM ;   
");
    
};

if ($v['tip']=='text')$tip='VARCHAR(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='btext')$tip='VARCHAR(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='url')$tip='VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='num')$tip='INT NOT NULL';
if ($v['tip']=='int')$tip='INT NOT NULL';
if ($v['tip']=='dec')$tip='DECIMAL( 15, 2 ) NOT NULL';
if ($v['tip']=='tel')$tip='VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='email')$tip='VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='ftext')$tip='TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='sel_tab')$tip='INT NOT NULL';
if ($v['tip']=='sel_tabm')$tip='TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
if ($v['tip']=='data')$tip='DATE NOT NULL';
if ($v['tip']=='time')$tip='TIME NOT NULL';
if ($v['tip']=='datatime')$tip='DATETIME NOT NULL';
if ($v['tip']=='bool')$tip='BOOL NOT NULL';
if ($v['tip']=='sort')$tip='INT NOT NULL';
if ($v['tip']=='color')$tip='VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';


$db->execute($sql.$tip);    
}
}    
    
}

function tree_admin_red($tabl,$name,$dan,$n,$z_where){
 
$da=$dan['db'];
if (!$da[$dan['id']])$da[$dan['id']]['tip']='id';
if (!$da[$dan['pid']])$da[$dan['pid']]['tip']='num';
if (!$da[$dan['name']])$da[$dan['name']]['tip']='text';
if (!$da[$dan['sort']])$da[$dan['sort']]['tip']='sort';

tab_admin($tabl,$name,$da,$dan1);   
}
function tree_admin($tabl,$name,$dan,$n,$z_where){
//tree_admin_red($tabl,$name,$dan,$n,$z_where);    
}

foreach ($_POST['modul'] as $v) {
unset($dan,$dan1);  
include SITE_PATH.'/modul'.$v;

}

// востанавливаем базу site_tip_admin
$db->execute("CREATE TABLE IF NOT EXISTS ".DB_PREFIX."tip_admin (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5");

$db->execute("INSERT IGNORE INTO `".DB_PREFIX."tip_admin` (`id`, `name`) VALUES
(1, 'Cупер администратор'),
(2, 'Администратор'),
(3, 'Менеджер'),
(4, 'Пользователь')");

// делаем доступ супер админа на 111 111

$user=$db->select('SELECT * FROM '.DB_PREFIX.'admin_user WHERE log="111"');
if (!$user)$db->execute("INSERT IGNORE INTO `".DB_PREFIX."admin_user` (`log`, `pas` , `tip`) VALUES
('111', '111' ,'1')");


/// востановление amoduls
echo '<bR>востановление amoduls<br>';
// проверяем вкалдку инстал
$mod=$db->select('SELECT * FROM '.DB_PREFIX.'amodules WHERE url="/admin/?r=install"');
if ($mod)$module=$mod[0]['id'];
else {
    $db->execute("INSERT INTO `".DB_PREFIX."amodules` (`url`, `name` , `pid` , `access` , `en` ) VALUES
('/admin/?r=install', 'Инcталируемые', 0 ,'1,2,3' , '1')");
    $mod=$db->select('SELECT * FROM '.DB_PREFIX.'amodules WHERE url="/admin/?r=install"');
if ($mod)$module=$mod[0]['id'];
  // $module=$db->insert_id();
}
echo '<bR>проверяем вкалдку инстал <br>'; 
foreach ($_POST['modul'] as $v) {
$v=trim ($v,'.php');
$m=explode('/',$v);
$m[2]='/';

$url='/admin/?r='.$m[1].'/'.$m[3];
if ($m[1]==$m[3])$url='/admin/?r='.$m[1];

$un=$db->select('SELECT * FROM '.DB_PREFIX.'amodules WHERE url="'.$url.'"');
if (!$un){
//echo $url.'<br>';    
$mod=$db->select('SELECT * FROM '.DB_PREFIX.'amodules WHERE url like "/admin/?r='.$m[1].'%"');
if ($mod)$module=$mod[0]['pid'];    
$name=$m[3];
$db->execute("INSERT INTO ".DB_PREFIX."amodules (`url`, `name` , `pid` , `access` , `en` ) VALUES
('$url', '$name', $module ,'1,2,3' , 1)");
$id=$db->insert_id();
$db->execute("UPDATE ".DB_PREFIX."amodules SET sort=$id WHERE id=$id");
    
}

}

echo "OK!!!";