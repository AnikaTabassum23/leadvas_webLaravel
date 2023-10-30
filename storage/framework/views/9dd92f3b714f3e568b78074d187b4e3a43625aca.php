<?php $__env->startSection('title'); ?>
    Set password

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top: 40px">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
							<div class="contact-block">
                                <form id="setPasswordForm" method="post" class="form-horizontal register-form">
									<?php echo csrf_field(); ?>
                                    <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                    <div class="col-md-12">
                                        <label for="">Set a password:</label>
                                    </div>
                                    <div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input type="password" class="form-control" id="password" name="password" placeholder="Please enter password" required data-error="Please enter password">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>
                                    <div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password" required data-error="Please confirm password">
											</div>
											<div class="help-block with-errors"></div>
										</div>
									</div>
                                    <div class="form-group">
										<div class="col-sm-12">
											<div class="submit-button">
												<button type="submit" class="tg-btn">Save</button>
												<div id="msgSubmit" class="h3 text-center hidden"></div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
                                </form>
                            </div>

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    

    <script>
        $(document).ready(function(){


            $("#setPasswordForm").on("submit",function(event){
                event.preventDefault();

                let password = $("#password").val();
                let confirm_password = $("#confirm_password").val();
                if(password != confirm_password){
                    // alert("password don't match");
                    // return;
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter Same Password!',
                    // footer: '<a href="">Why do I have this issue?</a>'
                    })
                }

                let setPasswordData = $(this).serializeArray();
                // console.log(setPasswordData);
                $.ajax({
                    url:"<?php echo e(route('savePassword')); ?>",
                    type:"POST",
                    data:setPasswordData,
                    dataType:'json',
                    success:function(response){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Password Saved Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('input').val('');
                        window.location.href="<?php echo e(route('home')); ?>";

                    },
                    error:function(response){
                        console.log(response);
                    },
                });
            });


        })
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\DeMeraki\resources\views/web/userAccount/set_password.blade.php ENDPATH**/ ?>