<div class="body">
    <div class="asside">
      <? echo $GLOBALS['cat_w'] ?>
        <div class="grey_block parameters">
            <div class="block_title">
                <h3>Подбор по параметрам</h3>
            </div>
            <div class="block_content">

    <? if (!empty($_GET['filtr'])){ ?>
    <a href="<? echo cr_url_get('filtr') ?>" class="clear_filter marginbottom10">Очистить параметры</a>
    <? } ?>
                    
                    <hr class="marginbottom10" />
                    
                    
                    <? echo $GLOBALS['fil'] ?>
                    
                    

            </div>
        </div>
    </div>
    <div class="page_content clearfix">
        <div class="breadcrumbs">
            <? echo $GLOBALS['kroshki']?>
        </div>
        <div class="title-page-with-filters">
            <h1><? echo $GLOBALS['cat_name'] ?></h1>
            <? echo $GLOBALS['filtr_all'] ?>

        </div>
        <div class="row sort-view skyblue-links clearfix">
            
                            <div id="sort_view" class="cell sort fl_l">
                                Выводить:
                                <a class="xhr sprite dropdown" name="drop_link" href="javascript:void(0)">
                                 <? echo $GLOBALS['mes_sort'] ?>
                                </a>
                                <div class="popup-dropdown">
                                    <ul>
                                        <? echo $GLOBALS['sel_sort'] ?>
                                    </ul>
                                </div>
                            </div>
            
            <div class="cell view fl_r">
                Показать:
                <a class="show_list <? echo $GLOBALS['viv1'] ?> " href="<? echo cr_url_get('view','off') ?>">списком</a>
                <a class="show_table <? echo $GLOBALS['viv2'] ?> " href="<? echo cr_url_get('view','on') ?>">плиткой</a>
            </div>
        </div>
        <div class="clearfix">
            <ul <? echo $GLOBALS['viv']?>>
                
                
                                
              <? echo $GLOBALS['it']?>
                          
            </ul>
        </div>
        <div class="metro_style_pagination">
                <div class="metro_style_nav">
                    
                    
                  
                    <?=$GLOBALS['pagin'][0]?> 
                   
                </div>
        </div>
    </div>
</div>

                
                
                <!-- ////////// popup /////////////// -->
                
                <span style="display: none;">
                            <div id="popup5">
                                <h3>Для оформления заявки заполните поля ниже:</h3>

                                <p class="req">*- поля, обязательные для заполнения</p>

                                <form method="POST">
                                    <input type="hidden" name="cat" value="ok" />
                                    <div class="form-side">
                                        <div><label for="t1">Имя получателя *</label><input class="validate[required]" name ="name" type="text" id="t1"></div>
                                        <div><label for="t2">Адрес *</label><input class="validate[required]" name="adr" type="text" id="t2"></div>
                                        <div><label for="t3">Город *</label><input class="validate[required]" name="sity" type="text" id="t3"></div>
                                    </div>
                                    <div class="form-side">
                                        <div><label for="t4">почтовый индекс *</label><input class="validate[required]" name="index" type="text" id="t4"></div>
                                        <div><label for="t5">Страна *</label><input class="validate[required]" name="country" type="text" id="t5"></div>
                                        <div><label for="t6">Телефон *</label><input name="tel" class="validate[required]" type="text" id="t6"></div>
                                    </div>
                                    <p>Пожалуйста, проверьте правильность заполнения полей перед отправкой формы. Точная контактная информация поможет нам связаться с Вами в кратчайшие сроки.
                                        <br> <strong>Мы гарантируем, что сведения из Вашей заявки не будут раскрыты третьим лицам.</strong>
                                        </p>

                                    <div class="button-area">
                                        <div class="submit buy-button gray" ><input type="submit"  value="Отправить"></div>

                                    </div>
                                </form>
                            </div>
                            

                        </span>
                <script>
                                <?=$GLOBALS['mes_zak']?>
                                    
                </script>
         
         
 
                            
                            
                            