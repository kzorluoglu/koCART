  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">

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
				   <td><?php echo $result->customer_id; ?></td>
				   <td><?php echo $result->total; ?></td>
				   <td><a href="<?php echo base_url(); ?>admin/order/detail/<?php echo $result->order_id; ?>">Show & Edit</a></td>
		 </tr>
<?php } ?>


 
      </tbody>
    </table>
<p><?php echo $links; ?></p>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <? $this->load->view('admin/footer'); ?>