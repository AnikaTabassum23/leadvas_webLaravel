<!DOCTYPE html>
<html  dir="ltr" lang="en-US">

<head>
<title>{{$title}}</title>
<meta name="description" content="{{$about->content}}">
<meta name="keywords" content="Rashed Zaman, Cinematographer, Bangladesh">
<meta name="author" content="Rashed Zaman">
<!--Facebook-->
<meta property="og:title" content="{{$title}}"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{url('/')}}"/>
<meta property="og:image" content="{{url('uploads/about/'.$about->image)}}" />
<meta property="og:description" content="{{$about->content}}" />
<!--Twitter-->
<meta name="twitter:title" content="{{$title}}">
<meta name="twitter:url" content="{{url()}}">
<meta name="twitter:image" content="{{url('uploads/about/'.$about->image)}}">
<meta name="twitter:description" content="{{$about->content}}">
<!--Google+-->
<meta itemprop="name" content="{{$title}}">
<meta itemprop="description" content="{{$about->content}}">
<meta itemprop="image" content="{{url('uploads/about/'.$about->image)}}">

<script type="text/javascript">
//<![CDATA[
try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok2v=1613a3a185/"},atok:"1c0a276bc888dd645d8af10982afd5a6",petok:"a37d0005c357cdd317b76d3ac3f7aae472629fa0-1416475889-1800",zone:"renklibeyaz.com",rocket:"0",apps:{}}];CloudFlare.push({"apps":{"ape":"b0b7d59283ac293b8bc66aa5da231c47"}});!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="../../ajax.cloudflare.com/cdn-cgi/nexp/dok2v%3d919620257c/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
//]]>
</script>
{{HTML::style('assets/css/style_dark.css')}}
{{HTML::style('assets/css/bootstrap.custom.css')}}
{{HTML::style('assets/css/custom.css')}}
<link rel='stylesheet' id='contentFont-css' href='http://fonts.googleapis.com/css?family=PT+Sans:regular&amp;subset=cyrillic,latin' type='text/css' media='all'/>

{{HTML::script('assets/js/jquery-1.7.min.js')}}
{{HTML::script('assets/js/jquery.easing.1.3.js')}}
{{HTML::script('assets/js/jquery.history.js')}}
{{HTML::script('assets/js/main.js')}}
{{HTML::script('assets/js/jquery.vimeo.api.min.js')}}
<!-- for url -->
<script src="{{URL::route('setUrl')}}"></script>

<script type='text/javascript'>
var bgTime = 1000; // bg Image/Video animation display duration
var bgPaused=false; // bg Image/Video animation paused
var menuTime = 500; // menu delay
var autoPlay = true; // Background audio autoplay
var loop = true; // Background audio loop or next song
var twtTime = 1000; // Twitter display duration
var prettyTheme = 'dark_square'; //Pretty Photo Plug-in Teheme

var normalFade = true; // Normal fade animation
var frontPage = ''; // Front Page URL
var btnSoundURL = 'http://www.renklibeyaz.com/audio/rollover1_01'; // Button Hover Sound
var menuPositionFixed = false;

//v1.3
var videoPaused = false;
var menuAlwaysOpen = false;
var bgStretch = true;
</script>
{{HTML::script('assets/js/froogaloop.js')}}

</head>
<body>
    <div id="body-wrapper">
        <div id="bgImage">
            <div id="bgImageWrapper"></div>
        </div>
        <div id="bgPattern"></div>
        <div id="videoExpander"></div>
        <div id="bgText"><h3></h3><div class="subText"></div></div>
        <ul id="bgImages">
            <li>
                <iframe id="myvideo" src="http://player.vimeo.com/video/{{$data->intro_video}}?api=1&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=ffcc00" videotype="vimeo" width="500" height="281" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
            </li>
        </ul>
        <div id="homeBtn">
            <a href="{{route('demo')}}" class="btn btn-intro btn-lg"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> </a>
        </div>
        <div id="bgImageLogo">
        </div>
    </div>
    
    <div id="bodyLoading">
        <div id="loading">
        Loading<br/>
            <img src="{{url('assets/images/loading1.gif')}}" width="80" height="" alt="loading"/>
        </div>
    </div>
    
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82759526-1', 'auto');
  ga('send', 'pageview');

</script>
</html>


<script>
    $(document).ready(function () {
        window.setTimeout(function(){$
            $("#bgImageLogo").html('<a href="{{route("demo")}}"'+urlAction.getSiteAction('/')+'"><img style="width:295px;height:80px;" class="fade-in three" alt="Logo" src="'+urlAction.getSiteAction('/uploads/intro_logo/{{$data->intro_logo}}')+'"></a>');
        }, 1500);
        
        // Handler for .ready() called.
//        window.setTimeout(function () {
//            location.href = "{{route('demo')}}";
//        }, 31000)
        $("#myvideo").vimeo("setLoop", true);
    });
    
</script>