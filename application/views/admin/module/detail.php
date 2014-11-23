  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">
 
            <div class="container-fluid">
 
                         <h1 class="page-header">
                            Dashboard <small>// Module Edit</small>
                        </h1>
    <table class="table table-striped">
        <thead>
        <tr>
          <th>Product Name</th>
          <th>Rank</th>
 
		  <th>Action</th>
        </tr>
      </thead>
      <tbody>
  <?php foreach($products as $product){ ?>
 		<form action="<?php echo $this->config->item('admin_url'); ?>module/detail" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				

         <tr>
		           <td><?php echo $product->name; ?></td>
				   <td><input name="id" type="hidden" value="<?php echo $product->mod_id; ?>"><input name="rank" value="<?php echo $product->mod_rank; ?>">      <button type="submit" class="btn btn-default">Update</button>
</td>
 
					<td> <a href="<?php echo base_url(); ?>admin/module/delete/<?php echo $product->mod_id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
		 </tr>
  </form>
  <? } ?>
        </tbody>
  </table>
 		<form action="<?php echo $this->config->item('admin_url'); ?>module/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
       <input name="product_id" id="tags"> <small><i>* Autocomplete</i></small>
	   <input name="type" type="hidden" value="<?php echo $type; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Rank</label>
    <div class="col-sm-10">
       <input name="rank">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add New</button>
    </div>
  </div>
  </form>
  
  <!-- AUTOCOMPLETE von jQuery UI -->
 <link href="<?php echo base_url();?>jquery-ui-1.11.2.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php echo base_url();?>jquery-ui-1.11.2.custom/jquery-ui.js"></script>
		  <script type="text/javascript">
				  $(function(){
					  $("#tags").autocomplete({
						source: "<?php echo $this->config->item('admin_url'); ?>module/get_product_name"  
					  });	
					});
		</script>

<!-- AUTOCOMPLETE von jQuery UI --> 
</head>
<body>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <? $this->load->view('admin/footer'); ?>