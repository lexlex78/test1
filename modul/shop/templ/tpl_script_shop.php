<script>
    
function bay (a){
    
     $.ajax({
         type: "POST",
         url: "modul/shop/ajax/bay.php",
         data: {tov:a}
          }).done(function( msg ) {
          var cart = jQuery.parseJSON ( msg );
  $('#shop_cart').html(cart['kor']);
  $('#shop_popup').html(cart['popup']);
  openPopUp(    );
    
          });
    
}

function uved (a){
  $('#en_id').val(a);  
  openPopEn();  
}


function del_shop (a){
    
     $.ajax({
         type: "POST",
         url: "modul/shop/ajax/del.php",
         data: {tov:a}
          }).done(function( msg ) {
          var cart = JSON.parse ( msg );
          
     
       
          
  $('#shop_cart').html(cart['kor']);
  $('#shop_popup').html(cart['popup']);
  if (cart['kol']<=0 && window.location.pathname=='/chekout') window.location.reload(); 
  
    });
    
}

function izm_shop (a,b){
    c=$(b).val();
        $.ajax({
         type: "POST",
         url: "modul/shop/ajax/chen.php",
         data: {tov:a ,tov_kol:c}
          }).done(function( msg ) {
          var cart = jQuery.parseJSON ( msg );
  $('#shop_cart').html(cart['kor']);
  $('#shop_popup').html(cart['popup']);
  
    });
    
}



</script>


<div class="pop_up" id="shop_popupp"><a href="javascript:void(0)" onclick="javascript:closePopUp(event);" class="close_pop_up"></a>
    <div class="get_page_subtitle">
        <p>Корзина</p>
    </div>
    <span id="shop_popup"></span>
    <a id="continue_shoping" class="page_back" href="javascript: void(0);" onclick="closePopUp()">Продолжить покупки</a>
</div>


<script>

function parseGetParams() { 
   var $_GET = {}; 
   var __GET = window.location.search.substring(1).split("&"); 
   for(var i=0; i<__GET.length; i++) { 
      var getVar = __GET[i].split("="); 
      $_GET[getVar[0]] = typeof(getVar[1])=="undefined" ? "" : getVar[1]; 
   } 
   return $_GET; 
}

function parse(a) { 
   var $_GET = {}; 
   var __GET = a.split(";"); 
   for(var i=0; i<__GET.length; i++) { 
      var getVar = __GET[i].split("-");
      var ttt='';
      for(var ii=1; ii<getVar.length; ii++) {
      ttt=ttt+'-'+getVar[ii];
      }
      $_GET[getVar[0]] =ttt.substring(1, ttt.length);
   } 
   return $_GET; 
}
         
      function set_filtr(a,kk){
          
          // разбираем get
   var     zap=parseGetParams(); 
   
   
         
       // разбираем фильтр
       if (zap['filtr'])
         filtr=parse(zap['filtr']);
         else filtr={};
      
       // устанавливаем выбранные
       
      max=$(a).prev('input').val();
      min=$(a).prev('input').prev('input').val(); 
      
    // alert (kk+' '+min+' '+max);
     filtr[kk]=min+'-'+max;      
//        $.each($('.int'), function (){
//            
//        
//        t=$(this).attr('id').substr(1);
//        t1=$(this).val().split(' ');
//       
//        filtr[t]=t1[0];    
//        
//       
//        })
            
     /// собираем фильтр     
       var f='';
       for (var key in filtr) {
       var val = filtr [key];
       if (val!='') f=f+key+'-'+val+';';
       }
     // собираем урл
      zap["filtr"]=f;
      var z='';
       for (var key in zap) {
       var val = zap [key];
       if (val!='') z=z+key+'='+val+'&';
       }
       
   
      
      
      if (z!=''){
          z=z.substring(0, z.length - 1);
          z='?'+z;
      }
       
   //   alert (z);    
      
document.location.href=document.location.pathname+z;
      }   
         
    
                    
           
</script>




<div id="pop_en" class="pop_up pop_up_small pop_ask">
    <a href="javascript:void(0)" onclick="closePopUp()" class="close_pop_up"></a>
    <div class="clearfix">
        <div class="page_title margintop10">
            <p>Сообщите, когда появится в продаже</p>
        </div>
        <span>Заполните, пожалуйста, все поля.</span>
        <form method="post" id="pop_en_form">
        
        <div class="step_input">
            <label for="display-mail">E-mail</label>
            <input id="display-mail" class="validate[required]" type="text" name="email" size="30" maxlength="30" value="" tabindex="105">
        </div>
        
        <button class="btn blue_btn small_btn" type="submit">Отправить</button>
        
        <input id="en_id" type="hidden" name="id" value="" />
        </form>
    </div>
</div>


 <div id="pop_en_ok" class="pop_up pop_up_small pop_ask">
            <a href="javascript:void(0)" onclick="location.href=location.href;" class="close_pop_up"></a>
            <div class="clearfix">
                <div class="page_title margintop10">
                    <p>Мы сообщим, когда появится в продаже данный товар !!!</p>
                </div>
                
                <button class="btn blue_btn small_btn" onclick="location.href=location.href;">OK</button>
                
            </div>
 </div>

<script type="text/javascript">
  setTimeout('$(\'#pop_en_form\').append(\'<input type="hidden" name="en" value="ok" />\');', 2000);

<?echo $GLOBALS['mess_en']?>
</script>


 <div id="pop_get" class="pop_up pop_up_small pop_get">
            <a href="javascript:void(0)" onclick="closePopUp()" class="close_pop_up"></a>
            <div class="clearfix">
                <div class="page_title">
                    <p>Доставка</p>
                </div>
                <?echo $GLOBALS['dost_popp']?>
                <p class="margintop10 textright">
                    <a href="/delivery_payment">Полные условия доставки</a>
                </p>
            </div>
        </div>