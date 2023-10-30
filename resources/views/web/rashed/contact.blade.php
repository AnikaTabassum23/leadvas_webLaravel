@extends('web.layouts.default')
@section('css')  
<style>
    .morph {
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .morph:hover {
        border-radius: 0%;
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
    }


    .contact-centered {
    width: 370px!important;



    
}
  .social-media_logo{
            margin: 35px 0 0!important;
  }


</style>
@stop
@section('content')
	<section>
		<div style="top:245px" class="contact-centered text-center">
            <img width="360" src="{{url('public/assets/images/qrcode.png')}}">
            <div class="clearfix"></div>
            <div style="margin-top: 30px;">
			whatsApp/cell: {{$data->contact_cell}}<br />
			email: <a href="mailto:{{$data->contact_email}}">{{$data->contact_email}}</a>
            </div>
			
			     <div class="social-media_logo text-center">
                @foreach($sl as $v)
                    <a href="{{$v->social_link}}" target="_blank" style="padding:0 3px;"><img class="morph" width="35" src="{{url('public/uploads/social_logo/'.$v->social_logo)}}" alt="image" /></a>
                @endforeach
                <a href="{{url('public/uploads/updateCv/'.$cv->attachment)}}" target="_blank" style="padding:0 3px;"><img class="morph" width="35" src="{{url('public/uploads/updateCv/'.$cv->cv_icon)}}" alt="image" /></a>
                
                 <!-- <a href="{{url('public/uploads/updateCv/'.$cv->attachment)}}" target="_blank" style="padding:0 3px;"><img class="morph" width="40" src="{{url('public/uploads/social_logo.cv.png/'.$v->social_logo)}}" alt="image" /></a> -->
          </div>
      </div>

      <div class="clr"></div>
  </section>
@stop