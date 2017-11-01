  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Currency List</small>					

                        </h1>
 <p class="text-right"><a href="<?php echo base_url(); ?>admin/currency/add" class="btn btn-primary btn-lg active" role="button">Add New</a></p>
  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
		  <th>Symbol</th>
		  <th>Value</th>
           <th>Action</th>
        </tr>
      </thead>
      <tbody>
 <?php foreach($currencys as $currency){ ?>
 
 <tr>
 <td><?php echo $currency->name; ?></td>
  <td><?php echo $currency->symbol; ?></td>

 <td><?php echo $currency->currency; ?></td>
  <td><a href="<?php echo $this->config->item('admin_url'); ?>currency/detail/<?php echo $currency->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
 <a href="<?php echo $this->config->item('admin_url'); ?>currency/delete/<?php echo $currency->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
 </td>

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