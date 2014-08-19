<?php
if ($_POST['send']=='ok'){
    
    
    

   $eror='Файл загружен успешно'; 
if($_FILES["v"]["size"] > 6000*1024)
   {
     $eror="Размер файла превышает 6000кб";
    
   }
  else{ 
   if(is_uploaded_file($_FILES["v"]["tmp_name"]))
   {
          
      move_uploaded_file($_FILES["v"]["tmp_name"], SITE_PATH."img/pdf/catalog.pdf");
   } else {
      
      $eror="Ошибка загрузки файла";
   }    
  }
 $eror='alert ("'.$eror.'")
     document.location.href=document.location.href; 
';
 
    
    
    
    
}



$admin_center_area='<br>
<fieldset style="background:#fff ;">
<center>
<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="send" value="ok" />
Выбирете pdf файл каталога: <input class="validate[required,custom[pdf]]" type="file" name="v" value="" />
<input type="submit" value="загрузить" />
</form>
</center>
</fieldset>
<script>
$("form").validationEngine();
'.$eror.'
</script>
';

