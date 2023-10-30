@extends('web.layouts.default')
@section('css')

<style>
  .albub-box {
     position: relative;
    /*overflow: hidden;*/
    float: left;
    cursor: pointer;
    margin-top: 5px;
    margin-left: 5px;
    /*z-index: -1!important;*/
      height: 225px!important;
      width: 19.50%!important;
      -webkit-transform-style: preserve-3d!important;
      overflow: hidden!important;
  

}
.albub-box img {
   /*z-index: -1!important;*/
/*  top:50%!important;
  left:50%!important;*/
  height:100%!important;
  width:100%;
  min-width:100%!important;
  min-height:100%;
  /*transform:translate(-50%, -50%);*/
        object-fit:cover!important;
        opacity: .6;
}

.albub-box img:hover {
  opacity: 1;
}

.albub-box .album_caption{
   position: absolute;
      width: 100%;
      height: 100px;
      bottom: 0px;
      left: 0px;
      /*color: #ffffff;*/
      /*background: green;*/
      text-align:center;
      font-weight:bold;
      /*opacity:0.7;*/
      /*display: none;*/
      line-height: 2;
      display: none;

  }
  .album_caption a{
    color: #ffffff;


  }

.albub-box .share_link{
   position: absolute;
      width: 100%;
      height: 32px;
      bottom: 0px;
      left: -46px;
      /*color: #ffffff;*/
      /*background: green;*/
      text-align:center;
      font-weight:bold;
      /*opacity:0.7;*/
      /*display: none;*/
      margin-left: 133px;
      cursor: pointer;
      display: none;
      font-weight: 900;


  }
  .share_link a{
    color: #ffffff;


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
   .albub-box{
      height: 250px!important;
      width: 100%!important;
    }
}
@media only screen and (max-width: 768px) {
   .albub-box{
      height: 250px!important;
      width: 100%!important;
    }
}


</style>
@stop
@section('content')
  <section>
    <div class="container com-sp pad-bot-70">
      <div class="row folder-main" id="folderMain">




    @foreach ($imgRepo as $repository)
    <!-- Start Social Share Modal -->
          <div id="ex1" class="modal shareSocialModal">
            <a href="" data-url="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-twitter"></a>
            <a href="" data-url="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-facebook"></a>
            <a href="" data-url="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-google-plus"></a>
            <a href="" data-url="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-pinterest"></a>

            <div class = "shareLinkModal">
              <h3>Share Link</h3>
              <input type="text" value = "{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}">
            </div>
          </div>
    <!-- End Social Share Modal -->

          <!-- <div class="ed-course" id="edCourse{{$repository->id}}"  onmouseenter="mouseEnter('{{$repository->id}}')" onmouseleave="mouseLeave('{{$repository->id}}')">
              <div class="col-md-3 col-sm-4 col-xs-12 album-col-3">
                  <div class="album-compactbox" albumId="albumCompactbox-{{$repository->id}}">
                      
                    <a class="course-overlay" href="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}">
                          <img src="{{url('public/uploads/ashram/'.$repository->gallery_thumb)}}" alt="">
                      </a>
                      
                  </div>
                  <div class="album-title">
                      <a href="#">{{ $repository->gallery_name }}</a>
                  </div>     
              </div>
              <div class="shareLink" id="shareLink">
                <a href="#ex1" rel="modal:open" id="LinkA" clickedUrl="{{route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name])}}"><i class="fa fa-share-alt"></i> Share</a>
              </div>
          </div> -->

          <div class="albub-box" id="albub-box{{$repository->id}}"  onmouseenter="mouseEnter('{{$repository->id}}')" onmouseleave="mouseLeave('{{$repository->id}}')">
            
              <a class="" href="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}">
                        <img src="{{url('public/uploads/ashramGallery/'.$repository->gallery_thumb)}}" alt="">
              </a>

                <div class="album_caption" id="album_caption">
                    <a href="{{ route('ashramGallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}"  >{{ $repository->gallery_name }}  
                    </a>
                 </div>    
                 <div class="share_link" id="share_link">
                      <a href="#ex1" rel="modal:open" id="LinkA"> <i class="fa fa-share"></i> </a>
                  </div>

              </div>  


          </div>
        @endforeach

      </div>
    </div>
  </section>
@stop
@section('js')
  <script>
    function mouseEnter(id) {
      $('#albub-box'+id).find("#album_caption").css("display", "block");
      $('#albub-box'+id).find("#share_link").css("display", "block");
    }
    
    function mouseLeave(id) {
      $('#albub-box'+id).find("#album_caption").css("display", "none");
      $('#albub-box'+id).find("#share_link").css("display", "none");
    }
  </script>

@endsection