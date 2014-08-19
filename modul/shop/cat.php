<?php

// поиск  промежуточный
function a_search($v, $tree) {
    global $da, $shop_f_cat;
    $ret = false;

    foreach ($da[$tree] as $vv) {
        if ($shop_f_cat[$vv]['url'] == $v)
            $ret = $vv;
    }

    return $ret;
}

////// 
// получаем id каталога из урла
//1 я итерация указываем каждому родителю ребенка 
foreach ($shop_f_cat as $k => $v) {
    $da[$v['pid']][] = $v[id];
}

$id = 0;
$eror = 0;
foreach ($router as $k => $v) {
    if ($k != 0) {
        $poisk = a_search($v, $id);

        if ($poisk) {
            $id = $poisk;
        } else {
            $eror = 1;
        }
    }
}

/// выход $id - католога 
// находим все подпапкм входящии в папку $id
function ids($id) {
    $ret = '';
    global $da;
    foreach ($da[$id] as $v) {
        $ret.=$v . ',' . ids($v);
    }
    return $ret;
}

$ids = trim($id . ',' . ids($id), ',');
/// выход $ids

if ($eror === 0) {

// хлебные крошки
    $kroshki = kroshki($id);

// имя каталога
    $cat_name = $shop_f_cat[$id]['name'];


// выводим под катологи 
    if ($shop_f_cat[$id]['pid'] == 0)
        $idss = trim(ids($id), ',');
    else
        $idss = trim(ids($shop_f_cat[$id]['pid']), ',');

    $tids = explode(',', $idss);


    $cat_w = '<div class="grey_block filter_block">
            <div class="block_title category_title">
                <h3>Категории</h3>
            </div><div class="block_content"><ul>';
    foreach ($tids as $v) {
        $actt = '';
        if ($v == $id)
            $actt = 'class="active"';

        $cat_w.='<li ' . $actt . '  >
                        <a href="/shop/' . shop_pid_url($shop_f_cat[$v]['id']) . '" class="block_list_title">' . $shop_f_cat[$v]['name'] . '</a>
                    </li>';
    }
    $cat_w.='</ul></div></div>';
    
    

///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
/// фильтры

    function merg($a, $b) {
        foreach ($b as $k => $v) {
            if (!$a[$k])
                $a[$k] = $v;
        }
        return $a;
    }

// получение данных о пременных парамеирах товара (фильтрах) 
    $t_id = $id;
//$sh=0;
    do {
        $rr = $shop_f_cat[$t_id];
        /// if ($sh==0)$razd=$rr['name'];
        $per = merg($per, $rr);
        $t_id = $rr[pid];
//   $sh++;
    } while ($rr[pid] != 0);

//echo '<pre>';
//print_r($per); 
//echo '</pre>';

    
    
/// формируем фильтры
// получаем фильтры с запроса
    if ($_GET['filtr'])
        $_GET['filtr'] = trim($_GET['filtr'], ';');
    $aaa = explode(';', $_GET['filtr']);
    foreach ($aaa as $v) {
        $z = explode('-', $v);

        $tt = $z;
        array_shift($tt);
        $g_filtr[$z[0]] = $tt;
    }
//
//echo '<pre>';
//print_r($g_filtr); 
//echo '</pre>';
   
/// выход массив $g_filtr[название фильтра]=масив [значениq]

    

/// создаем урл с нужным фильтром
    function cr_url_filtr($key, $val) {
        global $g_filtr;
        $a = '';

        $t = $g_filtr;
       
        
           $t[$key] = array_unique($t[$key]);
           $i=array_search($val,$t[$key]);
        
          if ($i===false or $i===NULL) $t[$key][] = $val;
          else unset ($t[$key][$i]); 
            
       


        foreach ($t as $k => $v) {
            $val = '';
            foreach ($v as $vv) {
                $val.=$vv . '-';
            }
            $val = trim($val, '-');

            if (!empty($val))
                $a.=$k . '-' . $val . ';';
        }


        return cr_url_get('filtr', $a);
    }
    
    
    
    
// подключаем фильтры
 $per_p = include 'admin/filtry.php';

/// добовляем фильтрацию по цене 
  $per_p['price']=array('tip'=>'dec','name'=>'Цена','filtr'=>1,'var'=>' руб.');
  
  array_multisort ($per_p, SORT_ASC); 
  
  // формируем фильтры  
  
  /// собираем условие where 
  $where_filtr='';
    foreach ($per_p as $k => $v) {
        if ($per[$k] == 1 or $k == 'price') {

// тип фильтра    со связаными таблицами sel_tab    и sel_tabm       
            if ($v['tip'] == 'sel_tab' or $v['tip'] == 'sel_tabm') {
               $where_filtr_t='';
                foreach ($g_filtr[$k] as  $value) {
                    $where_filtr_t .= 'or CONCAT(\',\',' . $k . ',\',\')  like \'%,' . $value . ',%\' ';
                }
            }
            $where_filtr_t=trim($where_filtr_t,'or');
        
        if (!empty($where_filtr_t))$where_filtr.='AND ('.$where_filtr_t.') ';
           

// тип фильтра    числовой             
            if ($v['tip'] == 'int' or $v['tip'] == 'dec') {
            $min='';  if (is_numeric($g_filtr[$k][0]))$min=$g_filtr[$k][0];
            $max='';  if (is_numeric($g_filtr[$k][1]))$max=$g_filtr[$k][1];
            if ($min!='') $where_filtr.='AND ' . $k . '>='.$min.' '; 
            if ($max!='') $where_filtr.='AND ' . $k . '<='.$max.' ';   
            }
        }
        
        
        
    }

 // echo $where_filtr;  




// формируем фильтры  
    foreach ($per_p as $k => $v) {
        if ($per[$k] == 1 or $k == 'price') {

// тип фильтра    со связаными таблицами sel_tab    и sel_tabm       
            if ($v['tip'] == 'sel_tab' or $v['tip'] == 'sel_tabm') {
                $filtra = $db->select('SELECT * FROM ' . DB_PREFIX . '' . $v['tabl'] . ' WHERE en=1  ORDER BY sort ASC');
                
                // узнаем естли такме занчения фильров
                unset ($pva);
                $va = $db->select('SELECT '.$k.' FROM ' . DB_PREFIX . 'shop_produkt WHERE en=1 and pid in (' . $ids . ') ' . $where_filtr. ' GROUP BY '.$k.' ');
                foreach ($va as $vz) {
                  $temp=  explode(',', $vz[$k]);
                   foreach ($temp as $vzz){
                   $pva[$vzz]=1;  
                   }
                }
                
                
//                echo '<pre>';
//                print_r($pva); 
//                echo '</pre>';
                
                                
                
                $fil.='<hr class="marginbottom10"/>
                    <div class="item">
                        <h4 class="marginbottom10">' . $v['name'] . '</h4>
                        <ul >';
                $where_filtr_t='';
                foreach ($filtra as $key => $value) {

                    
                   
                    
                    if (in_array($value['id'], $g_filtr[$k])) {
                        $act = 'class="active"';
                        $url = cr_url_filtr($k, $value['id']);
                        $chek = '<input type="checkbox" checked="checked"  onclick="window.location=\''.$url.'\'" >';
                  
                  //      $where_filtr_t.='or CONCAT(\',\','.$k.',\',\')  like \'%,'.$value['id'].',%\' ';
                        
                    } else {
                        $act = '';
                        
                        $url = cr_url_filtr($k, $value['id']);
                        $chek = '<input type="checkbox"  onclick="window.location=\''.$url.'\'"  > ';
                    }

                // есле есть цвет
                    $color='';
            if ($value['color'])  { $chek='';     
                   $color= ' <div style="
    display: inline-block;
    height: 13px;
    width: 13px;
    background-color: '.$value['color'].';
"></div> ';
            }           

            
            
              if ($pva[$value['id']]==1)  $fil.='<li ' . $act . ' >
                                <label>
                                    ' . $color . '
                                   ' . $chek . '
                                    <a href="' . $url . '">
                                        ' . $value['name'] . '
                                    </a>
                                </label>
                            </li>';
              else {
                  $fil.='<li class="filtr_dis" >
                                <label>
                                    ' . $color . '
                                   ' . $chek . '
                                    <a>
                                        ' . $value['name'] . '
                                    </a>
                                </label>
                            </li>';
                  
              }
              
                }
         //      $where_filtr_t=trim($where_filtr_t,'or');
         //       if (!empty($where_filtr_t))$where_filtr.='AND ('.$where_filtr_t.') ';
                $fil.='</ul>
                    </div>
                    ';
 
            }
            
// тип фильтра    числовой             
          if ($v['tip'] == 'int' or $v['tip'] == 'dec') {
       //   $v_filtra=$db->select('SELECT `'.$k.'` FROM '.DB_PREFIX.'shop_produkt WHERE en=1 and pid in ('.$ids.') and  '.$k.'!=\'\'  Group By `'.$k.'` ORDER BY `'.$k.'` ASC');    
           
           
         $min='';  if (is_numeric($g_filtr[$k][0]))$min=$g_filtr[$k][0];
         $max='';  if (is_numeric($g_filtr[$k][1]))$max=$g_filtr[$k][1];
           
              $fil.='<div class="item">
                    <h4 class="marginbottom10">'.$v['name'].' <span>'.$v['var'].'</span></h4>
                    <div class="price-input clearfix int">
                        от&nbsp;<input onkeyup="this.value = this.value.replace (/\D/, \'\')" type="text" value="'.$min.'" name="price[min]" id="price[min]" class="text "></td>
                        до&nbsp;<input onkeyup="this.value = this.value.replace (/\D/, \'\')" type="text" value="'.$max.'" name="price[max]" id="price[max]" class="text input-wide"></td>
                    <button type="submit" onclick="set_filtr(this,\''.$k.'\')" id="submitprice" class="btn blue_btn small_btn">Применить</button>
                    </div>
                    </div>';
              
      //     if ($min!='') $where_filtr.='AND ' . $k . '>='.$min.' '; 
      //     if ($max!='') $where_filtr.='AND ' . $k . '<='.$max.' ';
              
          }  
            
            
            
        }
    }

/// фильтры 
///////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////
// выбираем товары из каталога

// сортировка

    $order = ' ORDER BY price ASC';
    $mes_sort='от дешевых к дорогим';

    if ($_GET[price] == 'down' ) {
        $order = ' ORDER BY price ASC ';
        $mes_sort='от дешевых к дорогим';
        
    }
    if ($_GET[price] == 'up') {
        $order = ' ORDER BY price DESC ';
       $mes_sort='от дорогих к дешевым';
    }
    
    $sel_sort.='<li><a href="' . cr_url_get('price', 'down') . '">от дешевых к дорогим</a></li>';
    $sel_sort.='<li><a href="' . cr_url_get('price', 'up') . '">от дорогих к дешевым</a></li>';

// пажинация    
    $sqll = $db->select('SELECT COUNT(id) FROM ' . DB_PREFIX . 'shop_produkt WHERE en=1 and pid in (' . $ids . ') ' . $where_filtr . $order);
    $all = $sqll[0]['COUNT(id)'];
    $pagin = paging($all, 5, 5);
    
    
    /// количество найденных из фильтра
    if (!empty($where_filtr)){
    $sqll = $db->select('SELECT COUNT(id) FROM ' . DB_PREFIX . 'shop_produkt WHERE en=1 and pid in (' . $ids . ') ' .  $order);
    $all_all = $sqll[0]['COUNT(id)'];    
      
    $filtr_all=' <p class="skyblue-links">Показано товаров '.$all.'  из '.$all_all.' </p>';
    }
      
        
    $dat = $db->select('SELECT p.* , i.img , e.name as f_en
                        FROM ' . DB_PREFIX . 'shop_produkt as p  
                        LEFT JOIN ' . DB_PREFIX . 'shop_produkt_img as i ON  p.id=i.pid
                        LEFT JOIN ' . DB_PREFIX . 'f_en as e  ON p.f_en=e.id
                        WHERE p.en=1  and p.pid in (' . $ids . ')  ' . $where_filtr . '
                        GROUP BY p.id  ' . $order . '
                        limit ' . $pagin[1]);

//echo '<pre>';
//    print_r ($dat);    
//echo '</pre>';

    
    
/// вид список плитка
    if (!$_GET['view'])
        $_GET['view'] = $_SESSION['view'];
    $_SESSION['view'] = $_GET['view'];
    $viv = 'class="display_list"';
    $viv2='';
    $viv1=' active ';
    if ($_GET['view'] == 'on') {
        $viv = 'class="display_table"';
        $viv1='';
        $viv2=' active ';
    }


// вывод товаров в категории
    $it = '';

    foreach ($dat as $k => $v) {


        if ($v['price_old'] > 0)
            $v['price_old'] = '<span class="line-through old">' . number_format($v['price_old'], 0, '.', ' ') . ' руб.</span>';
        else
            $v['price_old'] = '';


        $special = '';
        if ($v['spec'])
            $special = 'special';
        $news = '';
        if ($v['new'])
            $news = 'new';

        $img = '';
        if (!empty($v['img']))
            $img = '<img src="/img/shop/' . $v['img'] . '">';

        $it.='
                <li>
                    <div class="labels clearfix">
                        <div class="tags ' . $news . ' ' . $special . '">
                            <p class="tag_new">Новинка!</p>
                            <p class="tag_special">Спецпредложение</p>
                        </div>
                        <div class="fl_l item_img">
                        <center>
                            <a href="/shop/' . shop_pid_url($v['pid']) . $v['url'] . '.html">' . $img . '</a>
                        </center>
                        </div>
                        <div class="fl_r item_text">
                            <h4><a href="/shop/' . shop_pid_url($v['pid']) . $v['url'] . '.html">' . $v['name'] . '</a></h4>
                        <p class="descriptions">' . $v['descr'] . '</p>
                        <p class="item_price">
                            ' . $v['price_old'] . '
                            <span class="new">' . number_format($v['price'], 0, '.', ' ') . ' руб.</span>
                        </p>
                        <div class="item_buy">
                            <span class="availability';
        if (  $v['f_en']=='Нет в наличии')$it.=' no ';
        $it.='">' . $v['f_en'] . '</span>';
        
                    if (  $v['f_en']!='Нет в наличии'){       $it.=' <a onclick="javascript:bay(' . $v['id'] . ');" href="javascript:void(0);" class="btn">Купить</a>';
                    }
                    else {
                     $it.=' <a class="alert " onclick="javascript:uved(' . $v['id'] . ');" href="javascript:void(0);" >Уведомить о наличии</a>';   
                    }
                   
                       $it.=' </div>
                        </div>
                    </div>
                </li>
    ';
    }


    $sql = $db->select('SELECT * FROM ' . DB_PREFIX . 'shop_cat WHERE en=1 and id = ' . $id);

    $meta_title = $sql[0]['title'];
    $meta_keyw = $sql[0]['keyw'];
    $meta_descr = $sql[0]['descr'];

    $center_area = showtempl(dirname(__FILE__) . '/templ/tpl_cat.php');
}
else {

    $_GET['error'] = 404;
}