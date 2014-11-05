  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>Category List</small>
                        </h1>
<table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Rank</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
 <?php echo $categories ?>
      </tbody>
    </table>
<p><?php echo $links; ?></p>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <? $this->load->view('admin/footer'); ?>