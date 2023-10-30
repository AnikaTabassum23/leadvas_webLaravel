
<section class="contain">
    <div class="container" style="margin-top: 80px">
        <!--<div class="row text-center">
                <div class="col-md-12 wow fadeInUp" data-wow-delay="0.4s">
                        <h3 class="heading" style="font-size:32px;">Try for Free 30 days</h3>
                </div>
        </div> -->
        <div class="row">
            <div class="col-md-7 wow fadeInDown" data-wow-delay="0.4s">
                <div class="row">
                    <div class="" style="width: 100%; margin-bottom: 15px">
                        <div style="font-size: 16px;font-weight: 100">Questions? Call us at +88 01760242469 </div>
                    </div>
                    <div style="width: 100%;margin-bottom: 15px">
                        <div style="font-size: 24px;margin-bottom: 30px">LETS SEE HOW TO CHANGE YOUR COMPANY BY LEADVAS</div>
                        <!--<div>When you use Sales Cloud to manage contacts and sales activities, you’ll increase win rates by 43%, boost rep productivity by 44%, and get 37% increase in revenue.</div>-->
                    </div>
                    <div style="width:100%; margin-bottom: 15px">
                        <div  align="center">
                            <a href="#"><img alt="" style="width:50%;" src="<?php echo base_url('resource/img/device.png'); ?> "></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 wow fadeInDown" data-wow-delay="0.4s">
                <form id="user_login_form" action="<?php echo site_url('user/forgot_pass'); ?>" method="post" class="form-horizontal" data-toggle="validator">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div style="font-size:20px; font-weight:normal; color:#666;"> Forgot Password Form</div>
                        </div>
                        <div class="col-sm-12">
                            <div style="font-size: 14px;font-weight: 100"> Please fill out all fields.</div>
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
                                <input type="email" class="form-control" id="email" name="email" placeholder="Registered Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
