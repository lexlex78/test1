<!DOCTYPE html>
<html>
    <head>
        <title><?=$GLOBALS['meta_title']?></title>
       
        <base href="<?='http://'.$_SERVER['HTTP_HOST']?>"/>
        <meta name="description" content="<?=$GLOBALS['meta_descr']?>"/>
        <meta name="keywords" content="<?=$GLOBALS['meta_keyw']?>"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" href="./css/reset.css" type="text/css" media="screen" /> 
        <link rel="stylesheet" href="./css/flexslider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="./css/skin.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="./css/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="./css/all.css" type="text/css" media="screen" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="./js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="./js/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="./js/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="./js/js.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <div class="body clearfix">
                    <div class="logo_link">
                        <a href="#">
                            <div class="logo"></div>
                        </a>
                    </div>
                    <div class="header_asside">
                        <div class="sub_menu">
                            <? echo $GLOBALS['up_menu'] ?>
                        </div>
                        <div class="search">
                            <form method="get" id="ssearch" name="search">
                                <div class="search-form fl_r">
                                    <input id="searchbar" class="validate[required]" type="text" placeholder="Поиск" value="" name="s">
                                    <a  onclick="javascript:$('#ssearch').validationEngine().submit();" class="btn-search">&nbsp;</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="header_basket" id="shop_cart">
                       <? echo $GLOBALS['shop_cart']['kor'] ?>
                        <p class="phone" ><? echo $GLOBALS['set']['tel']?></p>
                    </div>
                </div>
                <div class="nav">
                    <div class="body">
                        
                        <? echo $GLOBALS['shop_cat']?>

                    </div>
                </div>
            </div>
            <div class="content">
               
                <? echo $GLOBALS['center_area']?>
                
               
            </div>
            <div class="footer">
                <div class="body clearfix">
                    <div class="clearfix fl_l">
                        <div class="sub_menu">
                            <? echo $GLOBALS['down_menu'] ?>
                        </div>
                        <p class="copyright"><? echo $GLOBALS['set']['cop']?></p>
                    </div>
                    <div class="clearfix fl_r">
                        <p class="phone"><? echo $GLOBALS['set']['tel']?></p>
                        <p class="mail"><? echo $GLOBALS['set']['email1']?></p>
                    </div>
                </div>
            </div>
        </div>
 
        
        
        
        
              
         <?=$GLOBALS['question']?>
      
        
        <?=$GLOBALS['script_shop']?>
        
        <script>
        <?=$GLOBALS['script_mes']?>
        </script>
        
        <link type="text/css" href="/admin/css/validationEngine.jquery.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.validationEngine-ru.js"></script>
        <script type="text/javascript" src="js/jquery.validationEngine.js"></script>
        
        <script>
        $('form').validationEngine(); 
        </script>
     
<!--     <script type="text/javascript">
        $(function() {          
          $("img").lazyload({
              
              threshold : 100,
              failurelimit : 100,
             placeholder : "js/grey.gif",
	    effect      : "fadeIn"
          });
      });
    </script>   -->
        
        
    </body>
</html>