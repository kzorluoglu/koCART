  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Orders List</small>
                        </h1>
<table class="table table-bordered">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Name</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
	  <?php
foreach($results as $result) { ?> 
         <tr>
		           <td><?php echo $result->order_id; ?></td>
				   <td><?php if($result->customer_id == 0){ ?> Visitor <?php } else { ?> <?php echo $result->customer_id; ?> <?php } ?></td>
				   <td><?php echo $result->total; ?></td>
				   <td><a href="<?php echo $this->config->item('admin_url'); ?>order/detail/<?php echo $result->order_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a> <span class="glyphicon glyphicon-remove"></span></td>
		 </tr>
<?php } ?>


 
      </tbody>
    </table>
<p><?php echo $links; ?></p>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <?php $this->load->view('admin/footer'); ?>