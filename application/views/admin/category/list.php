  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Category List</small>
                        </h1>
						<a href="<?php echo base_url(); ?>admin/category/add" class="btn btn-primary btn-lg active" role="button">Add New</a>

  <table id="data-list" class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Rank</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
 <?php foreach($categories as $category){ ?>
 
 <tr>
 <td><?php echo $category->category_name; ?></td>
 <td><?php echo $category->rank; ?></td>
 <td><a href="<?php echo base_url(); ?>admin/category/detail/<?php echo $category->category_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
 <a href="<?php echo base_url(); ?>admin/category/delete/<?php echo $category->category_id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
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