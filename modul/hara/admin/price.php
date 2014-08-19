<?php

// Тип прайса
$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'name'=>array('tip'=>'text','name'=>'Название','r'=>1,'w'=>1,'ob'=>1),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
    'sort'=>array('tip'=>'sort','sort'=>'desc','r'=>0),
    );

$dan1=array(
  //  'where'=>'',//where к запросу
 //   'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
     'sort'=>0, // включть сортировку   
);

$admin_center_area.=tab_admin('hara_tip_pr','Тип прайса',$dan,$dan1);






$sel='Тип прайса: <select onchange="sleee()"  id="sel_foto"  name="sel">';
$dat=$db->select('SELECT * FROM '.DB_PREFIX.'hara_tip_pr WHERE en=1 ORDER BY sort desc ');

foreach ($dat as $v) {
  $ss='';if ($v['id']==$_GET['folder'])$ss='selected';
    
  $sel.='<option '.$ss.' value="'.$v['id'].'">'.$v['name'].'</option>';
}   
$sel.='</select ><br>';
if (!isset($_GET['folder']) && isset($dat[0]['id']) )$_GET['folder']=$dat[0]['id'];



$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'pid'=>array('tip'=>'sel_tab','name'=>'Тип прайса','r'=>0,'w'=>1,'tabl'=>'hara_tip_pr','td'=>'name','def'=>$_GET['folder']),
    'raz'=>array('tip'=>'text','name'=>'Размер,м','r'=>1,'w'=>1,'ob'=>1),
    'price'=>array('tip'=>'int','name'=>'Стоимость,руб','r'=>1,'w'=>1,'ob'=>1),
    'rub'=>array('tip'=>'int','name'=>'Под рубанок','r'=>1,'w'=>1,'ob'=>1),
    'en'=>array('tip'=>'bool','name'=>'Выводить','r'=>1,'w'=>1,'def'=>1),
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
    'in_sel_all'=>0,//включение выключение кнопки инвертировать выбор
   // 'sort'=>0, // включть сортировку   
);


$admin_center_area.=$sel;

//if ($_GET['folder'])
    $admin_center_area.=tab_admin('hara_price','Прайс',$dan,$dan1);
?>

<script type="text/javascript">
    function sleee (){
    document.location='/admin/?r=<?=$_GET['r']?>&folder='+$('#sel_foto').val();}
</script>