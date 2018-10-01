  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Options List</small>
                        </h1>
						 <p class="text-right"><a href="<?php echo $this->config->item('admin_url'); ?>product_option/add/<?php echo $product_id; ?>" class="btn btn-primary btn-lg active" role="button">Add New</a></p>

  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
 
          <th>Name</th>
          <th>Rank</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

  <?php foreach($options as $option){ ?>
 
 <tr>
 
 <td><?php echo $option->option_name; ?></td>
 <td><?php echo $option->rank; ?></td>
 <td><a href="<?php echo $this->config->item('admin_url'); ?>product_option/detail/<?php echo $option->id; ?>/<?php echo $option->product_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
 <a href="<?php echo $this->config->item('admin_url'); ?>product_option/delete/<?php echo $option->pr_opt_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
 </td>

 </tr>
 <?php } ?>
      </tbody>
    </table>
             </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <?php $this->load->view('admin/footer'); ?>