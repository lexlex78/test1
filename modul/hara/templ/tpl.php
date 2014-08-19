
<div class="breadcrumbs">
    <div class="body breadcrumbs_padding">
        <a href="/">Главная</a>
        <div class="breadcrumbs_arrow"></div>
        <a href="/construction/<? echo $GLOBALS['sel']['url'] ?>.html"><? echo $GLOBALS['sel']['razd'] ?></a>
    </div>
</div>


<div class="body">
    <div class="page_content">
        <h3><? echo $GLOBALS['sel']['zag'] ?></h3>
        <div class="page_text">
            <div class="clearfix">
            <? echo $GLOBALS['img']?>
            
            <? echo $GLOBALS['sel']['text'] ?>
            </div>
            
            <? if (!empty($GLOBALS['sel']['text_s']))  {?> 
            <span id="expand_1" class="expand">
             <? echo $GLOBALS['sel']['text_s'] ?>
            </span>
            <a href="#" class="show_expand show" data="expand_1">Читать все</a>
            <? } ?>
<? echo $GLOBALS['gal'] ?>  
            
<?  echo $GLOBALS['price'] ?>            
            
                    
               
            </div>
            </div>
            
            
          
            <div class="page_text_2">
             <? echo $GLOBALS['sel']['text1'] ?>
                
            <? if (!empty($GLOBALS['sel']['text1_s']))  {?> 
            <span id="expand_2" class="expand">
             <? echo $GLOBALS['sel']['text1_s']; ?>   
            </span>
            <a href="#" class="show_expand show" data="expand_2">Читать все</a>
            <? } ?>
            </div>
            
            <? echo $GLOBALS['rec'] ?>
            
           
            
            
            
            
        </div>
    </div>
</div>
