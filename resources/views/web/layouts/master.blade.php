<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
{{-- <!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]--> --}}

<!-- Mirrored from codezel.com/html/tailors-online/indexv2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Jan 2023 09:59:52 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	@include('web.includes.css')
</head>
<body class="tg-home">

	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">

        @include('web.includes.header')

        @yield('body')

        @include('web.includes.footer')


    </div>

    @include('web.includes.js')

</body>
</html>
