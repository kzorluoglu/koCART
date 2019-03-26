  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Add Currency</small>
                        </h1>
						
		<form action="<?php echo $this->config->item('admin_url'); ?>currency/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
		 
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Name</label>
    <div class="col-sm-10">
      <input name="name" type="text" value="" class="form-control" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Symbol</label>
    <div class="col-sm-10">
      <input name="symbol" type="text" value="" class="form-control" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Code</label>
    <div class="col-sm-10">
      <input name="code" type="text" value="" class="form-control" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Currency Value</label>
    <div class="col-sm-10">
      <input name="currency" type="text" value="" class="form-control" >
    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Parent Category</label>
    <div class="col-sm-offset-2 col-sm-10">
		<select name="standart" class="form-control">
  							<option value="0">No</option>
							<option value="1">Yes</option>
					</select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add New</button>
    </div>
  </div>
</form>

 
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <?php $this->load->view('admin/footer'); ?>