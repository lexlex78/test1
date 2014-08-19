<div class="body">
                    <div class="clearfix">
                        <div class="breadcrumbs">
                            <a href="/">Главная</a>
                            <div class="breadcrumbs_arrow"></div>
                            <a >Контакты</a>
                        </div>

                        <div class="clearfix">
                            <div class="step_title">
                                <span>Контакты</span>
                            </div>
                        </div>
                        <div class="clearfix marginbottom10">
                            <div class="clearfix">
                                <div class="getting_block">
                                    <div class="get_title">
                                        <p class="darkblue">Координаты главного офиса</p>
                                    </div>
                                    <div class="getting_block_content contact_details">
                                        <p class="contact_details_adress"><span></span><?=$GLOBALS['set']['adr']?></p>
                                        <p class="contact_details_phone"><span></span><b class="double_text_line"><?=$GLOBALS['set']['tel']?> <br/><?=$GLOBALS['set']['tel1']?></b></p>
                                        <p class="work_time"><span></span><?=$GLOBALS['set']['reg']?></p>
                                        <p class="contact_details_mail"><span></span><?=$GLOBALS['set']['email1']?></p>
                                        <p class="contact_details_icq"><span></span><?=$GLOBALS['set']['icq']?></p>
                                    </div>
                                </div>
                                <div class="getting_block">
                                    <div class="get_title">
                                        <p class="darkblue">Реквизиты</p>
                                    </div>
                                    <div class="getting_block_content">
                                        <?=$GLOBALS['set']['rec']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix marginbottom10">
                            <div class="clearfix">
                                <div class="getting_block">
                                    <div class="get_title">
                                        <p class="darkblue">Адрес филиала</p>
                                    </div>
                                    <div class="getting_block_content contact_details">
                                        <p class="contact_details_adress"><span></span><?=$GLOBALS['sql'][0]['adr']?></p>
                                        <p class="contact_details_phone"><span></span><b class="double_text_line"><?=$GLOBALS['sql'][0]['tel']?></b></p>
                                        <p class="contact_details_mail"><span></span><?=$GLOBALS['sql'][0]['email']?></p>
                                        <p class="contact_details_icq"><span></span><?=$GLOBALS['sql'][0]['icq']?></p>
                                    </div>
                                </div>
                                <div class="getting_block">
                                    <div class="getting_block_content">
                                        <p><a href="javascript:void(0);" onclick="openPopUp_help()" class="ask_question">Задать вопрос специалисту</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix yandex_map"><?=$GLOBALS['sql'][0]['map']?></div>
                    </div>
                </div>
