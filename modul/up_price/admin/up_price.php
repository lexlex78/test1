<?php
if ($_POST['send']=='ok'){
    
    
if(is_uploaded_file($_FILES["price"]["tmp_name"]))
   {
    
    $zz=$_FILES["price"]["name"];
    $zz1= explode('.',$zz);
    if ($zz1[1]=='xls' || $zz1[1]=='xlsx'){
    
     move_uploaded_file($_FILES["price"]["tmp_name"], SITE_PATH."upload/price.".$zz1[1]);
    
     echo("OK!");  
    }
    else {
     echo("Ошибка . Выберите xls либо xlsx файл!");   
    }
     
     
     
   } else {
      echo("Ошибка загрузки файла!");
   }
    
    
}
$admin_center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');


