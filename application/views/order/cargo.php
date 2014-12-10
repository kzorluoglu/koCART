 <?php $this->load->view('header'); ?>
<div class="container">
	 <div class="col-md-12">
	 <?php if($this->session->flashdata('error') != ""){ ?>
	 
	<p class="bg-danger"><?php echo $this->session->flashdata('error'); ?></p>

	 <? } ?>
	  <?php echo form_open('order/payment'); ?>

	 <?php foreach($cargos as $cargo){ ?>
	  <div class="checkbox">
    <label>
      <input type="radio" name="cargo" value="<?php echo $cargo->id; ?>"> <?php echo $cargo->name; ?> | <?php echo $cargo->price; ?> 
    </label>
  </div>
 
	 
	 <? } ?>
								<p class="text-right"><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('cargo_button'); ?></button></p>

	 </form>
 			  </div>
 
  </div>
  <?php $this->load->view('footer'); ?>