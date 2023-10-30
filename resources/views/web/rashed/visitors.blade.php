<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{$title}}</title>
{{HTML::style('assets/css/styles.css')}}
{{HTML::style('assets/css/styles-responsive.css')}}
{{HTML::style('assets/css/custom.css')}}
{{HTML::style('assets/css/bootstrap.min.css')}}

<link href='http://fonts.googleapis.com/css?family=Raleway:600,700,500,400' rel='stylesheet' type='text/css'>

{{HTML::script('assets/js/html5.js')}}

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
	@include('nav')
	
        <section>
		<div class="centered-container about-text">
			<table border="0" cellpadding="0" cellspacing="0" class="table ">
                            <thead>
                                <tr>
                                    <th width="20%">Date</th>
                                    <th width="7%">Hits</th>
                                    <th>IP Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($visitors as $v)
                                <tr>
                                    <td>{{$v->date2}}</td>
                                    <td>{{$v->count}}</td>
                                    <td>
                                        <?php $all_ip  = explode(', ', $v->ip); ?>
                                        @foreach($all_ip as $ip)
                                        <a href="http://www.checkip.com/ip/{{$ip}}" target="_blank">{{$ip}}</a>,
                                        @endforeach
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
