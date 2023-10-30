@extends('web.layouts.master')



@push('css')
    <style>
        .form-horizontal .form-group {
            margin-right: 0px!important;
            margin-left: 0px!important;
        }
        .form-group {
            margin: 0 0 5px!important;
        }

        .contact-block .title {
            font-size: 40px;
            font-weight: normal;
            color: #666;
            align-content: center;
        }
        .contact-block .note {
            font-size: 14px;
            font-weight: 100;
            margin-bottom: 10px
        }

    </style>


@endpush


@section('body')
    <!--************************************
				Inner Page Banner Start
		*************************************-->
		<div class="tg-innerpagebanner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="tg-breadcrumb">
							<li><a href="{!! route('home') !!}">Home</a></li>
							<li class="tg-active">My Account</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Page Banner End
		*************************************-->
        {{-- user Account start --}}

<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout tg-paddingzero">

			<section id="services" class="section pt-5 pb-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-xs-12">

								<!-- <h2>Online Tailoring</h2> -->
								<div class="contact-address">
									<!-- <p>LETS CHANGE YOUR                LIFE STYLE</p> -->
									<a href="#"><img alt="" style="width:85%;margin-top: -25px" src="{!! asset('public/frontend/images/signup.png') !!}"></a>
								</div>


						</div>
						<div class="col-lg-6 col-sm-6 col-xs-12">
							<div class="contact-block">
								<div class="form-group">
									<div class="col-sm-12">
										<!-- <div class="title">Enjoy the online tailoring</div> -->
										<h2>Enjoy the online tailoring</h2>
									</div>
									<div class="col-sm-12">
										<div class="note"> Please fill out all fields.</div>
									</div>
								</div>
								<form id="registerForm" method="post" class="form-horizontal register-form">
									@csrf
									<div id="errorMsgDiv">
										<div id="responseMsg">

										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
												<input type="email" class="form-control" id="email" name="email" placeholder="Work Email" required data-error="Please enter your email">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input type="number" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" required data-error="Please enter your Phone Number">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<div class="submit-button">
												<button type="submit" class="tg-btn">signup</button>
												<div id="msgSubmit" class="h3 text-center hidden"></div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									<div style="font-size:12px;">*I agree to the demeraki <a href=#>Terms and Conditions</a> and <a  href=#>Privacy Policy.</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>



        </main>
		<!--************************************
				Main End
		*************************************-->
        {{-- user Account end --}}

@endsection



@push('js')
<script>
	$(document).ready(function () {
		$("#registerForm").on("submit", function (event) {
			event.preventDefault();
				let postData = $(this).serializeArray();

				$.ajax({
					url : "{{ route('user_accountAction') }}",
					type: "POST",
					data: postData,
					dataType: 'json',
					success:function(response){
						var status = parseInt(response.status);
						var message = parseInt(response.message);
                        // console.log(status);
						if(response.status ==1) {
                            // $('#responseMsg').html('<div class="alert alert-success fade show"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="fa fa-adjust alert-icon"></i> '+response.message+'</div>');
							// setTimeout(function() {$('#errorMsgDiv').hide()}, 3000);

							$('input').val('');
                            window.location.href="{{ route('emailMessage') }}";
						} else if(status==0) {
							$('#responseMsg').html('<div class="alert alert-danger fade show"><button type="button" id="close_icon" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="fa fa-adjust alert-icon"></i> '+response.message+'</div>');
							$('#responseMsg').on('click', '#close_icon', function() {
								$('#email').val('');
							})
						}
					}
				});

		});

		$('#total_user, #mobile').keypress(function (event) {
			var keycode = event.which;
			if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
				event.preventDefault();
			}
    	});



        // $("#registerForm").on("submit", function (event) {
        //     event.preventDefault();
        //     var name = $("#name").val();
        //     var email = $("#email").val();
        //     var mobile = $("#mobile").val();
        //     console.log(name);
        //     console.log(email);
        //     console.log(mobile);
        //     $.ajax({

        //         url: "{{route('user_accountAction')}}",
        //         type: "POST",
        //         data: {
        //             name: name,
        //             email: email,
        //             mobile: mobile,
        //             "_token": "{{ csrf_token() }}",
        //         },
        //         dataType: 'json',
        //         success: function (data) {
        //             var status = parseInt(data.status);
        //             // if (status === 1) {
        //             //     $('#responseMsg').html('<div class="alert alert-success fade show"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="fa fa-adjust alert-icon"></i> ' + data.message + '</div>');
        //             //     $('input').val('');
        //             // } else if (status === 0) {
        //             //     $('#responseMsg').html('<div class="alert alert-danger fade show"><button type="button" id="close_icon" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="fa fa-adjust alert-icon"></i> ' + data.message + '</div>');
        //             //     $('#responseMsg').on('click', '#close_icon', function () {
        //             //         $('#email').val('');
        //             //     })
        //             // }
        //         },
        //         error: function (xhr, status, error) {
        //             // Handle error
        //             console.error(error);
        //         }
        //     });
        // });



	})

</script>
@endpush
