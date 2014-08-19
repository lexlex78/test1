    <div class="body">
        <div class="asside">
            <div class="grey_block">
               <? echo $GLOBALS['kroshki_ext']?> 
            </div>
            <? echo $GLOBALS['left_dost']?> 
        </div>
        <div class="page_content clearfix">
            <div class="breadcrumbs">
                <? echo $GLOBALS['kroshki']?>
            </div>
            <div class="title-page-with-filters">
                <h1><?=$GLOBALS['dat']['name']?></h1>
            </div>
            <div class="clearfix">
                <div class="labels page_card clearfix">
                    <div class="tags  <? echo $GLOBALS['news'] ?> <? echo $GLOBALS['special'] ?> ">
                        <p class="tag_new">Новинка!</p>
                        <p class="tag_special">Спецпредложение</p>
                    </div>
                    <div class="fl_l page_item_img">
                        <center>
                            <? echo $GLOBALS['img'] ?>
                         </center>
                        <div class="small_img clearfix">
                            <ul>
                                 <? echo $GLOBALS['imgs'] ?>
                            </ul>
                        </div>
                    </div>
                    <div class="fl_r item_text">
                        <p class="item_price">
                            <? echo $GLOBALS['dat']['price_old'] ?>
                            <span class="new"><? echo $GLOBALS['dat']['price'] ?> руб.</span>
                        </p>
                        <div class="item_buy">
                            <span class="availability <? if ($GLOBALS['dat']['f_en']=='Нет в наличии') echo ' no ' ?>"><? echo $GLOBALS['dat']['f_en'] ?></span>
                          <?  if (  $GLOBALS['dat']['f_en']!='Нет в наличии'){?>  <a onclick="javascript:bay(<? echo  $GLOBALS['dat']['id']?>);" href="javascript:void(0);" class="btn">Купить</a> 
                              <? } else
                     echo ' <a class="alert" onclick="javascript:uved(' . $GLOBALS['dat']['id'] . ');" href="javascript:void(0);" >Уведомить о наличии</a>';   
                    
                    ?>
                        </div>
                        <a href="javascript:void(0);" onclick="openPopUp_help()" class="ask_question">Задать вопрос специалисту</a>
                    </div>
                </div>
                <table class="cells  table table-striped table-bordered table-condensed">
                    <tr>
                        <td class="width30"><h2>Описание товара:</h2></td>
                        <td class="width70"></td>
                    </tr>


             <? echo $GLOBALS['dop_par'] ?> 
                </table>


            </div>
            <div class="clearfix">
             <? echo $GLOBALS['soput'] ?>   
            </div>
        </div>
    </div>
             <script>
             <?=$GLOBALS['mes_zak']?>
             </script>



