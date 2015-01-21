  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Value List</small>
                        </h1>

		<form action="<?php echo $this->config->item('admin_url'); ?>product_option/value_update/<?php echo $option_id; ?>/<?php echo $product_id; ?>" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
		<hr>
 
  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Operation</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

  <?php foreach($values as $value){ ?>
 
 <tr>
 <td><?php echo $value->value_name; ?></td>
 <td>
 <input type="hidden" class="form-control" value="<?php echo $value->pr_value_id; ?>" name="pr_value_id[]">
 		<select name="operation[]" class="form-control">
		<option value="<?php echo $value->operation; ?>"><?php echo $value->operation; ?></option>
		<option value="+">+</option>
		<option value="-">-</option>
		</select>
</td>
  <td><input type="text" class="form-control" value="<?php echo $value->price; ?>" name="price[]"></td>
 <td>
	<a href="<?php echo $this->config->item('admin_url'); ?>product_option/delete_value/<?php echo $value->pr_value_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
 </td>

 </tr>
 <? } ?>
 <tr>
 <td colspan="4">
      <p align="right"><button type="submit" class="btn btn-default">Update</button></p>
	  </td>
</tr>
	  </form>
	  
		<form action="<?php echo $this->config->item('admin_url'); ?>product_option/add_value/<?php echo $option_id; ?>/<?php echo $product_id; ?>" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				

 <tr>
 <td>
		<select name="value_id" class="form-control">
		<option value=""></option>
  <?php foreach($value_list AS $values){ ?>
		<option value="<?php echo $values->option_value_id; ?>"><?php echo $values->value_name; ?></option>
		
		<?php } ?>
 		</select>
 <input type="hidden" name="option_id" value="<?php echo $option_id; ?>">
  <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

 
 </td>
 <td>
		<select  name="operation" class="form-control">
 
		<option value="+">+</option>
		<option value="-">-</option>
		</select>
</td>
  <td><input type="text" class="form-control" value="" name="price"></td>
 <td>
      <p align="right"><button type="submit" class="btn btn-primary">Add New</button></p>

 </td>

 </tr>
  </form>
      </tbody>
    </table>


 

		 

 

   </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <? $this->load->view('admin/footer'); ?>