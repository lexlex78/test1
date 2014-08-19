<?php
/// сохранение резюме
$eror='';
if ($_POST['send_ok']){

   $eror='Файл загружен успешно'; 
if($_FILES["v"]["size"] > 200*1024)
   {
     $eror="Размер файла превышает 200кб";
    
   }
  else{ 
   if(is_uploaded_file($_FILES["v"]["tmp_name"]))
   {
          
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     $db->select('INSERT '.DB_PREFIX.'vac_rez SET data=now() , status=1, zag="'.$_POST['send_ok'].'"');  
     $id=$db->insert_id();
     $db->select('UPDATE '.DB_PREFIX.'vac_rez SET file="<a href=\"/img/vac/'.$id.$_FILES["v"]["name"].'\" >скачать</a>" WHERE id='.$id);
     move_uploaded_file($_FILES["v"]["tmp_name"], SITE_PATH."img/vac/".$id.$_FILES["v"]["name"]);
   } else {
      
      $eror="Ошибка загрузки файла";
   }    
  }
 $eror='alert ("'.$eror.'")
     
     document.location.href=document.location.href;
';   
}





$cash_mod='vac';
$cash=cash_read ($cash_mod);
if (!$cash){

$stat=$db->select('SELECT * FROM '.DB_PREFIX.'vac_op');
$stat=$stat[0]; 

// пажинация    
$sql =$db->select('SELECT COUNT(id) FROM '.DB_PREFIX.'vac WHERE en=1');
$all=$sql[0]['COUNT(id)'];
$pagin=paging($all,2,5);
    
$sql =$db->select('SELECT * FROM '.DB_PREFIX.'vac WHERE en=1  ORDER BY sort DESC LIMIT '.$pagin[1]);

$it='';
foreach ($sql as $k=>$v)
{ 
$it.='
    <div class="vacancy">
            <h2>'.$v[zag].'</h2>
            <h3>Требования:</h3>

            <p>'.$v[text].'</p>
            <h3>Условия:</h3>
            <p>'.$v[text1].'</p>

           <form name="rez'.$v[id].'" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="send_ok" value="'.$v[zag].'" />
                <h4>Прикрепите файл с резюме</h4>
                <input class="validate[required,custom[doc]] text-input" name="v" type="file">
                <p>Поддерживаются форматы: doc, docx, rtf, <br>
                    txt, odt, pdf  (200 Кб максимум)</p>
                <input type="submit" value="Отправить">
           </form>
      </div>';

}

$center_area=showtempl(dirname(__FILE__).'/templ/tpl.php');




cash_add ($cash_mod,120,$center_area);
}
else $center_area=$cash;

