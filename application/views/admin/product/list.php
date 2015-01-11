  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Product List</small>					

                        </h1>
 <p class="text-right"><a href="<?php echo base_url(); ?>admin/product/add" class="btn btn-primary btn-lg active" role="button">Add New</a></p>
  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
          <th>Image</th>
		  <th>Name</th>
          <th>Rank</th>
		  <th>Options</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
 <?php foreach($products as $product){ ?>
 
 <tr>
 <td><img src="<?php echo $product->image; ?>" width="75" height="75"></td>
 <td><?php echo $product->name; ?></td>
 <td><?php echo $product->rank; ?></td>
 <td><a href="<?php echo $this->config->item('admin_url'); ?>product_option/lists/<?php echo $product->id; ?>">Options</a>
</td>

 <td><a href="<?php echo $this->config->item('admin_url'); ?>product/detail/<?php echo $product->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
 <a href="<?php echo $this->config->item('admin_url'); ?>product/delete/<?php echo $product->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
 </td>

 </tr>
 <? } ?>
      </tbody>
    </table>
<p><?php echo $links; ?></p>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <? $this->load->view('admin/footer'); ?>