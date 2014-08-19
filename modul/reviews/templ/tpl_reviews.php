            <div class="breadcrumbs">
                <div class="body breadcrumbs_padding">
                    <a href="/">Главная</a>
                    <div class="breadcrumbs_arrow"></div>
                    <a href="">Отзывы</a>
                </div>
            </div>
            <div class="body">
                <div class="page_content">
                    <div class="page_left_part">
                        <h1>Отзывы о компании</h1>
                        <ul class="comment_list">
                            <? echo $GLOBALS['it'] ?>
                        </ul>

                        <div class="metro_style_pagination">
                                <div class="metro_style_nav">
                                    <? echo $GLOBALS['pagin'][0] ?>
                                </div>
                        </div>
                        
                        <div class="comment_form">
                            <form id="rew" method="post">                                
                            <div class="comment_content">
                            <b>Оставить отзыв</b>
                            <small>* - обязательные для заполнения поля</small>
                            <div class="width50 fl_l">
                            <label for="display-name">Ваше имя *</label>
                            <input class="validate[required]"  id="display-name" type="text" tabindex="105" value="" maxlength="30" size="30" name="name">
                            </div>
                            <div class="width50 fl_l">
                            <label for="display-city">Город *</label>
                            <input class="validate[required]" id="display-city" type="text" tabindex="105" value="" maxlength="30" size="30" name="sity">
                            </div>
                            <label for="display-comment">Ваш отзыв *</label>
                            <textarea id="display-comment" class="comment_text validate[required]" rows="9" cols="62" name="text"></textarea>
                            <input  id="comment-button" type="submit" tabindex="110" value="Отправить">
                            </div>
                            </form>
                        </div>
                    </div>
                    <? echo $GLOBALS['rec'] ?>
                 </div>
            </div>
<script type="text/javascript">
  setTimeout('$(\'#rew\').append(\'<input type="hidden" name="send" value="rew" />\');', 2000);
</script>
  