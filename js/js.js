
function openPopGet(){
    var top = $(document).scrollTop()+20
    $("#pop_get").css("top", top);
    $(".pop_up").slideUp("fast");
    $("#pop_get").slideDown("fast");
};


function openPopUp(){
    var top = $(document).scrollTop()+20
    $("#shop_popupp").css("top", top);
    $(".pop_up").slideUp("fast");
    $("#shop_popupp").slideDown("fast");
};

function openPopEn(){
    //var top = $(document).scrollTop()+20
    //$("#pop_en").css("top", top);
    $(".pop_up").slideUp("fast");
    $("#pop_en").slideDown("fast");
};

function openPopEn_ok(){
    //var top = $(document).scrollTop()+20
    //$("#pop_en_ok").css("top", top);
    $(".pop_up").slideUp("fast");
    $("#pop_en_ok").slideDown("fast");
};

function openPopUp_help(){
    //var top = $(document).scrollTop()+20
    $(".pop_up").slideUp("fast");
    $("#pop_ask").css("display", "block");
};
function openPopUp_get(){
    //var top = $(document).scrollTop()+20
    $(".pop_up").slideUp("fast");
    $("#pop_get").css("display", "block");
};
function openPopUp_ok(){
    //var top = $(document).scrollTop()+20
    $(".pop_up").slideUp("fast");
    $("#pop_ok").css("display", "block");
};
function closePopUp(){
    $(".pop_up").slideUp("fast");
};

$(window).load(function() {
  $('.idx_slider_id').flexslider({
    animation: "slide",
    slideshowSpeed: 7000,
    directionNav: false
  });
});

jQuery(document).ready(function() {
    if ($("#4_items_slider").find("li").length > 4) {
    jQuery('#4_items_slider').jcarousel({
        scroll: 1,
        visible: 4,
        wrap: "circular",
        itemFallbackDimension: 210
    });
    }
});
jQuery(document).ready(function() {
    if ($("#5_items_slider").find("li").length > 5) {
    jQuery('#5_items_slider').jcarousel({
        scroll: 1,
        visible: 5,
        wrap: "circular"
    });
    };
});
jQuery(document).ready(function() {
    if ($("#3items_slider").find("li").length > 3) {
    jQuery('#3items_slider').jcarousel({
        scroll: 1,
        visible: 3,
        wrap: "circular"
    });
    };
});
$(document).ready(function() {
    
    $('body').on('change', '.step_content .radio input', function(){
        if($(this).is(':checked')) {
            var name = $(this).attr("name");
            $(".step_content .radio input[name='"+name+"']").parent().find("label").css("color", "#020532");
            $(this).parent().find('label').css("color", "#1778d4");
        }
        else {
            $(this).parent().find('label').css("color", "#020532");
        }
    });
    
//disable chekboxes
    $(".filtr_dis").each(function() {
        $(this).find("input").attr("disabled", true);
    });
//    $(".parameters label input").click(function() {
//        $(this).parent().find("a").click();
//    });
//display last menu items to other side
$(".dropdown_list").each(function() {
    if ($(this).find("li").length > 6){
        $(this).css("width","500px");
    }
    if ($(this).find("li").length > 12){
        $(this).css("width","750px");
    }
});

//sorting menu
$("#sort_view .dropdown").click(function(){
      if (!$(this).parent().hasClass("active_drop")){
      $(this).parent().find(".popup-dropdown").css("display","block");
      $(this).parent().addClass("active_drop")
      }
      else {
          $('.popup-dropdown').css("display","none");
          $(this).parent().removeClass("active_drop");
      }
});

$(".page_item_img center a").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	200, 
		'speedOut'		:	200,
                'cyclic': true,
                'overlayColor': '#222'
	});
});