<?php

/// функция для вычисления url по PID


$shop_f_cat = $db->select_id("SELECT * FROM " . DB_PREFIX . "shop_cat WHERE en=1 ORDER BY sort ASC"); // изьыточный запрос навсякий случай

function shop_pid_url($pid) {
    global $shop_f_cat;
    $url = '';
  if ($shop_f_cat[$pid]['url'])  $url = $shop_f_cat[$pid]['url'] . '/' . $url;
    while ($shop_f_cat[$pid]['pid'] != 0) {
        $pid = $shop_f_cat[$pid]['pid'];
        $url = $shop_f_cat[$pid]['url'] . '/' . $url;
    }
    return $url;
}

// создает урл текшей страницы с языковым пефиксом $a
function url_len ($a){
    
if ($a!='') $ret='http://'.$_SERVER['HTTP_HOST'].'/'.$a.'/';
else $ret='http://'.$_SERVER['HTTP_HOST'].'/';


global $router,$site_url;
 $get=$_GET;
   
 $url='';
 $razd='?';
 foreach ($router as $v) {if($v)$url.=$v.'/';}
 if (count($get)>0)
 {$url.='?';
 foreach ($get as $k=>$v) {$url.=$k.'='.$v.'&';} 
 $url=trim ($url,'&');
 $razd='&';
 } 

return $ret.$url;
    
}


// создает текуший урл + get параметр - значение
function cr_url_get ($kk,$vv){
 
    global $router,$site_url;
 //$router1= $router;
 $get=$_GET;
 unset ($get[$kk]);
 $url=$site_url.'/';
 $razd='?';
 //if (isset($site_url) && $site_url !=$yaz[0] )array_unshift($router1,$site_language);
 foreach ($router as $v) {if($v)$url.=$v.'/';}
 if (count($get)>0)
 {$url.='?';
 foreach ($get as $k=>$v) {$url.=$k.'='.$v.'&';} 
 $url=trim ($url,'&');
 $razd='&';
 } 

if ($kk!='' and $vv)$url.=$razd.$kk.'='.$vv;
return $url;
     
}

////// пажинация ///
function purl($url,$razd,$n){
if ($n!=1)$url.=$razd.'page='.$n;
return $url;
}

function crr_url() {
 global $router,$route_file,$route_file_ext,$site_url;
 $get=$_GET;
 unset($get['page']);
 /// в других проектах удалить
 unset($get['tip']);
  
 $url=$site_url.'/';
 $razd='?';
 foreach ($router as $v) {if($v)$url.=$v.'/';}
 if ($route_file)$url.=$route_file.'.'.$route_file_ext;
 
 if (count($get)>0)
 {$url.='?';
 foreach ($get as $k=>$v) {$url.=$k.'='.$v.'&';} 
 $url=trim ($url,'&');
 $razd='&';
 } 
$r['url']=$url;
$r['razd']=$razd;
return $r;
 }

 //// функцыя пажинации $all - всего записей,$pstr - записей на странице ,$lim - количесво стрниц в пажинации

function paging ($all,$pstr,$lim){
    $last=ceil($all/$pstr);
    if (isset($_GET['page']))$cur=(int)$_GET['page'];
    else $cur=1;
    if ($cur<1 || $cur>$last)$cur=1;
    $sme=ceil($lim/2);
    $start=$cur-$sme;
    if (($start+$lim-1)>=$last)$start=$last-$lim+1;
    if ($start<1)$start=1;
   
 //собираем урл
 $r=crr_url(); $url =$r['url']; $razd =$r['razd'];
 
 
 //////// шаблон пажинации /////////////
 if ($last>1)
 {
     
 // стрелка <
 if ($cur>1)$ret.='<a class="fl_l pag_link" href="'.purl($url,$razd,$cur-1).'">Пред.</a>';    
     
 $ret.='<ul >';
 
 // первая страница
 //if ($start>1)$ret.='<li><a href="'.purl($url,$razd,1).'">1</a></li>';
  // .. <
 //if ($start-1 > 1)$ret.='<li><a href="'.purl($url,$razd,$start-1).'">...</a></li>';
 
 if ($last>1)
for ($index = 1; $index <= $lim; $index++) {if ($start<=$last)if ($start==$cur)
    // активная страница
    $ret.='<li class="active"><a>'.$start.'</a></li>';
else
    // страница   
    $ret.='<li><a href="'.purl($url,$razd,$start).'">'.$start.'</a></li>';
$start++;
}
 // .. >
 //if ($start<$last)$ret.='<li><a href="'.purl($url,$razd,$start).'">...</a></li>';
 // последняя страница
 //if ($start<$last)$ret.='<li><a href="'.purl($url,$razd,$last).'">'.$last.'</a></li>';
 // стрелка > 


$ret.='</ul>'; 

 if ($cur<$last)$ret.='<a class="fl_l pag_link" href="'.purl($url,$razd,$cur+1).'">След.</a>';
}

 $limit=($cur-1)*$pstr.','.$pstr;$end[0]=$ret;$end[1]=$limit;
 return $end;
}


///// доп пажинация в других проектах удалить *******************************************
function purl1($url,$razd,$n){
if ($n!=1)$url.=$razd.'page1='.$n;
return $url;
}

function crr_url1() {
 global $router,$site_url;
 $get=$_GET;
 unset($get['page1']);
 $get['tip']=1;
 $url=$site_url.'/';
 $razd='?';
 foreach ($router as $v) {if($v)$url.=$v.'/';}
 if (count($get)>0)
 {$url.='?';
 foreach ($get as $k=>$v) {$url.=$k.'='.$v.'&';} 
 $url=trim ($url,'&');
 $razd='&';
 } 
$r['url']=$url;
$r['razd']=$razd;
return $r;
 }

function paging1 ($all,$pstr,$lim){
    $last=ceil($all/$pstr);
    if (isset($_GET['page1']))$cur=(int)$_GET['page1'];
    else $cur=1;
    if ($cur<1 || $cur>$last)$cur=1;
    $sme=ceil($lim/2);
    $start=$cur-$sme;
    if (($start+$lim-1)>=$last)$start=$last-$lim+1;
    if ($start<1)$start=1;
   
 //собираем урл
 $r=crr_url1(); $url =$r['url']; $razd =$r['razd'];
 
  //////// шаблон пажинации /////////////
  // стрелка <
 if ($cur>1)$ret.='<a class="fl_l pag_link" href="'.purl1($url,$razd,$cur-1).'">Предыдущая</a>';
 

 $ret='<ul>';

 // первая страница
 if ($start>1)$ret.='<li><a href="'.purl1($url,$razd,1).'">1</a></li>';
  // .. <
 if ($start-1 > 1)$ret.='<li><a href="'.purl1($url,$razd,$start-1).'">...</a></li>';
 
 if ($last>1)
for ($index = 1; $index <= $lim; $index++) {if ($start<=$last)if ($start==$cur)
    // активная страница
    $ret.='<li><strong>'.$start.'</strong></li>';
else
    // страница   
    $ret.='<li><a href="'.purl1($url,$razd,$start).'">'.$start.'</a></li>';
$start++;
}
 // .. >
 if ($start<$last)$ret.='<li><a href="'.purl1($url,$razd,$start).'">...</a></li>';
 // последняя страница
 if ($start<$last)$ret.='<li><a href="'.purl1($url,$razd,$last).'">'.$last.'</a></li>';


$ret.='</ul>';  
 
 // стрелка > 
if ($cur<$last)$ret.='<a class="fl_l pag_link" href="'.purl1($url,$razd,$cur+1).'">Следующая</a>';
 $limit=($cur-1)*$pstr.','.$pstr;$end[0]=$ret;$end[1]=$limit;
 return $end;
}



// вывод шаблона
function showtempl($t){
global $site_language;
ob_start();
include $t;
return ob_get_clean(); 
}

//////////// кеширование ///////////////////////

// читаем кешь есле есть возврашаем запись есле нет false
// параметры $k - ключь

function cash_read($k){
    
$ret=false;

//файл
if (CASH==1){
$file_cash=SITE_PATH.'/cash/'.$k.'.cash';
$time_sec=time(); 
$time_file=filemtime($file_cash);

if ($time_file){ 
            if ($time_file>$time_sec){
            $rHandle = fopen($file_cash,'r');                     
            $ret = fread($rHandle, filesize($file_cash));
            fclose($rHandle);
            }
            else unlink ($file_cash);
            }

} 
if (CASH==2){
global $memcache;
$ret = $memcache->get($k);
} 
 
return $ret;   
}

// пишем кешь 
// параметры $k - ключь, $t - время в секундах харанения $d - данные
function cash_add($k,$t,$d){
if (CASH==1){
$file_cash=SITE_PATH.'/cash/'.$k.'.cash';
$time_sec=time()+$t;
$rHandle = fopen($file_cash,'w'); 
fwrite($rHandle, $d);
fclose($rHandle);
chmod($file_cash, 0777);
touch ($file_cash,$time_sec);

}
if (CASH==2){
global $memcache; 
$memcache->set($k, $d, false, $t);
}
}


// редирект
function JSRedirect($url='')
{
  if (headers_sent()) print "<script>location='$url';</script>";
  else header('location: '.$url);
}


           function generate_password($number)
            {
                $arr = array('a','b','c','d','e','f',
                            'g','h','i','j','k','l',
                            'm','n','o','p','r','s',
                            't','u','v','x','y','z',
                            'A','B','C','D','E','F',
                            'G','H','I','J','K','L',
                            'M','N','O','P','R','S',
                            'T','U','V','X','Y','Z',
                            '1','2','3','4','5','6',
                            '7','8','9','0',
                            '!','?','&','$',
                            '+','-');
                $pass = "";
                for($i = 0; $i < $number; $i++)
                {
                $index = rand(0, count($arr) - 1);
                $pass .= $arr[$index];
                }
                return $pass;
            }
            
            
            
//изменяет размер картинки 
// src  - путь к файлу к-рый меняем
// dest - путь где будет новый файл       
            
function img_resize($src, $dest, $width, $height, $rgb = 0xFFFFFF, $quality = 100) {  
    if (!file_exists($src)) {  
        return false;  
    }  

    $size = getimagesize($src);  

    if ($size === false) {  
        return false;  
    }  

    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));  
    $icfunc = 'imagecreatefrom'.$format;  

    if (!function_exists($icfunc)) {  
        return false;  
    }  

    $x_ratio = $width  / $size[0];  
    $y_ratio = $height / $size[1];  

    if ($height == 0) {  

        $y_ratio = $x_ratio;  
        $height  = $y_ratio * $size[1];  

    } elseif ($width == 0) {  

        $x_ratio = $y_ratio;  
        $width   = $x_ratio * $size[0];  

    }  

    $ratio       = min($x_ratio, $y_ratio);  
    $use_x_ratio = ($x_ratio == $ratio);  

    $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);  
    $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);  
    $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width)   / 2);  
    $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);  

    $isrc  = $icfunc($src);  
    $idest = imagecreatetruecolor($width, $height);  

    imagefill($idest, 0, 0, $rgb);  
    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, $new_width, $new_height, $size[0], $size[1]);  

    imagejpeg($idest, $dest, $quality);  

    imagedestroy($isrc);  
    imagedestroy($idest);  

    return true;  

}        


// удаление всех файлов из указанной директории
function clearDir($path){ 
    if (substr($path, strlen($path)-1, 1) != '/') $path .= '/'; 
    if ($handle = @opendir($path)){ 
        while ($obj = readdir($handle)){ 
            if ( ($obj=='.') or ($obj=='..') ) continue; 
            if ( is_file($path.$obj) )  unlink($path.$obj); 
        }   
         closedir($handle); 
     } 
}

function NormalizeString ( $s ) {
    $r = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м', 'н','о','п','р','с','т','у','ф','х','ц','ч', 'ш', 'щ', 'ъ','ы','ь','э', 'ю', 'я',' ');
    $l = array('a','b','v','g','d','e','e','g','z','i','y','k','l','m','n', 'o','p','r','s','t','u','f','h','c','ch','sh','sh','', 'y','y', 'e','yu','ya','-');
    $s = str_replace( $r, $l, strtolower($s) );
    $s = preg_replace("/[^\w\-]/","$1",$s);
    $s = preg_replace("/\-{2,}/",'-',$s);
    return trim($s,'-');
}


// обрезает строку по пробелу посл еуказаного символа и вырезает теги 
function str_smoll($a,$b){
    
$search = array ("'<script[^>]*?>.*?</script>'si",  // Вырезается javascript
                 "'<[\/\!]*?[^<>]*?>'si",           // Вырезаются html-тэги
                 "'([\r\n])[\s]+'",                 // Вырезается пустое пространство
                 "'&(quot|#34);'i",                 // Замещаются html-элементы
                 "'&(amp|#38);'i",
                 "'&(lt|#60);'i",
                 "'&(gt|#62);'i",
                 "'&(nbsp|#160);'i",
                 "'&(iexcl|#161);'i",
                 "'&(cent|#162);'i",
                 "'&(pound|#163);'i",
                 "'&(copy|#169);'i",
                 "'&#(\d+);'e");                    // вычисляется как php

$replace = array ("",
                  "",
                  "\\1",
                  "\"",
                  "&",
                  "<",
                  ">",
                  " ",
                  chr(161),
                  chr(162),
                  chr(163),
                  chr(169),
                  "chr(\\1)");

$text = preg_replace ($search, $replace, $a);
$text=trim($text);

$aa=mb_strpos($text, " ", $b, "utf8");
$zz=' ...';
if (!$aa){$aa=$b;}

if ($aa>=mb_strlen($text, "utf8") and $aa)$zz='';


$text=mb_substr($text, 0, $aa, "utf8").$zz;   


return $text;
}