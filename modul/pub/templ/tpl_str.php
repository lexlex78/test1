    <div class="content-greed-wrapper">
    <div class="left-content">
    <h1 class="title"><span><span><?=$GLOBALS['p']['pub']?></span></span></h1>
    <div class="ver-del">
              <div class="new-row">
                        <img class="thumb" src="img/pub/<?=$GLOBALS['sql']['img']?>" alt="">
                        <h2 class="news-title"><?=$GLOBALS['sql']['zag_'.$site_language]?></h2>
                        <span class="date"><?=date('d.m.Y', strtotime($GLOBALS['sql']['data']))?></span>
                        <p><?=$GLOBALS['sql']['text_'.$site_language]?></p>
                        <a href="<?=$GLOBALS['site_url']?>/pub" class="go-back"><?=$GLOBALS['p']['pub_beck_all']?></a>
              </div>
              <?=$GLOBALS['it']?>
              
    </div>
    </div>
    <div class="right-content">
    <?=$GLOBALS['itt']?>
    <a href="<?=$GLOBALS['site_url']?>/pub?tip=1" class="go-back"><?=$GLOBALS['p']['all_mnen']?></a>

     <?=$GLOBALS['subscribe_mod1']?>

    </div>


    </div>
