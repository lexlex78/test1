<div id="center" class="cf">
        <div id="content">

                    <?=$GLOBALS['it']?>
            <div id="partner-start">
                        <a href="#popup1" class="buy-button fancybox"><span>Начать сотрудничество</span></a></div>

                        <span style="display: none;">
                            <div id="popup1">
                                <h3>Для оформления заявки заполните поля ниже:</h3>

                                <p class="req">*- поля, обязательные для заполнения</p>

                                <form method="POST">
                                    <input type="hidden" name="send" value="par" />
                                    <div class="form-side">
                                        <div><label for="t1">Имя *</label><input class="validate[required]" name ="name" type="text" id="t1"></div>
                                        <div><label for="t2">E-mail *</label><input class="validate[required,custom[email]]" name="email" type="text" id="t2"></div>
                                        <div><label for="t3">Телефон *</label><input class="validate[required,custom[phone]]" name="tel" type="text" id="t3"></div>
                                    </div>
                                    <div class="form-side">
                                        <div><label for="t4">Название компании *</label><input class="validate[required]" name="compani" type="text" id="t4"></div>
                                        <div><label for="t5">Страна, город *</label><input class="validate[required]" name="adrr" type="text" id="t5"></div>
                                        <div><label for="t6">Комментарий</label><input name="com" type="text" id="t6"></div>
                                    </div>
                                    <p>Пожалуйста, проверьте правильность заполнения полей перед отправкой формы. Точная контактная информация поможет нам связаться с Вами в кратчайшие сроки.
                                        <br> <strong>Мы гарантируем, что сведения из Вашей заявки не будут раскрыты третьим лицам.</strong>
                                        </p>

                                    <div class="button-area">
                                        <div class="submit buy-button gray" ><input type="submit"  value="Отправить"></div>

                                    </div>
                                </form>
                            </div>
                            

                        </span>
   
             

        </div>
        <div id="aside">
            <ul>
 <?=$GLOBALS['left_menu_1']?>

            </ul>
        </div>
</div>

<script>
  <?=$GLOBALS['mes_zak']?>
 </script>


