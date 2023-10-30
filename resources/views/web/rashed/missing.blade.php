<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{$title}}</title>
{{HTML::style('assets/css/styles.css')}}
{{HTML::style('assets/css/styles-responsive.css')}}
{{HTML::style('assets/css/custom.css')}}

<link href='http://fonts.googleapis.com/css?family=Raleway:600,700,500,400' rel='stylesheet' type='text/css'>

{{HTML::script('assets/js/html5.js')}}

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
	@include('nav')
	<section>
		<div class="container-404">
                    <img src="{{url('assets/images/404.png')}}" alt="image" />
                </div>
            
		<div class="clr"></div>
	</section>
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