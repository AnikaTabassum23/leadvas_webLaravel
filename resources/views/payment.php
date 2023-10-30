<style type="text/css">
    .payment-summary>.form-horizontal.group-border .form-group, .form-inline.group-border .form-group {
        background-image: none !important;
        border-bottom: medium none;
        margin-bottom: 0;
        margin-left: -15px;
        margin-right: -15px;
        padding-bottom: 15px;
        padding-top: 15px;
    }
    .payment_img{
        padding: 3px 7px;
    }
</style>

<section class="contain">
	<div class="container" style="margin-top:35px">
		<div class="row">
			<div class="col-lg-8 wow fadeInDown animated" data-wow-delay="0.4s" style="border: 1px solid;">
				<div class="col-sm-12">
				  <div style="font-size:24px; font-weight:normal; color:#666; padding-bottom:19px;">Payment Summary</div>
				</div>
				<div class="col-sm-12">
				  	<?php echo $msg; ?>
				</div>
				<div class="row payment-summary" style="padding: 20px;">
				  <form action="#" class="form-horizontal"  method="post">
				      <div class="form-group">
				          <label class="col-lg-2 col-md-3 control-label">Currency</label>
				          <div class="col-lg-7 col-md-6">
				              <select name="currency" id="currency" class="form-control fancy-select" disabled="disabled">
				                  <option value="tk">BDT(৳)</option>
				              </select>
				          </div>
				      </div>
				      <div class="form-group">
				          <label class="col-lg-2 col-md-3 control-label">Amount</label>
				          <div class="col-lg-7 col-md-6">
				              <input name="amount" placeholder="Amount" class="form-control" value="<?php echo $package_price; ?>" readonly>
				          </div>
				      </div>
				      <!-- <div class="form-group">
				          <div class="col-lg-offset-2">
				              <button type="submit" class="btn btn-default ml15">Continue</button>
				          </div>
				      </div> -->
				  </form>
				</div>
				<div class="col-sm-12">
				  <div style="font-size:20px; font-weight:normal; color:#666;">Payment With</div>
				</div>
				<div class="row">
				  <div class="col-lg-12" style="padding-left:30px;">
				        <ul id="payment" style="list-style: outside none none;">
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/visa.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/master.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/q.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/dbbl.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/dm.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/islami.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/ba.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/mtb.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/imb.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li> <img src="<?php echo base_url('resource/payment/bbl.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/cbl.png'); ?>" alt=""> </li>
				            </label>
				            <label>
				                <li class="payment_img"> <img src="<?php echo base_url('resource/payment/bka.png'); ?>" alt=""> </li>
				            </label>
				        </ul>
				    </div>
				</div>
			</div>
			<div class="col-md-4 wow fadeInDown" data-wow-delay="0.4s" style="padding-right:0">
				<form id="payment_gw" name="payment_gw" method="POST" action="https://securepay.sslcommerz.com/gwprocess/v3/process.php">
					<div class="col-sm-12">
						<div style="font-size:30px; font-weight:normal; color:#666;"> Summary</div>
					</div>
					<div class="col-sm-12">
						<div class="summary">
							<input type="hidden" name="total_amount" value="<?php echo $package_price; ?>" />
                            <input type="hidden" name="store_id" value="leadvas001live" />
                            <input type="hidden" name="tran_id" value="<?php echo $tran_id; ?>" />
                            <input type="hidden" name="success_url" value="<?php echo site_url('payment/notify'); ?>">
                            <input type="hidden" name="fail_url" value="<?php echo site_url('payment/failed?user='.$user_data->id); ?>">
                            <input type="hidden" name="cancel_url" value="<?php echo site_url('payment/cancel?user='.$user_data->id); ?>">
                            <!-- Customer Information !-->
                            <input type="hidden" name="cus_name" value="<?php echo $user_data->name; ?>">
                            <input type="hidden" name="cus_email" value="<?php echo $user_data->email; ?>">
                            <input type="hidden" name="cus_phone" value="<?php echo $user_data->mobile; ?>">
                            <input type="hidden" name="version" value="3.00" />
                            <!-- OPTIONAL SHOPPING CART LIST !-->
                            <!-- PRODUCT 1 !-->
                            <input type="hidden" name="cart[0][product]" value="Subscription charge for LeadVas" />
                            <input type="hidden" name="cart[0][amount]" value="<?php echo $package_price; ?>" />
							<div> Users : <?php echo $user_data->package_user; ?> </div>
							<div> Duration : <?php echo $user_data->package_duration; ?>  Month</div>
							<div style="margin:30px 0 10px; font-size:36px;"> Tk : <?php echo $package_price; ?></div>
						</div>
					</div>
					<div class="col-sm-12">
						<button type="submit" id="make_confirm" class="btn btn-success btn-block">Payment now</button>
					</div>
					<div class="col-sm-12">
						<div style="font-size:14px; font-weight:normal; color:#666; margin: 5px 0"> Need help with Pricing? <span style="font-weight:100;"> Call +88 01760242469</span></div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</section>
<?php $this->load->view('include/features'); ?>