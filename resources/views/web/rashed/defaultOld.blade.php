<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

<title>{{$title}}</title>
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/styles.css') !!}" />
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/styles-responsive.css') !!}" />
<link type="text/css" rel="stylesheet" href="{!! asset('public/assets/css/custom.css') !!}" />

<link href='http://fonts.googleapis.com/css?family=Raleway:600,700,500,400' rel='stylesheet' type='text/css'>

<link type="text/css" rel="stylesheet" href="{!! asset('public/fancybox/jquery.fancybox.css') !!}" />

<script src="{!! asset('public/assets/js/html5.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery-1.10.1.min.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
<script src="{!! asset('public/fancybox/jquery.fancybox-video.js') !!}"></script>
<script src="{!! asset('public/fancybox/helpers/jquery.fancybox-media.js') !!}"></script>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
	@yield('css') 
  
</style>

<script> 
    @yield('js') 
</script>

</head>
<body>
	@include('web.includes.nav')
	
        @yield('content')


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82759526-1', 'auto');
  ga('send', 'pageview');

</script>        
</body>
</html>
