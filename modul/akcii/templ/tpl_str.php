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
                            <a href="/promotions">Акции</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a ><?=$GLOBALS['sql']['zag_ru']?></a>
                        </div>
                        <div class="page_content_text clearfix">
                            <div class="page_title">
                                <p><?=$GLOBALS['sql']['zag_ru']?><span class="stock_date">(<?=date('d.m.Y', strtotime($GLOBALS['sql']['data']))?> - <?=date('d.m.Y', strtotime($GLOBALS['sql']['data_to']))?>)</span></p>
                            </div>
                            <div class="stock_content">
                                <center>
                                    <a >
                                        <img src="img/akcii/<?=$GLOBALS['sql']['img']?>" alt="<?=$GLOBALS['sql']['zag_ru']?>">
                                    </a>
                                </center>
                            </div>
                            <div class="clearfix">
                                <p><?=$GLOBALS['sql']['text_'.$site_language]?></p>  
                            </div>
                        </div>
                        <hr class="marginbottom10 margintop10"/>
                        <div class="clearfix">
                            <div class="step_title">
                                <span>Спецпредложения</span>
                            </div>
                        <p><?=$GLOBALS['soput']?></p></div>
                </div>
            </div>
        </div>