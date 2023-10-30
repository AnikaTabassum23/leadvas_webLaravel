<section class="contain">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-7 wow fadeInDown" data-wow-delay="0.4s">
				<div class="trial-demo">
					<div class="leadvas-contact">Questions? Call us at +88 01760242469 </div>
				</div>
				<div class="leadvas-dialogue">
					<div class="dialogue">LETS SEE HOW TO CHANGE YOUR COMPANY BY LEADVAS</div>
				</div>
				<div class="device_img">
					<div  align="center">
						<a href="#"><img alt="" style="width:70%;" src="<?php echo base_url('resource/img/device.png'); ?> "></a>
					</div>
				</div>
            </div>
            <div class="col-md-5 wow fadeInDown" data-wow-delay="0.4s">
                <form id="user_login_form" action="<?php echo site_url('user/login'); ?>" method="post" class="form-horizontal leadvas-form" data-toggle="validator">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="title"> Login to Leadvas</div>
                        </div>
                        <div class="col-sm-12">
                            <div class="note"> Please fill out all fields.</div>
                        </div>
                    </div>
                    <?php 
                        $message = $this->session->flashdata('message');
                        if(!empty($message)) {
                            echo $message;
                        }
                    ?>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-default btn-block">Login</button>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <a href="<?php echo site_url('forgot-pass'); ?>"> Forgot your password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
