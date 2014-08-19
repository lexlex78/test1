<div class="content-greed-wrapper">
      
<ul class="tab-control">
    <li <? if ($_GET['tip']==1)echo 'class="select"' ?>  ><a href="<?=cr_url_get('tip',1)?>#control"><?=$GLOBALS['p']['lic_contr']?></a></li>
    <li <? if ($_GET['tip']!=1)echo 'class="select"' ?> ><a href="<?=cr_url_get('tip',0)?>#project"><?=$GLOBALS['p']['projects']?></a></li>
</ul>
    
<div class="tab-pages">
<div id="control">
<div class="left-content">
    <h1 class="title"><span><span><?=$GLOBALS['p']['deyt']?> - <?=$GLOBALS['p']['lic_contr']?></span></span></h1>
    <div class="ver-del">
        
           <?=$GLOBALS['it1']?>
    
    </div>
<?=$GLOBALS['pagin1'][0]?>
    
</div>
<div class="right-content">
    <h2 class="title"><?=$GLOBALS['p']['video']?></h2>
<?=$GLOBALS['mod_video1']?>

     <?=$GLOBALS['subscribe_mod1']?>

</div>
</div><!-- id article-->
<div id="project" style="display: none;">
              <div class="left-content">
                        <h1 class="title"><span><span><?=$GLOBALS['p']['deyt']?>  - <?=$GLOBALS['p']['projects']?></span></span></h1>
                        <div class="ver-del">
                                                                   
               <div class="filter"><?=$GLOBALS['p']['view']?> <?=$GLOBALS['do_filtr']?></div>                   
              <?=$GLOBALS['it']?>
              </div>
              <?=$GLOBALS['pagin'][0]?>
              </div>
              <div class="right-content">
                      <h2 class="title"><?=$GLOBALS['p']['video']?></h2>
<?=$GLOBALS['mod_video1']?>

                        <?=$GLOBALS['subscribe_mod1']?>

              </div>
    </div><!-- id opinion-->
</div> <!--tab-pages-->
</div>