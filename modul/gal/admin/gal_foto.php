<?php

$sel='Фото альбом: <select onchange="sleee()"  id="sel_foto"  name="sel">';
$dat=$db->select('SELECT * FROM '.DB_PREFIX.'gal_cat ORDER BY sort desc ');

foreach ($dat as $v) {
  $ss='';if ($v['id']==$_GET['folder'])$ss='selected';
    
  $sel.='<option '.$ss.' value="'.$v['id'].'">'.$v['name_ru'].'</option>';
}   
$sel.='</select ><br>';
if (!isset($_GET['folder']) && isset($dat[0]['id']) )$_GET['folder']=$dat[0]['id'];



$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'pid'=>array('tip'=>'sel_tab','name'=>'Папка галереи','r'=>0,'w'=>1,'tabl'=>'gal_cat','td'=>'name_ru','def'=>$_GET['folder']),
    'img'=>array('tip'=>'img','name'=>'Фото','r'=>1,'w'=>1,'path'=>'/img/gal/','imgw'=>600 ,'imgw_s'=>120),
    'text'=>array('tip'=>'btext','name'=>'Текст','r'=>1,'w'=>1,'ob'=>1),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    
   // 'dat_up'=>array('tip'=>'datatime','name'=>'Дата создания','r'=>1,'w'=>1,'def'=>date('Y-m-d H:i')),
    'view'=>array('tip'=>'num','r'=>0,'w'=>0),
    'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

if ($_GET['folder'])$tt='pid='.$_GET['folder'];
$dan1=array(
    'where'=>$tt,//where к запросу
    //'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
   // 'sort'=>0, // включть сортировку   
);

//  tab_admin админ таблица (название таблицы в БД,название визуальное, масив данных  , еще масив данных)
//$admin_center_area=tab_admin('test','Тест Админки',$dan,$dan1);

$admin_center_area.=$sel;

if ($_GET['folder'])$admin_center_area.=tab_admin('gal_foto','Фото',$dan,$dan1);
?>

<script type="text/javascript">
    function sleee (){
    document.location='/admin/?r=gal/gal_foto&folder='+$('#sel_foto').val();}
</script>