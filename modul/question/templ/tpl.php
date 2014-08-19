<div id="pop_ask" class="pop_up pop_up_small pop_ask">
    <a href="javascript:void(0)" onclick="closePopUp()" class="close_pop_up"></a>
    <div class="clearfix">
        <div class="page_title margintop10">
            <p>Задать вопрос специалисту</p>
        </div>
        <span>Заполните, пожалуйста, все поля.</span>
        <form method="post" id="pop_ask_form">
        <div class="step_input">
            <label for="display-name">Имя</label>
            <input id="display-name"  type="text" name="name" size="30" maxlength="30" value="" tabindex="105">
        </div>
        <div class="step_input">
            <label for="display-phone">Телефон</label>
            <input id="display-phone" type="text" name="tel" size="30" maxlength="30" value="" tabindex="105">
        </div>
        <div class="step_input">
            <label for="display-mail">E-mail</label>
            <input id="display-mail" class="validate[required]" type="text" name="email" size="30" maxlength="30" value="" tabindex="105">
        </div>
        <div class="step_input">
            <label class="fl_l">Ваш вопрос</label>
            <textarea class="validate[required]" name="text" class="fl_r"></textarea>
        </div>
        <button class="btn blue_btn small_btn" type="submit">Отправить</button>
        </form>
    </div>
</div>


 <div id="pop_ok" class="pop_up pop_up_small pop_ask">
            <a href="javascript:void(0)" onclick="location.href=location.href;" class="close_pop_up"></a>
            <div class="clearfix">
                <div class="page_title margintop10">
                    <p>Ваш вопрос отправлен !!!</p>
                </div>
                
                <button class="btn blue_btn small_btn" onclick="location.href=location.href;">OK</button>
                
            </div>
 </div>


<script type="text/javascript">
  setTimeout('$(\'#pop_ask_form\').append(\'<input type="hidden" name="question" value="ok" />\');', 2000);

<?echo $GLOBALS['mess']?>
</script> 


