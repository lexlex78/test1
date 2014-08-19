                <div class="body">
                    <div class="asside">
                        <?=$GLOBALS['mod_akcii']?>
                    </div>
                    <div class="page_content clearfix">
                       <div class="breadcrumbs">
                            <a href="/">Корзина</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a >Оформление заказа - Ваши данные</a>
                        </div>

                        <div class="clearfix">
                            <div class="step_title">
                                <span>Спасибо за заказ</span>
<!--                                <p>Номер вашего заказа <strong><?//=$_GET[id]?></strong>.</p>-->
                            </div>
                            <p>
                            <?=$GLOBALS[dat][0]['text']?>
                            <p>    
                            <hr class="marginbottom10 margintop10"/>
                            <div class="clearfix">
                                <div class="step_title">
                                <span>Спецпредложения</span>
                                </div>
                                
                                <? echo $GLOBALS['soput'] ?>
                            </div>
                        </div>
                    </div>
                </div>
