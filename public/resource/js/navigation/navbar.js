$(document).ready(function(){$.fn.scrollTo=function(e){var o={offset:-60,speed:"slow",override:null,easing:null};return e&&(e.override&&(e.override=-1!=override("#")?e.override:"#"+e.override),$.extend(o,e)),this.each(function(e,t){$(t).click(function(e){var s;null!==$(t).attr("href").match(/#/)&&(e.preventDefault(),s=o.override?o.override:$(t).attr("href"),history.pushState?(history.pushState(null,null,s),$("html,body").stop().animate({scrollTop:$(s).offset().top+o.offset},o.speed,o.easing)):$("html,body").stop().animate({scrollTop:$(s).offset().top+o.offset},o.speed,o.easing,function(e){window.location.hash=s}))})})},$("#GoToHome, #GoToFeatures, #GoToDesc, #GoToGallery, #GoToPricing, #GoToTestimoni, #GoToContact, #GoToDownload, .GoToto").scrollTo({speed:1400}),headerWrapper=parseInt($(".navbar").height()),offsetTolerance=60,$(window).scroll(function(){scrollPosition=parseInt($(this).scrollTop()),$(".navbar-nav li a").each(function(){thisHref=$(this).attr("href"),thisTruePosition=parseInt($(thisHref).offset().top),thisPosition=thisTruePosition-headerWrapper-offsetTolerance,scrollPosition>=thisPosition&&($(".selected").removeClass("selected"),$(".navbar-nav li a[href="+thisHref+"]").addClass("selected"))}),bottomPage=parseInt($(document).height())-parseInt($(window).height()),(scrollPosition==bottomPage||scrollPosition>=bottomPage)&&($(".selected").removeClass("selected"),$("navbar-nav li a:last").addClass("selected"))})});