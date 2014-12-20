  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Module List</small>
                        </h1>
<table class="table table-bordered">
      <thead>
        <tr>
          <th>Module ID</th>
          <th>Name</th>
          <th>Details</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
	  <?php
foreach($results as $result) { ?> 
         <tr>
		           <td><?php echo $result->id; ?></td>
				   <td><?php echo $result->name; ?></td>
				   <td><?php echo $result->details; ?></td>
				   <td><a href="<?php echo $this->config->item('admin_url'); ?>module/detail/<?php echo $result->type; ?>"><span class="glyphicon glyphicon-pencil"></span></a> <span class="glyphicon glyphicon-remove"></span></td>
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