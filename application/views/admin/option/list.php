  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Options List</small>
                        </h1>
						 <p class="text-right"><a href="<?php echo $this->config->item('admin_url'); ?>option/add" class="btn btn-primary btn-lg active" role="button">Add New</a></p>

  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
 
          <th>Name</th>
          <th>Values For Languaes</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
   <?php foreach($options as $option){ ?>
 
 <tr>
 
 <td><?php echo $option->option_name; ?></td>
 
 <td> 		 <?php foreach($languages AS $language) { ?>
 
	<a href="<?php echo $this->config->item('admin_url'); ?>option/detail/<?php echo $option->id; ?>/<?php echo $language->id; ?>"><img src="<?php echo $language->flag; ?>"></a>
		 <?php } ?>
		 </td>
<td>
 <a href="<?php echo $this->config->item('admin_url'); ?>option/delete/<?php echo $option->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
 </td>

 </tr>
 <? } ?>
      </tbody>
    </table>
             </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



  <? $this->load->view('admin/footer'); ?>