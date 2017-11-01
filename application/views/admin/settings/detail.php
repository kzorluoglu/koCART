  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Edit Product</small>
                        </h1>

		<form action="<?php echo $this->config->item('admin_url'); ?>settings/detail/<?php echo $id; ?>" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
 
 
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Site Title</label>
    <div class="col-sm-10">
      <input name="title" type="text" value="<?php echo $title; ?>"  class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Site Description</label>
    <div class="col-sm-10">
      <input name="description" type="text" value="<?php echo $description; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Meta Tags</label>
    <div class="col-sm-10">
      <input name="meta_tags" type="text" value="<?php echo $meta_tags; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
    <div class="col-sm-10">
      <input name="name" type="text" value="<?php echo $name; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Company Owner</label>
    <div class="col-sm-10">
      <input name="owner" type="text" value="<?php echo $owner; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Company Address</label>
    <div class="col-sm-10">
      <input name="address" type="text" value="<?php echo $address; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-10">
      <input name="email" type="text" value="<?php echo $email; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Telefon</label>
    <div class="col-sm-10">
      <input name="telefon" type="text" value="<?php echo $telefon; ?>" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
 <script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('/kcfinder/browse.php?type=files&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
 		<img src="<?php echo $logo; ?>" width="250">
			<input type="text" class="form-control" name="logo"  value="<?php echo $logo; ?>"  readonly="readonly" onclick="openKCFinder(this)"
    value="Click here and select a file double clicking on it" style="width:600px;cursor:pointer" />
	</div>
  </div>
 
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Default Language</label>
    <div class="col-sm-offset-2 col-sm-10">
		<select name="language" class="form-control">
 
		<option value="<?php echo $language; ?>"><?php echo $language_name; ?> </option>
 
				<option value=""></option>
 			<?php foreach($languages as $lang){ ?>
				<option value="<?php echo $lang->id; ?>"><?php echo $lang->language_name; ?> </option>
			<?php } ?>
		</select>
    </div>
  </div>	
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Default Currency</label>
    <div class="col-sm-offset-2 col-sm-10">
		<select name="currency" class="form-control">
 
		<option value="<?php echo $currency; ?>"><?php echo $currency_name; ?> </option>
 
				<option value=""></option>
 			<?php foreach($currencys as $cur){ ?>
				<option value="<?php echo $cur->id; ?>"><?php echo $cur->name; ?> </option>
			<?php } ?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>

 
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <?php $this->load->view('admin/footer'); ?>