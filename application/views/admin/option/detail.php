  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Value List</small>
                        </h1>

		<form action="<?php echo $this->config->item('admin_url'); ?>option/value_update/<?php echo $option_id; ?>" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
		<hr>
						 <p class="text-right"><a href="<?php echo $this->config->item('admin_url'); ?>option/add_new_value/<?php echo $option_id; ?>" class="btn btn-primary btn-lg active" role="button">Add New</a></p>

  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
 
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
 <?php $i = 0; foreach($values AS $value) { ?>
 		 <tr>
		 <td>
		 
		 <input type="hidden" class="form-control" name="option_value_row_id[]" value="<?php echo $value->option_value_row_id; ?>">
		 <input type="text" class="form-control" name="value_name[]" value="<?php echo $value->value_name; ?>"></td>
 
		   <td>
			<a href="<?php echo $this->config->item('admin_url'); ?>option/delete_value/<?php echo $value->option_value_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
		 
		 </td>

		 </tr>
 <?php $i++; } ?>
 <tr>
 <td colspan="4">
      <p align="right"><button type="submit" class="btn btn-default">Update</button></p>
	  </td>
</tr>
	  </form>
 
      </tbody>
    </table>


 

		 

 

   </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <?php $this->load->view('admin/footer'); ?>