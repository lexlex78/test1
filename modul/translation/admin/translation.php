<?php

if($_GET[update_files]=='ok')
{ 
    foreach ($yaz as $vv){
    $put=SITE_PATH.'modul/translation/trans/translation_'.$vv.'.php';
    
    $str='';    
    //формирование содержания файла
    $mas_translatoin=$db->select("SELECT * FROM ".DB_PREFIX."translation");
    foreach ($mas_translatoin as $k=>$v)
    {
        $str.='$p[\''.$v['variable'].'\']=\''.$v[$vv].'\';'."\r\n";
        
    }

    $str='<? '.$str;
    
    //запись в файл
    file_put_contents($put,$str); 
        //отчет 
    $error_translation.='Файлы переводов '.$vv.' успешно обвлен!!!<br>';
    }
}

$dan=array(
    'id'=>array('tip'=>'id','name'=>'id','r'=>0),
    'variable'=>array('tip'=>'text','name'=>'Переменная','r'=>1,'w'=>1,'ob'=>1,'un'=>1),
    'ru'=>array('tip'=>'btext','name'=>'ru','r'=>1,'w'=>1,'ob'=>1),
    'ua'=>array('tip'=>'btext','name'=>'ukr','r'=>1,'w'=>1)
    );

$dan1=array(
    'where'=>'',//where к запросу
   // 'button'=>array('Ответить'=>array('url'=>'/modul/help/ajax/sendemail.php','multi'=>0)),// дополнительные кнопки в интерфейсе
    'add'=>1, //включение выключение кнопки добавить
    'edit'=>1,//включение выключение кнопки редактировать
    'del'=>1,//включение выключение кнопки удалить
    'sel_all'=>1,//включение выключение кнопки выбрать все
    'an_sel_all'=>1,//включение выключение кнопки отменить выбор
    'in_sel_all'=>1,//включение выключение кнопки инвертировать выбор
    'sort'=>0, // включть сортировку   
);


$admin_center_area.=$error_translation.'<br/><a href="/admin/?r=translation&update_files=ok">Обновить файлы переводов</a>';
$admin_center_area.=tab_admin('translation','переводы',$dan);

?>
