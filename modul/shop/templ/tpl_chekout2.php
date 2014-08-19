
                <div class="body">
                    <div class="asside">
                        <div class="grey_block">
                            <div class="block_title block_steps">
                                <h3>Оформление заказа</h3>
                            </div>
                            <div class="block_content">
                                <ul class="steps">
                                    <li class="complete_step"><span class="step1"></span>Ваши данные</li>
                                    <li class="complete_step"><span class="step2"></span>Доставка и оплата</li>
                                    <li class="curent_step"><span class="step3"></span>Проверка данных</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="page_content clearfix">
                        <div class="breadcrumbs">
                            <a href="/cart">Корзина</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a >Оформление заказа - Проверка данных</a>
                        </div>
                        
                        <div class="clearfix">
                            <div class="step_title">
                                <span>Шаг 3 Проверка данных</span>
                            </div>
                            <div class="step_content step_c2">
                                <div class="width50 fl_l">
                                    <p class="sub_title">Ваши данные <a class="fl_r edit_link" href="/chekout">Редактировать</a></p>
                                    <div class="clearfix marginleft10">
                                   <? if($_SESSION['user']['name']){ ?> <p class="width30 fl_l">Имя</p><p class="width70 fl_l"><? echo $_SESSION['user']['name'] ?></p> <? } ?>
                                   <? if($_SESSION['user']['tel']){ ?> <p class="width30 fl_l">Телефон</p><p class="width70 fl_l"><? echo $_SESSION['user']['tel'] ?></p> <? } ?>
                                   <? if($_SESSION['user']['email']){ ?> <p class="width30 fl_l">E-mail</p><p class="width70 fl_l"><? echo $_SESSION['user']['email'] ?></p> <? } ?>
                                    </div>
                                    <hr class="margintop10"/>
                                    <p class="sub_title">Доставка и оплата <a class="fl_r edit_link" href="/chekout1">Редактировать</a></p>
                                    <div class="clearfix marginleft10">
                                    <p class="way_title">Способ доставки:</p>
                                    <p class="answer"><? echo $_SESSION['user']['get'] ?></p>
                                    
                                     <? if ($_SESSION['user']['get']!='Самовывоз') { ?>
                                    <p class="marginbottom10">
                                        
                                       г. <? echo $_SESSION['user']['sity'] ?><br>
                                        <? echo $_SESSION['user']['strit'] ?> д. <? echo $_SESSION['user']['home'] ?>, кв. <? echo $_SESSION['user']['kv'] ?>
                                        
                                    </p>
                                    
                                    <? } ?>
                                    
                                    <p class="way_title margintop10">Способ оплаты:</p>
                                    <p class="answer"><? echo $_SESSION['user']['pay'] ?></p>
                                    </div>
                                    <hr class="marginbottom10"/>
                                    
                                    <? if (($GLOBALS[summa]-$GLOBALS[s_dost] )>0) { ?>
                                     
                                    <form method="post" action="chekout2" id="send">
                                    <a class="btn step_complete" href="javascript:void(0);" onclick="javascript:$('#send').validationEngine().submit();">Заказ подтверждаю</a>
                                    </form>
                                    <script type="text/javascript">
                                     setTimeout('$(\'#send\').append(\'<input type="hidden" name="send" value="okok" />\');', 500);
                                    </script>
                                    
                                    <? } ?>
                                    
                                </div>
                                <div class="width45 fl_r marginleft10">
                                    <? echo $GLOBALS['shop_cart_mini'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
