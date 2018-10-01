 <?php $this->load->view('header'); ?>
    <!-- Page Content -->
<div class="container">
	 <div class="col-md-12">
 								<div class="col-xs-12">
									<h4><?php echo $this->lang->line('order_billing_detail'); ?></h4>
									<?php echo form_open('order/cargo'); ?>

									<div class="form-group">
									
	<!--  -->		<input type="text" <?php if($this->session->userdata('billing_first_name')){ ?> value="<?php echo $this->session->userdata('billing_first_name'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_firstname'); ?>" <?php } ?> name="billing_first_name" required="required" id="billing_first_name" class="form-control input-md" autocomplete="on" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_email')){ ?> value="<?php echo $this->session->userdata('billing_email'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_email'); ?>" <?php } ?> name="billing_email" id="billing_email" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_telephone')){ ?> value="<?php echo $this->session->userdata('billing_telephone'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_tel'); ?>" <?php } ?> name="billing_telephone" required="required"  id="billing_telephone" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_address1')){ ?> value="<?php echo $this->session->userdata('billing_address1'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_address'); ?>" <?php } ?> name="billing_address1" required="required"  id="billing_address1" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text"  <?php if($this->session->userdata('billing_address2')){ ?> value="<?php echo $this->session->userdata('billing_address2'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_address2'); ?>" <?php } ?> name="billing_address2" id="billing_address2" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_city')){ ?> value="<?php echo $this->session->userdata('billing_city'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_city'); ?>" <?php } ?> name="billing_city" id="billing_city" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_postcode')){ ?> value="<?php echo $this->session->userdata('billing_postcode'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_postcode'); ?>" <?php } ?> name="billing_postcode" required="required"  id="billing_postcode" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_country')){ ?> value="<?php echo $this->session->userdata('billing_country'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_country'); ?>" <?php } ?> name="billing_country" required="required"  id="billing_country" class="form-control input-md" tabindex="1">
									</div>	
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_region')){ ?> value="<?php echo $this->session->userdata('billing_region'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_region'); ?>" <?php } ?> name="billing_region" required="required"  id="billing_region" class="form-control input-md" tabindex="1">
									</div>	
									
 									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_company')){ ?> value="<?php echo $this->session->userdata('billing_company'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_company'); ?>" <?php } ?> name="billing_company" id="billing_company" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
										<input type="text" <?php if($this->session->userdata('billing_companyid')){ ?> value="<?php echo $this->session->userdata('billing_companyid'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_companyid'); ?>" <?php } ?> name="billing_companyid" required="required" id="billing_companyid" class="form-control input-md" tabindex="1">
									</div>										
										<hr>
		
 
									<div class="form-group">
											<input type="checkbox" id="billinganddelivery2" name="billinganddelivery"> <?php echo $this->lang->line('order_billing_cargo_same'); ?> 
									</div>
										<h4><?php echo $this->lang->line('order_cargo_detail'); ?></h4>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_first_name')){ ?> value="<?php echo $this->session->userdata('cargo_first_name'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_firstname'); ?>" <?php } ?> name="cargo_first_name" required="required"  id="cargo_first_name" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_email')){ ?> value="<?php echo $this->session->userdata('cargo_email'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_email'); ?>" <?php } ?> name="cargo_email" id="cargo_email" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_telephone')){ ?> value="<?php echo $this->session->userdata('cargo_telephone'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_tel'); ?>" <?php } ?> name="cargo_telephone" required="required"  id="cargo_telephone" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_address1')){ ?> value="<?php echo $this->session->userdata('cargo_address1'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_address'); ?>" <?php } ?> name="cargo_address1" required="required"  id="cargo_address1" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_address2')){ ?> value="<?php echo $this->session->userdata('cargo_address2'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_address2'); ?>" <?php } ?> name="cargo_address2" id="cargo_address2" class="form-control input-md"  tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_city')){ ?> value="<?php echo $this->session->userdata('cargo_city'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_city'); ?>" <?php } ?>name="cargo_city" id="cargo_city" required="required"  class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_postcode')){ ?> value="<?php echo $this->session->userdata('cargo_postcode'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_postcode'); ?>" <?php } ?> name="cargo_postcode" required="required"  id="cargo_postcode" class="form-control input-md" tabindex="1">
									</div>
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_country')){ ?> value="<?php echo $this->session->userdata('cargo_country'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_country'); ?>" <?php } ?> name="cargo_country" required="required"  id="cargo_country" class="form-control input-md" tabindex="1">
									</div>	
									<div class="form-group">
											<input type="text" <?php if($this->session->userdata('cargo_region')){ ?> value="<?php echo $this->session->userdata('cargo_region'); ?>" <?php }else{ ?>  placeholder="<?php echo $this->lang->line('order_billing_cargo_region'); ?>" <?php } ?> name="cargo_region" required="required"  id="cargo_region" class="form-control input-md" tabindex="1">
									</div>	 
								</div>
					

 
								<p class="text-right"><button type="submit" class="btn btn-primary">&raquo; Cargo</button></p>
</form>

  
             </div>
 
  </div>
    <!-- /.container -->
 <?php $this->load->view('footer'); ?>
   