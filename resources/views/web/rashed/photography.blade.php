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



 .albub-box .share-button i.fa {
  display: inline-block;
  border-radius: 20px;
  box-shadow: 0px 0px 4px #fff;
  padding: 0.4em 0.4em;
  font-size: 12px;
 

}

.albam_name {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
  width: 95%;
  text-align: center;
}
.albam_name a{
  color: white;
  text-decoration: none;
}

.share-button {
  position: absolute;
  bottom: 8px;
  right: 16px;
  color: white;
  display: none;
}
.share-button a{
  color: white;


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


        @foreach ($imgRepo as $repository)
          <div id="ex1" class="modal shareSocialModal">
            <a href="" data-url="{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-twitter"></a>
            <a href="" data-url="{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-facebook"></a>
            <a href="" data-url="{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}" class="ssk ssk-pinterest"></a>

            <div class = "shareLinkModal">
              <h3>Share Link</h3>
              <input type="text" value = "{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}">
            </div>
          </div>
          <div class="albub-box" id="albub-box{{$repository->id}}"  onmouseenter="mouseEnter('{{$repository->id}}')" onmouseleave="mouseLeave('{{$repository->id}}')">
            
            <a class="" href="{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}">
                        {{--<img src="{{url('public/uploads/gallery/thumb/'.$repository->gallery_thumb)}}" alt="">--}}

                        <img src="{{url('public/uploads/gallery_coverphoto/thumb/'.$repository->gallery_thumb)}}" alt="">


               </a>
                <span class="albam_name" id="albam_name">
                    <a href="{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}"  >{{ $repository->gallery_name }}  
                    </a>
                 </span>    
                 <span class="share-button" id="share-button" >

                     <a href="#ex1" rel="modal:open" id="LinkA"> <i class="fa fa-share"></i> </a>
                  </span>

            
           

          </div>

          <!-- <div class="ed-course" id="edCourse{{$repository->id}}"  onmouseenter="mouseEnter('{{$repository->id}}')" onmouseleave="mouseLeave('{{$repository->id}}')">
              <div class="col-md-3 col-sm-4 col-xs-12 album-col-3">
                  <div class="album-compactbox" albumId="albumCompactbox-{{$repository->id}}">
                      
                    <a class="course-overlay" href="{{ route('gallery',['id' => $repository->id, 'albumName' => $repository->gallery_name]) }}">
                        <img src="{{url('public/uploads/photography/'.$repository->gallery_thumb)}}" alt="">
                    </a>
                      
                  </div>
                  <div class="album-title">
                      <a href="#"></a>
                  </div>     
              </div>
              
              <div class="shareLink" id="shareLink">
                <a href="#ex1" rel="modal:open" id="LinkA">{{ $repository->gallery_name }} <i class="fa fa-share"></i> </a>
              </div>
          </div> -->
        @endforeach

    
  </section>
@stop

@section('js')
  <script>
    function mouseEnter(id) {
      $('#albub-box'+id).find("#albam_name").css("display", "block");
      $('#albub-box'+id).find("#share-button").css("display", "block");
    }
    
    function mouseLeave(id) {
      $('#albub-box'+id).find("#albam_name").css("display", "none");
      $('#albub-box'+id).find("#share-button").css("display", "none");
    }
 

</script>

@endsection