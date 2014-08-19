<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Админ Панель <?=$GLOBALS['title']?></title>
<link href="admin.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" type="text/css" href="/admin/css/style_menu.css" /> -->
<link type="text/css" href="/admin/css/smoothness/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
<link type="text/css" href="/admin/css/validationEngine.jquery.css" rel="stylesheet" />
<link type="text/css" href="/admin/css/tree.css" rel="stylesheet" />

<link type="text/css" href="/admin/css/examples-offline.css" rel="stylesheet" />
<link type="text/css" href="/admin/css/kendo.common.min.css" rel="stylesheet" />
<link type="text/css" href="/admin/css/kendo.silver.min.css" rel="stylesheet" />

<script type="text/javascript" src="/admin/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery.form.js"></script>
<script type="text/javascript" src="/admin/js/kendo.web.min.js"></script>
<script type="text/javascript" src="/admin/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="/admin/js/jquery.validationEngine-ru.js"></script>
<script type="text/javascript" src="/admin/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="/admin/js/jquery.treeview.js"></script>


<script type="text/javascript" src="/admin/js/cp/jquery.modcoder.excolor.js"></script>





<!-- flexigrid -->
<link type="text/css" href="/admin/css/flexigrid.css" rel="stylesheet" />
<script type="text/javascript" src="./js/flexigrid.pack.js"></script>
<!-- flexigrid -->

<!-- TinyMCE -->
<script type="text/javascript" src="/admin/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/admin/js/tiny_mce/tiny_mce_init.js"></script>
<!-- /TinyMCE -->

<style>

form td {border-bottom: 1px activecaption solid;padding: 5px;}
form table {font-size: 11px;}
 
body {
    font-family: Arial, Helvetica, sans-serif;
font-size: 12px;

}
</style>

<script type="text/javascript">
var sh_num=0;    
function del_tab (y,x){
$("#tr_"+x+y).remove();
sel=$("#tab_"+x+" tr");
zz='';
$.each(sel, function(index, value) {zz=zz+$(this).attr('num')+',';});
zz=zz.slice(0, -1);
$("#"+x).val(zz);
}              
    
function add_tab (x){
    
val=$("#nam_"+x).val(); 
name=$("#nam_"+x+" :selected").text(); 

sel=$("#tab_"+x+" tr");
// проверяем есле сть не добовляем
en=1;
$.each(sel, function(index, value) {if ($(this).attr('num')==val)en=0;});

if (en==1){

$("#tab_"+x).append("<tr id='tr_"+x+sh_num+"' num="+val+"><td>"+name+"</td><td onclick=\"del_tab("+sh_num+",\'"+x+"\')\"><a href='javascript:void(0);'> удалить <a/></td></tr>");

zz='';
sel=$("#tab_"+x+" tr");
$.each(sel, function(index, value) {zz=zz+$(this).attr('num')+',';});
zz=zz.slice(0, -1);
$("#"+x).val(zz);
sh_num++;
}





}


function del_m_f (a,b){
 z=$(a).parent().parent().parent().next().val();   
 $(a).parent().parent().parent().next().val(z+','+b);    
 $(a).parent().parent().html('');   
}

$(document).ready(function() {
                $("#admin_menu").kendoMenu();
               
         

            });
            
 
 
function close_win (id){
 $(id).data("kendoWindow").close();   
}
            
function open_win (id,text){
    
//     $(id).dialog({autoOpen: true,modal:true,width: 900,title: text+'+'});
//     $(id).dialog("open");
  
    $(id).kendoWindow({
                            modal: true,
                            title: text
                            
                        });
                        
                       $(id).data("kendoWindow").open().center();
                       
                    $('.colorpic').modcoder_excolor({
   z_index : 200000
   
});

                      
}           
            
            


</script>
</head>
<body style="min-width: 800px;">
    <!-- <img width="5px" style="padding:0px 5px 5px 5px;" src="/admin/css/images/up.png"/> -->
    
    <div style="width: 100%; height: 30px"><div style="float: left;font-size: 15px;padding:7px;color: #006666; ">CMS <b style="padding: 6px;background: #33be40;color: #fff">AE</b> <span style="font-size: 10px;">1.3</span> </div><div style="display: block;float: right;    font-size: 12px;padding:7px;"><span style="color: #006666">Пользователь:</span> <?=$_SESSION[adminuser]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #006666">Права:</span> <?=$GLOBALS['admin_tip']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login.php?logout=1">Exit</a></div></div>
    <div style="width: 100%; height: 3px;background: #33be40; block;margin-bottom: 7px;"></div>
    <div  style="display: block;margin-bottom: 7px;"><?=$GLOBALS['admin_topmenu']?></div>
    
                            <span style="color: red; font-weight: bold;">   <?=$GLOBALS['error']?>  </span>
                            <div  id="work_frame">
                            <?=$GLOBALS['admin_center_area']?>   
                            </div>    
      
   
    </body>
</html>