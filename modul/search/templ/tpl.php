<div class="content">
                <div class="body">
                    <div class="asside">
                       <?=$GLOBALS['mod_akcii']?>
                     
                       <?=$GLOBALS['mod_news']?>
                        <?=$GLOBALS['mod_article']?>
                    </div>
                    <div class="page_content clearfix">
                        <div class="breadcrumbs">
                            <a href="/">Главная</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a >Поиск</a>
                        </div>
                        <div class="title-page-with-filters">
<!--                            <h1>Картриджи</h1>-->
                            <p class="skyblue-links">
                                По запросу "<?=$GLOBALS['s']?>" найдено: <strong><? echo $GLOBALS['col'] ?></strong>
                            </p>
                        </div>
                        
                        <div class="clearfix">
                            <ul class="display_list">
                                
                                <?=$GLOBALS['it']?>
                                
                            </ul>
                        </div>
                        <div class="metro_style_pagination">
                            <div class="metro_style_nav">
                                
                              <?=$GLOBALS['pagin'][0]?>   
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>