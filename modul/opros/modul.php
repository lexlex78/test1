<?php
/// модуль опроса

$sel=$db->select("SELECT * FROM ".DB_PREFIX."opros WHERE en=1 limit 1");
$sel=$sel[0];
$it='';
$it_all=0;
for ($i = 1; $i < 6; $i++) {
if ($sel['a'.$i.'_'.$site_language]!='') {
 $it.='<label for="ans'.$i.'">
<input type="radio" class="validate[required]"  name="ansss" id="ans'.$i.'" value="'.$i.'">
<span>'.$sel['a'.$i.'_'.$site_language].'</span>
</label>';  
}
}

if ($_POST['opros']=='ok' && !empty($_POST['ansss']) ){
if (!isset($_SESSION['opros'])){    
$db->execute ("UPDATE ".DB_PREFIX."opros SET s".$_POST['ansss']."=s".$_POST['ansss']."+1 WHERE id=".$sel['id']);   
$sel['s'.$_POST['ansss']]++;   
$mes_opros='<script type="text/javascript">alert (\''.$p['opros_sp'].'\');</script>'; 
$_SESSION['opros']=1;
}
else 
{
 $mes_opros='<script type="text/javascript">alert (\''.$p['opros_un'].'\');</script>';    
}
}

for ($i = 1; $i < 6; $i++) {
if ($sel['a'.$i.'_'.$site_language]!='') {
  $it_all=$it_all+$sel['s'.$i];      
}
}

$opros_modul=showtempl(dirname(__FILE__).'/templ/tpl.php');