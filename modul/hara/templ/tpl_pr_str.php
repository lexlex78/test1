
          <div class="breadcrumbs">
    <div class="body breadcrumbs_padding">
        <a href="/">Главная</a>
        <div class="breadcrumbs_arrow"></div>
        <a href="/construction/<? echo $GLOBALS['query'][0]['url'] ?>.html"><? echo $GLOBALS['query'][0]['razd'] ?></a>
    </div>
</div>
  
       
            
            <div class="curent_item">
                <div class="body">
                    <div class="item_header">
                        <h3 class="fl_l"><? echo $GLOBALS['sel_str']['zag'] ?></h3>
                        <div class="curent_item_nav fl_r">
                          
                            <? echo $GLOBALS['pred'] ?>
                            <? echo $GLOBALS['sled'] ?> 
                            
                            <a class="close" href="/engineering/<? echo $GLOBALS[router][1] ?>.html"></a>
                        </div>
                    </div>
                <div class="item_images">
                    <div class="idx_cat_item">
                        <a href="<? echo $GLOBALS['pimg_']?>" rel="group" title="<? echo $GLOBALS['sel_str']['zag'] ?>">
                         <? echo $GLOBALS['pimg']?>
                            <div class="item_title item_title_green">
                                <span><? echo $GLOBALS['sel_str']['zag'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="idx_cat_item">
                        <a href="<? echo $GLOBALS['pimg_1']?>" rel="group" title="План - 1">
                         <? echo $GLOBALS['pimg1']?>
                            <div class="item_title item_title_green">
                                <span> План - 1 </span>
                            </div>
                        </a>
                    </div>
                    <div class="idx_cat_item">
                        <a href="<? echo $GLOBALS['pimg_2']?>" rel="group" title="План - 2">
                         <? echo $GLOBALS['pimg2']?>
                            <div class="item_title item_title_green">
                                <span> План - 2 </span>
                            </div>
                        </a>
                    </div>
                </div>
                <p class="cost">Стоимость проекта <? echo $GLOBALS['sel_str']['price'] ?> руб.</p>
                
                <div class="page_item_text">
                <? echo $GLOBALS['sel_str']['text'] ?>
                </div>
                
                </div>
                </div>

 






            
            <div class="body">
                <div class="page_content">
                    <h3>Проекты</h3>
                    <div class="inform alert">В каталоге размещены типовые проекты домов, каждый проект условный и может изменяться по желанию заказчика. В каталоге размещены типовые проекты домов, каждый проект условный и может изменяться по желанию заказчика
                    </div>
                    <div class="metro_style clearfix">
                        
                      <? echo $GLOBALS['gal']?>  
                    </div>
                </div>
            </div>
            
            <div class="metro_style_pagination">
                <div class="body">
                    <div class="metro_style_nav">
                     <? echo $GLOBALS['pagin'][0]?>  
                    </div>
                </div>
            </div>