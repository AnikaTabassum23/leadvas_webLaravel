@extends('web.layouts.default')
@section('content')
<style type="text/css">

.centered-container {
 
    top: 35%!important;

}	

.blog_button{
	
	text-align:center; 
}
.blog_button img {
	width: 95%;
	margin-top: 18px
}
.blog_button a {
	cursor: pointer;

}
.image_responsive{
		width: 100%;
		height: auto;
}



	</style>
	<section>
		<div class="centered-container about-centered">

			<div class="blog_button">
				
				<a href="https://www.facebook.com/olddhakapictures/?modal=admin_todo_tour"  target="_blank"><img class="image_responsive" src="{{url('public/img/old_dhaka_adda.png')}}" alt=""></a>

				<a  href="https://www.facebook.com/rashed.zaman.cinematographer/?modal=admin_todo_tour" target="_blank"><img  class="image_responsive"  src="{{url('public/img/camerashram.png')}}" alt=""></a>
	
			</div>

	           
            

         

		</div>
		
		<div class="clr"></div>
	</section>
@stop

