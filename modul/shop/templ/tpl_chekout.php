
                <div class="body">
                    <div class="asside">
                        <div class="grey_block">
                            <div class="block_title block_steps">
                                <h3>Оформление заказа</h3>
                            </div>
                            <div class="block_content">
                                <ul class="steps">
                                    <li class="curent_step"><span class="step1"></span>Ваши данные</li>
                                    <li><span class="step2"></span>Доставка и оплата</li>
                                    <li><span class="step3"></span>Проверка данных</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page_content clearfix">
                        <div class="breadcrumbs">
                            <a href="/cart">Корзина</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a >Оформление заказа - Ваши данные</a>
                        </div>
                        
                        <div class="clearfix">
                            
                            <? if ($GLOBALS[counter_kor]<=0) { ?>    
<div class="alert"><p>ВНИМАНИЕ! Ваша корзина пуста. Для оформления заказа добавте товар в
корзину. </p></div>
<?} ?>
                            
                            
                            <div class="step_title">
                                <span>Шаг 1   Ваши данные</span>
                            </div>
                            <div class="step_content">
                                <div class="width50 fl_l">
                                    <form method="post" action="chekout1" id="send">
                                    <div class="step_input">
                                        <label for="display-name">Имя</label>
                                        <input id="display-name"  type="text" name="name" size="30" maxlength="30" value="<? echo $_SESSION['user']['name'] ?>" tabindex="105">
                                    </div>
                                    <div class="step_input">
                                        <label for="display-phone">Телефон</label>
                                        <input id="display-phone" class="validate[required,custom[phone]]" type="text" name="tel" size="30" maxlength="30" value="<? echo $_SESSION['user']['tel'] ?>" tabindex="105">
                                    </div>
                                    <div class="step_input">
                                        <label for="display-mail">E-mail</label>
                                        <input id="display-mail" class="validate[custom[email]]" type="text" name="email" size="30" maxlength="30" value="<? echo $_SESSION['user']['email'] ?>" tabindex="105">
                                    </div>
                                    <hr class="marginbottom10"/>
                                    <a class="btn step_next" href="javascript:void(0);" onclick="javascript:$('#send').validationEngine().submit();">Далее</a>
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
</script>