 <?php $this->load->view('header'); ?>
<div class="container">
	 <div class="col-md-12">
	 	 <?php if($this->session->flashdata('error') != ""){ ?>
	 
	<p class="bg-danger"><?php echo $this->session->flashdata('error'); ?></p>

	 <? } ?>
	  <?php echo form_open('order/complete'); ?>

			<ul>
				<?php foreach($payments as $payment) { ?>
				   	        <li> <input id="payment" type="checkbox" value="<?php echo $payment->loadpage; ?>"><?php echo $payment->name; ?></li>
				<?php } ?>
				</ul>
				<div id="payment_details">
				</div>
								<p class="text-right"><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('payment_button'); ?></button></p>

	 </form>
 			  </div>
 
  </div>
  <?php $this->load->view('footer'); ?>



 