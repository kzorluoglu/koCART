  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Add Product Option</small>
                        </h1>
						
		<form action="<?php echo $this->config->item('admin_url'); ?>product_option/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
						
 
   <script type="text/javascript">
           $(document).ready(function(){
 
               
               $("#option_type").change(function(){
                     var opt_type=$("#option_type").val();
                     $.ajax({
                        type:"post",
                        url:"<?php echo $this->config->item('admin_url'); ?>product_option/get_options",
                        data:"option_type="+opt_type,
                        success:function(data){
                              $("#option_id").html(data);
                        }
                     });
               });
           });
      </script>

  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Option Type</label>
    <div class="col-sm-offset-2 col-sm-10">
	<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
     <select name="option_type" id="option_type" class="form-control">
          <option>-select option type-</option>
		  <?php foreach($options AS $opt_type){ ?>
			
				<option value="<?php echo $opt_type->option_type; ?>"> <?php echo $opt_type->option_type; ?></option>
				
		  <?php } ?>
           

        </select>

    </div>
  </div>
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Option Name</label>
    <div class="col-sm-offset-2 col-sm-10">
          <select name="option_id" id="option_id" class="form-control">
            <option>-select first option-</option>
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

 

  <? $this->load->view('admin/footer'); ?>