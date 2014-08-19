    <div class="content-greed-wrapper">
    <div class="left-content">
    <h1 class="title"><span><span><?=$GLOBALS['p']['deyt']?></span></span></h1>
    <div class="ver-del">
              <div class="new-row">
                        <img class="thumb" src="img/deytelnost/<?=$GLOBALS['sql']['img']?>" alt="">
                        <h2 class="news-title"><?=$GLOBALS['sql']['zag_'.$site_language]?></h2>
                        <span class="date"><?=date('d.m.Y', strtotime($GLOBALS['sql']['data']))?></span>
                        <p><?=$GLOBALS['sql']['text_'.$site_language]?></p>
                        <a href="<?=$GLOBALS['site_url']?>/do" class="go-back"><?=$GLOBALS['p']['do_beck_all']?></a>
              </div>
              <?=$GLOBALS['it']?>
              
    </div>
    </div>
    <div class="right-content">
    <h2 class="title"><?=$GLOBALS['p']['video']?></h2>
<?=$GLOBALS['mod_video1']?>

     <?=$GLOBALS['subscribe_mod1']?>

    </div>


    </div>
