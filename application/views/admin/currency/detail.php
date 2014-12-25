  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Edit Currency</small>
                        </h1>
  <?php foreach($currencys as $currency){ ?>

		<form action="<?php echo $this->config->item('admin_url'); ?>currency/update/<?php echo $currency->id; ?>" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
 		 
  
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Name</label>
    <div class="col-sm-10">
      <input name="name" type="text" value="<?php echo $currency->name; ?>" class="form-control" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Symbol</label>
    <div class="col-sm-10">
      <input name="symbol" type="text" value="<?php echo $currency->symbol; ?>" class="form-control" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Code</label>
    <div class="col-sm-10">
      <input name="code" type="text" value="<?php echo $currency->code; ?>" class="form-control" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Value</label>
    <div class="col-sm-10">
      <input name="currency" type="text" value="<?php echo $currency->currency; ?>" class="form-control" >
    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Standart</label>
    <div class="col-sm-offset-2 col-sm-10">
		<select name="standart" class="form-control">
			   <?php if($currency->standart == 1){  ?>
 							<option value="1">Yes</option>
							<option value="0">No</option>
					<?php } else{  ?>
 							<option value="0">No</option>
							<option value="1">Yes</option>
					<?php } ?>

					</select>
    </div>
  </div>

 
  <?php } ?>
  
  						 
  


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>

 
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <? $this->load->view('admin/footer'); ?>