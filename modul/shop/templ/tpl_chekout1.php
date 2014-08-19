<div class="body">
                    <div class="asside">
                        <div class="grey_block">
                            <div class="block_title block_steps">
                                <h3>Оформление заказа</h3>
                            </div>
                            <div class="block_content">
                                <ul class="steps">
                                    <li class="complete_step"><span class="step1"></span>Ваши данные</li>
                                    <li class="curent_step"><span class="step2"></span>Доставка и оплата</li>
                                    <li><span class="step3"></span>Проверка данных</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page_content clearfix">
                        <div class="breadcrumbs">
                            <a href="/">Корзина</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a >Оформление заказа - Доставка и оплата</a>
                        </div>
                        
                        <div class="clearfix">
                            <div class="step_title">
                                <span>Шаг 2   Доставка и оплата</span>
                            </div>
                            <div class="step_content step_c2">
                                <div class="width50 fl_l">
                                    <form method="post" action="chekout2" id="send">
                                    <p class="sub_title">Способ доставки</p>
                                    <ul class="tabs">
                                        <li onclick="sel1(this)" <? echo $GLOBALS['sel1'] ?> class="active"><a href="javascript:void(0);">Курьерская доставка</a></li>
                                        <li onclick="sel1(this)" <? echo $GLOBALS['sel2'] ?> ><a href="javascript:void(0);">Самовывоз</a></li>
                                    </ul>
                                    <div class="tab1">
                                        <div class="clearfix">
                                            <div class="step_input radio"> 
                                                <input onclick="h_dost()" id="get1" class="fl_l asel validate[required]" type="radio" name="get_" <? echo $GLOBALS['sell1'] ?> value="Доставка по Санкт-Петербургу">
                                                <label class="marginleft10" for="get1">Доставка по Санкт-Петербургу</label>
                                            </div>
                                            <div class="text_of_radio ">
                                                <p>Укажите адрес доставки</p>
                                                <div class="step_input adress_inputs">
                                                    <input class="validate[required] display-city" type="hidden" name="sity_" size="30" maxlength="30" value="Санкт-Петербург" tabindex="105">
                                                  <input placeholder="Улица" class="validate[required] display-street" type="text" name="strit_" size="12" maxlength="50" value="<? echo $_SESSION['user']['strit'] ?>" tabindex="105">
                                                   <input placeholder="Дом" class="validate[required] display-house" type="text" name="home_" size="7" maxlength="30" value="<? echo $_SESSION['user']['home'] ?>" tabindex="105">
                                                    <input placeholder="Кв." class="validate[required] display-apt" type="text" name="kv_" size="4" maxlength="30" value="<? echo $_SESSION['user']['kv'] ?>" tabindex="105">
                                                   
                                                </div>
                                               
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="step_input radio">
                                                <input onclick="h_dost()" id="get2" class="fl_l asel validate[required]" type="radio" name="get_" <? echo $GLOBALS['sell2'] ?>  value="Другой город">
                                                <label class="marginleft10" for="get2">Другой город</label>
                                            </div>
                                            <div class="text_of_radio ">
                                                <p>Укажите полный адрес доставки</p>
                                                <div class="step_input">
                                                    <input placeholder="Город" class="validate[required] display-city" type="text" name="sity" size="30" maxlength="30" value="<? echo $_SESSION['user']['sity'] ?>" tabindex="105">
                                                </div>
                                                <div class="step_input adress_inputs">
                                                                                                  
                                                    
                                                  <input placeholder="Улица" class="validate[required] display-street" type="text" name="strit" size="12" maxlength="50" value="<? echo $_SESSION['user']['strit'] ?>" tabindex="105">
                                                   <input placeholder="Дом" class="validate[required] display-house" type="text" name="home" size="7" maxlength="30" value="<? echo $_SESSION['user']['home'] ?>" tabindex="105">
                                                    <input placeholder="Кв." class="validate[required] display-apt" type="text" name="kv" size="4" maxlength="30" value="<? echo $_SESSION['user']['kv'] ?>" tabindex="105">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab2 ">
                                        <div>
                                            <div class="step_input radio">
                                                <input id="get3" class="fl_l validate[required]" type="radio" name="get_" <? echo $GLOBALS['sell3'] ?>  value="<? echo $GLOBALS['set']['adr'] ?>">
                                                <label class="marginleft10" for="get3"><? echo $GLOBALS['set']['adr'] ?> </label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="step_input radio">
                                                <input id="get4" class="fl_l validate[required]" type="radio" name="get_" <? echo $GLOBALS['sell4'] ?>  value="<? echo $GLOBALS['sql'][0]['adr'] ?>">
                                                <label class="marginleft10" for="get4"><? echo $GLOBALS['sql'][0]['adr'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="margintop10"/>
                                    <p class="sub_title">Оплата</p>
                                
                                    
                                    <div class="step_input radio">
                        <input id="pay1" class="fl_l" type="radio" name="pay" <? echo $GLOBALS['pay1'] ?> value="Наличный расчет">
                        <label class="marginleft10" for="pay1">Наличный расчет</label>
                    </div>
                    <div class="step_input radio">
                        <input id="pay2" class="fl_l" type="radio" name="pay" <? echo $GLOBALS['pay2'] ?> value="Безналичный расчет">
                        <label class="marginleft10" for="pay2">Безналичный расчет</label>
                    </div>
                    <hr class="marginbottom10"/>
                    <a class="btn step_next" href="javascript:void(0);" onclick="javascript:$('#send').validationEngine().submit();" >Далее</a>
                    
                    <input id ="h_get" type="hidden" name="get" value="" />
                    
                    </form>
                                    
                                    
                                </div>
                                <div class="width45 fl_r marginleft10">
                                    <? echo $GLOBALS['shop_cart_mini'] ?>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<script type="text/javascript">
  setTimeout('$(\'#send\').append(\'<input type="hidden" name="send" value="ok" />\');', 500);
  
function sel1 (a){

        $('.tabs li').removeClass('active');
        $(a).addClass('active');
        h_dost();
}  
  
  
function  h_dost() {
  
a=$('.tabs .active a').text();
if (a=='Самовывоз'){
    $('.tab1').hide(); 
    $('.tab2').show(); 
}
  else{
    $('.tab2').hide(); 
    $('.tab1').show(); 
      
}
  
  $('#h_get').val(a);
  
  $('.asel').parent().parent().find('.text_of_radio').hide();
    $('.asel:checked').parent().parent().find('.text_of_radio').show();
    
// z=$('input[name="get_"]').is(':checked');
// 
// if(!z)$('.step_next').hide();
// else $('.step_next').show();
    
    
}
  
h_dost();  
  
</script>