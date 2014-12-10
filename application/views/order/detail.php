 <?php $this->load->view('header'); ?>
    <!-- Page Content -->
<div class="container">
	 <div class="col-md-12">
 								<div class="col-xs-12">
									<h4>Order Billing Detail </h4>
									<?php echo form_open('order/cargo'); ?>

									<div class="form-group">
									
	<!--  -->		<input type="text" <?php if($this->session->userdata('billing_first_name')){ ?> value="<?php echo $this->session->userdata('billing_first_name'); ?>" <? }else{ ?>  placeholder="First and Last Name" <? } ?> name="billing_first_name" required="required" id="billing_first_name" class="form-control input-md" autocomplete="on" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_email')){ ?> value="<?php echo $this->session->userdata('billing_email'); ?>" <? }else{ ?>  placeholder="E-Mail" <? } ?> name="billing_email" id="billing_email" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_telephone')){ ?> value="<?php echo $this->session->userdata('billing_telephone'); ?>" <? }else{ ?>  placeholder="Telephone" <? } ?> name="billing_telephone" required="required"  id="billing_telephone" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_address1')){ ?> value="<?php echo $this->session->userdata('billing_address1'); ?>" <? }else{ ?>  placeholder="Address 1" <? } ?> name="billing_address1" required="required"  id="billing_address1" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text"  <?php if($this->session->userdata('billing_address2')){ ?> value="<?php echo $this->session->userdata('billing_address2'); ?>" <? }else{ ?>  placeholder="Address 2" <? } ?> name="billing_address2" id="billing_address2" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_city')){ ?> value="<?php echo $this->session->userdata('billing_city'); ?>" <? }else{ ?>  placeholder="City" <? } ?> name="billing_city" id="billing_city" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_postcode')){ ?> value="<?php echo $this->session->userdata('billing_postcode'); ?>" <? }else{ ?>  placeholder="Post Code" <? } ?> name="billing_postcode" required="required"  id="billing_postcode" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_country')){ ?> value="<?php echo $this->session->userdata('billing_country'); ?>" <? }else{ ?>  placeholder="Country" <? } ?> name="billing_country" required="required"  id="billing_country" class="form-control input-md" tabindex="1">
									</div>	
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_region')){ ?> value="<?php echo $this->session->userdata('billing_region'); ?>" <? }else{ ?>  placeholder="Region / State" <? } ?> name="billing_region" required="required"  id="billing_region" class="form-control input-md" tabindex="1">
									</div>	
									
									<abbr title="Company details..">Personal / Company Tax ID</abbr><br /><br />
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_company')){ ?> value="<?php echo $this->session->userdata('billing_company'); ?>" <? }else{ ?>  placeholder="Company Name" <? } ?> name="billing_company" required="required" id="billing_company" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_companyid')){ ?> value="<?php echo $this->session->userdata('billing_companyid'); ?>" <? }else{ ?>  placeholder="Company ID" <? } ?> name="billing_companyid" required="required" id="billing_companyid" class="form-control input-md" tabindex="1">
									</div>										
										<hr>
		
 
									<div class="form-group">
											<input type="checkbox" id="billinganddelivery2" name="billinganddelivery"> My delivery and billing addresses are the same. 
									</div>
										<h4>Cargo Detail</h4>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_first_name')){ ?> value="<?php echo $this->session->userdata('cargo_first_name'); ?>" <? }else{ ?>  placeholder="First Name" <? } ?> name="cargo_first_name" required="required"  id="cargo_first_name" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_email')){ ?> value="<?php echo $this->session->userdata('cargo_email'); ?>" <? }else{ ?>  placeholder="E-mail" <? } ?> name="cargo_email" id="cargo_email" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_telephone')){ ?> value="<?php echo $this->session->userdata('cargo_telephone'); ?>" <? }else{ ?>  placeholder="Telephone" <? } ?> name="cargo_telephone" required="required"  id="cargo_telephone" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_address1')){ ?> value="<?php echo $this->session->userdata('cargo_address1'); ?>" <? }else{ ?>  placeholder="Address 1" <? } ?> name="cargo_address1" required="required"  id="cargo_address1" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_address2')){ ?> value="<?php echo $this->session->userdata('cargo_address2'); ?>" <? }else{ ?>  placeholder="Address 2" <? } ?> name="cargo_address2" id="cargo_address2" class="form-control input-md"  tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_city')){ ?> value="<?php echo $this->session->userdata('cargo_city'); ?>" <? }else{ ?>  placeholder="City" <? } ?>name="cargo_city" id="cargo_city" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_postcode')){ ?> value="<?php echo $this->session->userdata('cargo_postcode'); ?>" <? }else{ ?>  placeholder="Post Code" <? } ?> name="cargo_postcode" required="required"  id="cargo_postcode" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_country')){ ?> value="<?php echo $this->session->userdata('cargo_country'); ?>" <? }else{ ?>  placeholder="Country" <? } ?> name="cargo_country" required="required"  id="cargo_country" class="form-control input-md" tabindex="1">
									</div>	
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_region')){ ?> value="<?php echo $this->session->userdata('cargo_region'); ?>" <? }else{ ?>  placeholder="Region / State" <? } ?> name="cargo_region" required="required"  id="cargo_region" class="form-control input-md" tabindex="1">
									</div>	 
								</div>
					

 
								<p class="text-right"><button type="submit" class="btn btn-primary">&raquo; Cargo</button></p>
</form>

  
             </div>
 
  </div>
    <!-- /.container -->
 <?php $this->load->view('footer'); ?>
   