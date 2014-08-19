<div class="question">
                            <div class="title">
                                <span class="title-text"><?=$GLOBALS['p']['opros']?></span>
                            </div>
                            <p><?=$GLOBALS['sel']['qw_'.$site_language]?></p>
                            <form method="post" class="oprooo">
                                <div class="question-form">
                                    <?=$GLOBALS['it']?>
                                </div>
                                <div class="question-form-bottom">
                                    <input class="btn-send" type="submit" value="<?=$GLOBALS['p']['golosovat']?>" />
                                    
                                    <span><?=$GLOBALS['p']['all_gol']?> <?=$GLOBALS['it_all']?></span>
                                </div>
                            </form>
                            <script type="text/javascript">
  setTimeout('$(\'.oprooo\').append(\'<input type="hidden" name="opros" value="ok" />\');', 2000);
</script>
</div>
<?=$GLOBALS['mes_opros']?>