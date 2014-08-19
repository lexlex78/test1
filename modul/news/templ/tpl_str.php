                <div class="body">
                    <div class="asside">
                        <?=$GLOBALS['mod_akcii']?>
                        <?=$GLOBALS['mod_article']?>
                    </div>
                    <div class="page_content clearfix">
                        <div class="breadcrumbs">
                            <a href="/">Главная</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a href="/news">Новости</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a ><?=$GLOBALS['sql']['zag_ru']?></a>
                        </div>
                        <div class="page_content_text clearfix">
                            <div class="page_title">
                                <p class="date"><?=date('d.m.Y', strtotime($GLOBALS['sql']['data']))?></p>
                                <p><?=$GLOBALS['sql']['zag_ru']?></p>
                            </div>
                            <div class="clearfix">
                                <div class="img fl_l width35">
                                    <center>
                                        <img src="img/news/<?=$GLOBALS['sql']['img']?>" alt="<?=$GLOBALS['sql']['zag_ru']?>">
                                    </center>
                                </div>
                                <p class="fl_l width65"><?=$GLOBALS['sql']['text_'.$site_language]?></p>
                            </div>
                            
                        </div>
                        <hr class="marginbottom10 margintop10"/>
                        <div class="clearfix">
                            <div class="step_title">
                                <span>Спецпредложения</span>
                            </div>
                            <p><?=$GLOBALS['soput']?></p>
                        </div>
                </div>
            </div>