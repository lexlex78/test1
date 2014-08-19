<div class="content-greed-wrapper">
    
<ul class="tab-control">
    <li <? if ($_GET['tip']==1)echo 'class="select"' ?>  ><a href="<?=cr_url_get('tip',1)?>#opinion"><?=$GLOBALS['p']['mnen']?></a></li>
    <li <? if ($_GET['tip']!=1)echo 'class="select"' ?> ><a href="<?=cr_url_get('tip',0)?>#article"><?=$GLOBALS['p']['stat']?></a></li>
</ul>
    
<div class="tab-pages">
<div id="article">
<div class="left-content">
    <h1 class="title"><span><span><?=$GLOBALS['p']['pub']?> - <?=$GLOBALS['p']['stat']?></span></span></h1>
    <div class="ver-del">
           <?=$GLOBALS['it']?>
    
    </div>
<?=$GLOBALS['pagin'][0]?>
    
</div>
<div class="right-content">
    <h2 class="title"><?=$GLOBALS['p']['video']?></h2>
<?=$GLOBALS['mod_video1']?>

     <?=$GLOBALS['subscribe_mod1']?>

</div>
</div><!-- id article-->
<div id="opinion" style="display: none;">
              <div class="left-content">
                        <h1 class="title"><span><span><?=$GLOBALS['p']['pub']?>  - <?=$GLOBALS['p']['mnen']?></span></span></h1>
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
    </div><!-- id opinion-->
</div> <!--tab-pages-->
</div>