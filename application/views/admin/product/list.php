  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Product List</small>
                        </h1>
						<a href="<?php echo base_url(); ?>admin/product/add" class="btn btn-primary btn-lg active" role="button">Add New</a>

  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Rank</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
 <?php foreach($products as $product){ ?>
 
 <tr>
 <td><?php echo $product->name; ?></td>
 <td><?php echo $product->rank; ?></td>
 <td><a href="<?php echo base_url(); ?>admin/product/detail/<?php echo $product->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
 <a href="<?php echo base_url(); ?>admin/product/delete/<?php echo $product->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
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