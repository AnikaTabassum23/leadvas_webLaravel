@extends('web.layouts.default')
<script src="{!! asset('public/assets/js/html5.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery-1.10.1.min.js') !!}"></script>
<script src="{!! asset('public/assets/js/jquery.mousewheel-3.0.6.pack.js') !!}"></script>
<script src="{!! asset('public/fancybox/jquery.fancybox-video.js') !!}"></script>
<script src="{!! asset('public/fancybox/helpers/jquery.fancybox-media.js') !!}"></script>


<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:type" content="albam" />
<meta property="og:title" content="{{$albam->gallery_name}}" />
<meta property="og:description" content="{{$albam->description}}" />
<meta property="og:image" content="{{url('public/uploads/ashramGallery/'.$albam->gallery_thumb)}}" />




@section('css')
<style>

/*for Description Toogles*/
#more {display: none;
/*background: rgba(0, 151, 19, 0.6);*/

}
#myDIV {
  margin-top: 10px;
  max-height:  150px;

  overflow: auto;
  padding: 5px;



}


#myBtn{
color: #9D9E99;
font-size: 12px;
cursor: pointer;

}
#myBtn:hover{
  color: white;
}
/*end for Description Toogles*/


   .previous {
  /*background-color: #f1f1f1;*/
  color: black;
   text-decoration: none;
  display: inline-block;
  padding: 4px 10px;
  font-size: 18px;
  border: 2px solid #A97C50;
  color: #A97C50;
  margin-left: 20px;

}

.previous:hover {
  background-color: #ddd;
  color: black;
}

.next {
 color: black;
   text-decoration: none;
  display: inline-block;
  padding: 4px 10px;
  font-size: 18px;
  border: 2px solid #A97C50;
  color: #A97C50;
}

.round {
  border-radius: 50%;
}
/* End Button*/



    .back-repository{
        display: block;
        padding: 10px 0px;
        background-color:#383733;
        margin-bottom: 5px;

    }

/*
    .back-repository{
        display: block;
        padding: 30px 0px;
    }*/

    .album-compactbox {
        margin: 0 !important;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        position: relative;
        border-radius: 6px;
        z-index: 1;
        width: 200px;
    }

    .album-compactbox:before {
          content: ' ';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: -7px;
          border-bottom: 2px solid gray;
          border-radius: 6px;
          z-index: -1;
    }


    .vf-box{
      top: 0!important;
      left: 0!important;
      z-index: -1!important;
      height: 30%!important;
      width: 20%!important;
      -webkit-transform-style: preserve-3d!important;
      overflow: hidden!important;
  
    }

     .vf-box img{
        z-index: -1!important;
        top:50%!important;
        left:50%!important;
        height:100%!important;
        /*width:100%;*/
        min-width:100%!important;
        min-height:100%;
  /*transform:translate(-50%, -50%);*/
        object-fit:cover!important;
        opacity: .6;
 
    }
    .shareLink{
        position: absolute;
        width: 100%;
        height: 30px;
        background: #00000094;
        z-index: 1;
        bottom: 0px;
        display: none;
        right: 0;
    }
    .shareLink a{
        top: 23%!important;
        left: 33%;
        position: absolute;
        color: #ffffff;
    }
  /*  .shareLink a {
        {{-- top: 35%; --}}

    }*/
    .shareSocialModal{
        height: 250px!important;
        margin: 0 auto;
        text-align: center;
    }
    .shareSocialModal a{
        color: white;
    }
    .shareLinkModal{
        margin-top: 5%;
    }
    .shareLinkModal input{
        padding: 10px;
        width: 70%;
    }

    .share_link a{
      color: white;
    }



    .album-details {
  position: relative;
  top: 0;
  left: 0;
  /*z-index: -1;*/
  height: 450px;
  width: 100%;
  -webkit-transform-style: preserve-3d;
  overflow: hidden;
  padding: 5px;
  margin-top: 5px;
  margin-bottom: 5px;
}
.album-details img {
  position: relative;
  /*z-index: -1;*/
  top:50%;
  left:50%;
  height:auto;
  width:auto;
  min-width:100%;
  min-height:100%;
  transform:translate(-50%, -50%);
  object-fit:cover;
}
.description {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  width: 85%;
  text-align: center;

 }
 .album_name {
  font-size: 38px;


 }
  .album_description {
  font-size: 18px;
   line-height: 25px;
   text-align: left;
 }




.fancybox-image {
    max-height: 540px!important;
    width: auto!important;
    align-items: center;
    margin: auto;

}

.fancybox-inner {

    height: 540px!important;
}


 



  /*Shar Link Model*/
  .shareSocialModal{
    height: 250px!important;
    margin: 0 auto;
    text-align: center;
  }
  .shareSocialModal a{
    color: white;
  }
  .shareLinkModal{
    margin-top: 5%;
  }
  .shareLinkModal input{
    padding: 10px;
    width: 70%;
  }
    /*End Shar Link Model*/


@media only screen and (max-width: 600px) {
   .vf-box{
      height: 250px!important;
      width: 100%!important;
    }
}
@media only screen and (max-width: 768px) {
   .vf-box{
      height: 250px!important;
      width: 100%!important;
    }
}



</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        
        var sz = window.screen.availWidth;
        if(sz > 480 ) {
            $(".fancybox-button").fancybox({
                prevEffect  : 'none',
                nextEffect  : 'none',
                closeBtn    : false
            });

            $(".fancybox")
                .attr('rel', 'fancybox-inner')
                .fancybox({
                    type: 'iframe',
                    autoSize : false,
                    beforeLoad : function() {         
                        this.width  = 'auto';  
                        this.height = '100%';
                    }
            });
            
        <?php $image = 1; ?>    
        }

    });
</script>
@stop
@section('content')
    <section>

   {{-- <div id="ex1" class="modal shareSocialModal">
            <a href="" data-url="{{ route('ashramGallery',['id' => $albam->id, 'albumName' => $albam->gallery_name]) }}" class="ssk ssk-twitter"></a>
            <a href="{{URL::current()}}" data-url="{{ route('ashramGallery',['id' => $albam->id, 'albumName' => $albam->gallery_name]) }}"  class="ssk ssk-facebook"></a>
            <a href="" data-url="{{ route('ashramGallery',['id' => $albam->id, 'albumName' => $albam->gallery_name]) }}" class="ssk ssk-google-plus"></a>
            <a href="" data-url="{{ route('ashramGallery',['id' => $albam->id, 'albumName' => $albam->gallery_name]) }}" class="ssk ssk-pinterest"></a>

        

            <div class = "shareLinkModal">
              <h3>Share Link</h3>
              <input type="text" value = "{{ route('ashramGallery',['id' => $albam->id, 'albumName' => $albam->gallery_name]) }}">
            </div>
          </div>




 <div class="album-details"> <img  style="object-fit:cover!important;" src="{{url('public/uploads/ashramGallery/'.$albam->gallery_thumb)}}" alt="image" />
        <div class="description">
          <span class="album_name"> {{$albam->gallery_name}}</span><br>
          <div id="myDIV" >
            <p class="album_description">{!! substr($albam->description, 0, 200) !!}<span id="dots">...</span><span id="more">{!! substr($albam->description, 201, 5000) !!} </span> <span onclick="myFunction()" id="myBtn">Read more</span></p>
           
          </div>

           <div class="share_link" id="share_link">
                      <a href="#ex1" rel="modal:open" id="LinkA"> <i class="fa fa-share"></i> </a>
            </div>


        </div>

      </div> --}}
        
        

          
        @foreach($galleryImagesByname as $value)
           

            <div class="vf-box" id="vf-box{{$value->id}}"  onmouseenter="mouseEnter('{{$value->id}}')" onmouseleave="mouseLeave('{{$value->id}}')">

                    <a class="fancybox-button" rel="fancybox-button" @if($image == 1) href="{{url('public/uploads/ashramGallery/'.$value->image_thumb)}}" @endif>
                        <img src="{{url('public/uploads/ashramGallery/thumb/'.$value->image_thumb)}}" alt="video" />
                    </a>

                
            </div>

        @endforeach
        <div class="clr"></div>
    </section>
@stop
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  
    ga('create', 'UA-82759526-1', 'auto');
    ga('send', 'pageview');


    function mouseEnter(id) {
      $('#vf-box'+id).find("#shareLink").css("display", "block");
    }
    
    function mouseLeave(id) {
      $('#vf-box'+id).find("#shareLink").css("display", "none");
    }
      
</script>


<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
  var myDIV = document.getElementById("myDIV");
  var shareLink = document.getElementById("myDIV");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
    myDIV.style.backgroundColor = "rgba(0, 0, 0, 0)";
    shareLink.style.backgroundColor = "rgba(0, 0, 0, 0)";
   

   
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
    myDIV.style.backgroundColor = "rgba(0, 0, 0, 0.4)";
    shareLink.style.backgroundColor = "rgba(0, 0, 0, 0)";
    
  }
}
</script>

