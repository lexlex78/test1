<?php
require './core/db.php';

if (($_POST[send]=='oki')){    
require './core/install/cr.php';    
    
    
    
}
else{
// сканируем папку modul формируем масив
$tt = scandir(SITE_PATH.'/modul');
foreach ($tt as $k => $v) {    
 $files= scandir(SITE_PATH.'/modul/'.$v.'/admin'); 
  if ($v!='.' && $v!='..') foreach ($files as $kk => $vv) {
      if ($vv!='.' && $vv!='..')$modul[$v][]=$vv;
  }
}
$pr='';
// выводим модули для установки
foreach ($modul as $k=>$v) {
$pr.='модуль: <b>'.$k.'</b> раздел : '; 
  foreach ($v as $kk=>$vv) {
      $vvv=trim ($vv,'.php');
   $pr.=$vvv.' <input class="ck" type="checkbox" name="modul[]" value="/'.$k.'/admin/'.$vv.'" /> ';    
  }  
$pr.='<br>';  
  
}


//echo '<pre>';
//print_r($modul);
//echo '</pre>';

?>
<script type="text/javascript" src="/admin/js/jquery-1.7.1.min.js"></script>
<button onclick="sel_all();">выбрать все</button><button onclick="unsel_all();">отменить все</button>
<form name="ff" method="POST">
<?=$pr?>   
<input type="submit" value="Установка" />
        <input type="hidden" name="send" value="oki" />
</form>
<script type="text/javascript">
function sel_all(){
 $('.ck').attr("checked", "checked");   
}
function unsel_all(){
  $('.ck').removeAttr("checked");   
}
</script>

<? }?>