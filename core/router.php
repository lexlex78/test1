<?
$router=trim($_SERVER['REQUEST_URI'], '/');

//----------------- разбиваем полученный урл ----------------- 
$router=explode('?', $router); //отделяем динамику
$router=$router[0];

$router=explode('/', $router); //разбиваем по слешам

$last_route=count($router)-1;

if(  stripos($router[$last_route], '.')  ) { // если в конце пути указан файл
    $last_route       = array_pop($router);
    $route_file       = explode( '.', $last_route );
    $route_file_ext   = $route_file[1]; //расширение файла
    $route_file       = $route_file[0]; //имя файла
}
// патчик
if ($router[(count($router)-1)]=='') unset ($router[(count($router)-1)]);
$router_str = implode('/',$router); //строка пути
//----------------- конец ----------------- 


//------------- язык сайта
// прописываем потдержываемые языки
$site_language=$yaz[0];
$yaz=array_slice($yaz,1);

if(in_array($router[0],$yaz))
{
 $site_language=$router[0];
 $router=  array_slice($router,1);
 $site_url=$site_url.'/'.$site_language;
 $router_str = implode('/',$router); //строка пути
}
// $site_language - язык сайта
// подключаем файл перевода    
include (SITE_PATH.'/modul/translation/trans/translation_'.$site_language.'.php');



////////////////ниже правила для сайта ////////////////////////////////////////////////////////////////


// для статических страниц 
if  ($route_file_ext=='html'){
    $modul = 'page';$file = 'page';} 
    
// для стартовой страниц
if ($router_str=='' && empty($route_file) )
    {$modul = 'index';$file = 'index';}


if ($router_str=='csv' && empty($route_file) )
{$modul = 'shop';$file = 'xml_import';}
  
 
// if ($router[0]=='construction'){
// $modul = 'hara';$file = 'construction';    
// } 
// 
//  if ($router[0]=='engineering'){
// $modul = 'hara';$file = 'engineering';
// if ($router[1])$file = 'engineering_str';
// }
// 
//   if ($router[0]=='substructure'){
// $modul = 'hara';$file = 'substructure';    
// }
// 
//    if ($router[0]=='decor_houses'){
// $modul = 'hara';$file = 'decor_houses';    
// }
 
 
    
//  //для молудя вакансии
// if  ($router_str=='jobs')
//  { 
//     $modul = 'vac';$file = 'vac';} 
//    
 
   
 

 //для молудя команда
// if  ($route_file=='team' && $route_file_ext=='html')
//     { $modul = 'comand';$file = 'comand';}   
 
 //для молудя вопрос ответ
// if  ($route_file=='qa' && $route_file_ext=='html'){
//     $modul = 'qa';$file = 'qa';} 
     
 //для молудя вопрос
// if  ($route_file=='question' && $route_file_ext=='html'){
//     $modul = 'question';$file = 'question';} 
     
     

     
////для молудя техподдержка
//if ($router[0]=='tex'){
//  $modul = 'tex';$file = 'tex';  
//}
////для молудя партнеры
//if ($router[0]=='partnery'){
//  $modul = 'partnery';$file = 'partnery';  
//}

////для оформление покупки
//if ($router[0]=='chekout'){
//  $modul = 'shop';$file = 'chekout';  
//}


////для молудя распродажи
//if ($router[0]=='action'){
//  $modul = 'shop';$file = 'action';  
//}
     
// для новостей
if ($router[0]=='news'){
  $modul = 'news';  
  if ($router[1]){
  $file = 'news_str';
  $id_news=$router[1];
  } 
}

// для акций
if ($router[0]=='promotions'){
  $modul = 'akcii';  
  if ($router[1]){
  $file = 'akcii_str';
  $id_news=$router[1];
  } 
}

// для статей
if ($router[0]=='articles'){
  $modul = 'article';  
  if ($router[1]){
  $file = 'article_str';
  $id_news=$router[1];
  } 
}

// для модуля публикации
//if ($router[0]=='pub'){
//  $modul = 'pub';  
//  if ($router[1]){
//  $file = 'pub_str';
//  $id_news=$router[1];
//  } 
//}

// для модуля публикации
//if ($router[0]=='do'){
//  $modul = 'deytelnost';  
//  if ($router[1]){
//  $file = 'deytelnost_str';
//  $id_news=$router[1];
//  } 
//}

//// для модуля галереии
//if ($router[0]=='gallery' && !$router[1]){
//  $modul = 'hara';
//  $file = 'gal'; 
// }

// для онас
if ($router[0]=='about' && !$router[1]){
  $modul = 'about';
  $file = 'about'; 
 } 
 
// // для прайсы
//if ($router[0]=='price' && !$router[1]){
//  $modul = 'hara';
//  $file = 'price'; 
// }
 
//  // для документы
//if ($router[0]=='docs' && !$router[1]){
//  $modul = 'hara';
//  $file = 'docs'; 
// }
 
//   // для документы
//if ($router[0]=='reviews' && !$router[1]){
//  $modul = 'reviews';
//  $file = 'reviews'; 
// }
 


 
 //модуль поиска

 
 
 
// для статей
//if ($router[0]=='article'){
//  $modul = 'stat';  
//  if ($router[1]){
//  $file = 'stat_str';
//  $id_stat=$router[1];
//  } 
//}


//if ($router[0]=='biografiya' && empty($router[1]) ){
//  $modul = 'biograf'; 
//  $file = 'biograf';
//   
//}


//if ($router[0]=='contacts' && empty($router[1]) ){
//  $modul = 'contacts'; 
//  $file = 'contacts';
//   
//}


  // для контактов
if ($router[0]=='contact' && !$router[1]){
  $modul = 'contacts';
  $file = 'contacts'; 
 }  
    
    
// для магазина
if ($router[0]=='shop'){
  $modul = 'shop'; 
  $file = 'cat';
  if ($route_file_ext=='html'){
  $file = 'prod';
  } 
}

// для магазина
if ($router[0]=='action'){
  $modul = 'shop'; 
  $file = 'action';
  
}

// для магазина
if ($router[0]=='cart'){
  $modul = 'shop'; 
  $file = 'cart_str';
  
}

// для магазина
if ($router[0]=='chekout'){
  $modul = 'shop'; 
  $file = 'chekout';
  
}

// для магазина
if ($router[0]=='chekout1'){
  $modul = 'shop'; 
  $file = 'chekout1';
  
}

// для магазина
if ($router[0]=='chekout2'){
  $modul = 'shop'; 
  $file = 'chekout2';
  
}

// для магазина
if ($router[0]=='thanks'){
  $modul = 'shop'; 
  $file = 'thanks';
  
}

// доставка
if ($router[0]=='delivery_payment'){
  $modul = 'dost'; 
  $file = 'dost';
  
}




 //модуль поиска

if ($_GET['s'])$_GET['s']=trim($_GET['s']);
if (!empty($_GET['s']) && $_GET['s']!='Поиск'){
  $modul = 'search'; 
  $file = 'search';
}

    // для sait_map
if ($route_file=='sitemap' && $route_file_ext=='html'){
  $modul = 'sitemap';
  $file = 'sitemap'; 
 }