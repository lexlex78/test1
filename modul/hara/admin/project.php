<?php



$sel='Тип прайса: <select onchange="sleee()"  id="sel_foto"  name="sel">';
$dat=$db->select('SELECT * FROM '.DB_PREFIX.'hara_stroy WHERE en=1 ORDER BY sort desc ');

foreach ($dat as $v) {
  $ss='';if ($v['id']==$_GET['folder'])$ss='selected';
    
  $sel.='<option '.$ss.' value="'.$v['id'].'">'.$v['razd'].'</option>';
}   
$sel.='</select ><br>';
if (!isset($_GET['folder']) && isset($dat[0]['id']) )$_GET['folder']=$dat[0]['id'];



$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'pid'=>array('tip'=>'sel_tab','name'=>'Тип проекта','r'=>0,'w'=>1,'tabl'=>'hara_stroy','td'=>'razd','def'=>$_GET['folder']),
    
    'zag'=>array('tip'=>'text','name'=>'Заголовок','r'=>1,'w'=>1,'ob'=>1),
    'url'=>array('tip'=>'text','name'=>'URL (symbols)','r'=>0,'w'=>1,'ob'=>1),
    'price'=>array('tip'=>'int','name'=>'Стоимость,руб','r'=>1,'w'=>1,'ob'=>1),
    
    'img'=>array('tip'=>'img','name'=>'Картинка основная','r'=>1,'w'=>1,'path'=>'/img/hara_proj/','imgw'=>900,/*'imgh'=>190 */),
    'img1'=>array('tip'=>'img','name'=>'Картинка 1','r'=>0,'w'=>1,'path'=>'/img/hara_proj/','imgw'=>900,/*'imgh'=>190 */),
    'img2'=>array('tip'=>'img','name'=>'Картинка 2','r'=>0,'w'=>1,'path'=>'/img/hara_proj/', 'imgw'=>900,/*'imgh'=>190 */),
    
  // 'data'=>array('tip'=>'data','name'=>'Дата','r'=>1,'w'=>1,'ob'=>1,'def'=>date('Y-m-d')),
    
    'text'=>array('tip'=>'ftext','name'=>'Текст','r'=>0,'w'=>1),
    'text_s'=>array('tip'=>'ftext','name'=>'Текст_скрытый','r'=>0,'w'=>1),
    
     'descr_meta'=>array('tip'=>'btext','name'=>'meta_descr','r'=>0,'w'=>1),
    'keyw_meta'=>array('tip'=>'btext','name'=>'meta_keyw','r'=>0,'w'=>1),
    'title_meta'=>array('tip'=>'btext','name'=>'meta_title','r'=>0,'w'=>1),
    
    
    'rec'=>array('tip'=>'bool','name'=>'Рекомендуем','r'=>1,'w'=>1,'def'=>1),
    'pop'=>array('tip'=>'bool','name'=>'Популярные','r'=>1,'w'=>1,'def'=>1),
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
    $admin_center_area.=tab_admin('hara_proj','Проекты',$dan,$dan1);
?>

<script type="text/javascript">
    function sleee (){
    document.location='/admin/?r=<?=$_GET['r']?>&folder='+$('#sel_foto').val();}
</script>