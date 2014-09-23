 <?php $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">

  <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Billing Details</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Cargo Details</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Delivery Details</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p>Payment Method</p>
        </div>
    </div>
</div>
 
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
 
 


 <?php  $attributes = array('id' => 'orderform'); echo form_open('order/detail', $attributes); ?>

   
   <div class="col-xs-6">
   <h4>Order Detail Form </h4>
   <div class="form-group">
                        <input type="text" required="required" name="billing_first_name" id="billing_first_name" class="form-control input-md" autocomplete="on" placeholder="First and Last Name" tabindex="1">
	</div>
	   <div class="form-group">
                        <input type="text" required="required" name="billing_email" id="billing_email" class="form-control input-md" placeholder="E-mail" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="billing_telephone" id="billing_telephone" class="form-control input-md" placeholder="Telephone" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="billing_address1" id="billing_address1" class="form-control input-md" placeholder="Address 1" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text"  name="billing_address2" id="billing_address2" class="form-control input-md" placeholder="Address 2" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="billing_city" id="billing_city" class="form-control input-md" placeholder="City" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="billing_postcode" id="billing_postcode" class="form-control input-md" placeholder="Post Code" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="billing_country" id="billing_country" class="form-control input-md" placeholder="Country" tabindex="1">
					</div>	
	   <div class="form-group">
                        <input type="text" required="required" name="billing_region" id="billing_region" class="form-control input-md" placeholder="Region / State" tabindex="1">
					</div>	
					</div>
					
					 <div class="col-xs-6">
					<h4>Company Detail</h4>
	   <div class="form-group">
                        <input type="text" name="billing_company" id="billing_company" class="form-control input-md" placeholder="Company" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" name="billing_companyid" id="billing_companyid" class="form-control input-md" placeholder="Company ID" tabindex="1">
					</div>
 
					</div>

          
 
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
   <div class="col-xs-6">
   	   <div class="form-group">
                        <input type="checkbox" required="required" id="billinganddelivery2" name="billinganddelivery"> My delivery and billing addresses are the same. 
					</div>
   <h4>Cargo Detail</h4>
   <div class="form-group">
                        <input type="text" required="required" name="cargo_first_name" id="cargo_first_name" class="form-control input-md" placeholder="First Name" tabindex="1">
	</div>
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_email" id="cargo_email" class="form-control input-md" placeholder="E-mail" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_telephone" id="cargo_telephone" class="form-control input-md" placeholder="Telephone" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_address1" id="cargo_address1" class="form-control input-md" placeholder="Address 1" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" name="cargo_address2" id="cargo_address2" class="form-control input-md" placeholder="Address 2" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_city" id="cargo_city" class="form-control input-md" placeholder="City" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_postcode" id="cargo_postcode" class="form-control input-md" placeholder="Post Code" tabindex="1">
					</div>
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_country" id="cargo_country" class="form-control input-md" placeholder="Country" tabindex="1">
					</div>	
	   <div class="form-group">
                        <input type="text" required="required" name="cargo_region" id="cargo_region" class="form-control input-md" placeholder="Region / State" tabindex="1">
					</div>	
					</div>
					                
        </div>
		<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
    </div>
	    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
 <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
 
            </div>
        </div>
    </div>
	
    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
				<ul>
				<?php foreach($payments as $payment) { ?>
				   	        <li> <input id="payment" type="checkbox" value="<?php echo $payment->loadpage; ?>"><?php echo $payment->name; ?></li>
				<?php } ?>
				</ul>
				<div id="payment_details">
				</div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
				 <?php echo form_close(); ?>
 
            </div>
        </div>
    </div>
 

       

    </div>
    <!-- /.container -->
 <?php $this->load->view('footer'); ?>
   