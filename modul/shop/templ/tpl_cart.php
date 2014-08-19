
            <div class="clearfix">
                <table class="basket">
                    <thead>
                        <tr>
                            <th style="width: 70%;">Товар</th>
                            <th style="width: 10%;">Кол-во</th>
                            <th style="width: 20%;">Сумма</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $GLOBALS['it_kor'] ?> 
                        
                      
                        
                    </tbody>
                </table>
                <div class="final_price">
<!--                    <p>Доставка: <span>БЕСПЛАТНО</span></p>-->
                    <p class="block_full_price">Сумма заказа: <span class="all_item_price"><? echo $GLOBALS['summa']; ?> руб.</span></p>
                    <div class="clearfix">
               <?if ($GLOBALS['summa']>0){ ?>         <a class="btn fl_r" href="/chekout" >Оформить заказ</a> <? } ?>
                    </div>
                </div>
            </div>


        

 
    
              



