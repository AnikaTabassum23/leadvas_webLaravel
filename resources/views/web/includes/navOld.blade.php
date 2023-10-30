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
	    </style>

        <nav>
			<div class="logo"><a href="{{route('intro')}}"><img src="{{url('public/uploads/menu_logo/'.$data->menu_logo)}}" alt="logo" /></a></div>
			
			<ul class="navigation">
				<li @if($menu == 'demo') class="active" @endif> <a href="{{route('demo')}}" />Demo</a></li>
				<li @if($menu == 'narratives')class="active" @endif><a href="{{route('narratives')}}" />Narratives</a></li>
				<li @if($menu == 'commercials')class="active" @endif> <a href="{{route('commercials')}}" />Commercials</a></li>
				<li @if($menu == 'photography')class="active" @endif><a href="{{route('photography')}}" />Photography</a></li>
				<li @if($menu == 'viewFinder')class="active" @endif><a href="{{route('viewFinder')}}" />View Finder</a></li>

				{{-- <li @if($menu == 'sample')class="active" @endif> <a href="{{route('sample')}}" />Sample</a></li> --}}

				<li @if($menu == 'ashram')class="ashram active" @endif class="ashram"><a href="{{route('ashram')}}" />Ashram</a></li>
				
				<li @if($menu == 'about')class="about active" @endif class="about"><a href="{{route('about')}}" />About</a></li>
				<li @if($menu == 'contact')class="active" @endif><a href="{{route('contact')}}" />Contact</a></li>
			</ul>

			
		</nav>