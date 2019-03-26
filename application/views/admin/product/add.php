  <?php $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
                        <h1 class="page-header">
                            Dashboard <small>// Add Product</small>
                        </h1>
						
		<form action="<?php echo $this->config->item('admin_url'); ?>product/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
						
  <div role="tabpanel">				
   <ul class="nav nav-tabs" role="tablist">
<?php foreach($languages as $language){ ?>
<?php if($language->default == 1){ ?>
    <li role="presentation" class="active"><a href="#<?php echo $language->id; ?>" aria-controls="<?php echo $language->id; ?>" role="tab" data-toggle="tab"><?php echo $language->language_name; ?></a></li>
 

<?php } else { ?>
    <li role="presentation"><a href="#<?php echo $language->id; ?>" aria-controls="<?php echo $language->id; ?>" role="tab" data-toggle="tab"><?php echo $language->language_name; ?></a></li>

<?php } ?>
<?php } ?>
 
</ul>

 

<!-- Tab panes -->
<div class="tab-content">
<?php foreach($languages as $language){ ?>
<?php if($language->default == 1){ ?>
 
  <div role="tabpanel" class="tab-pane fade in active" id="<?php echo $language->id; ?>">
  <br>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
      <input name="product_description[<?php echo $language->id; ?>][name]" type="text" class="form-control" id="inputNameStandart" >
    </div>
  </div>
 
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Details </label>
    <div class="col-sm-10">
      <textarea name="product_description[<?php echo $language->id; ?>][details]" id="editor<?php echo $language->id; ?>" rows="9" class="form-control"> </textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Meta Tags </label>
    <div class="col-sm-10">
      <input name="product_description[<?php echo $language->id; ?>][meta_tags]" type="text" class="form-control" id="inputEmail3" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Meta Keys </label>
    <div class="col-sm-10">
      <input name="product_description[<?php echo $language->id; ?>][meta_keys]" type="text" class="form-control" id="inputEmail3" >
    </div>
  </div>
  
  </div>
                  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor<?php echo $language->id; ?>' );
            </script>
<?php } else { ?>
  <div role="tabpanel" class="tab-pane fade" id="<?php echo $language->id; ?>">
   <br>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
      <input name="product_description[<?php echo $language->id; ?>][name]" type="text" class="form-control" id="inputEmail3" >
    </div>
  </div>
 
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Details </label>
    <div class="col-sm-10">
      <textarea name="product_description[<?php echo $language->id; ?>][details]" id="editor<?php echo $language->id; ?>" rows="9" class="form-control"> </textarea>
	  </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Meta Tags </label>
    <div class="col-sm-10">
      <input name="product_description[<?php echo $language->id; ?>][meta_tags]" type="text" class="form-control" id="inputEmail3" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Meta Keys </label>
    <div class="col-sm-10">
      <input name="product_description[<?php echo $language->id; ?>][meta_keys]" type="text" class="form-control" id="inputEmail3" >
    </div>
  </div>
  
  
  </div>
                  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor<?php echo $language->id; ?>' );
            </script>
<?php } ?>
<?php } ?>

   </div>
  </div>
 
 <hr>
 
 
  <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-offset-2 col-sm-10">
		<select name="category_id" class="form-control">
 			<?php foreach($categories as $category){ ?>
				<option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?> </option>
			<?php } ?>
		</select>
    </div>
  </div>
     <!-- Seo URL Load  js/freindurl.js -->
  		  <script type="text/javascript">
				  $(function(){
 
							$('#inputNameStandart').friendurl({id : 'inputSEO', divider: '_', transliterate: true});

					});
		</script>	
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">SEO Link</label>
    <div class="col-sm-10">
      <input name="url" type="text" value="" class="form-control" readonly="readonly"  id="inputSEO" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input name="price" type="text" value="" class="form-control" id="inputEmail3" >
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Stock</label>
    <div class="col-sm-10">
      <input name="stock" type="text" value="" class="form-control" id="inputEmail3" >
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
 
 <input type="text" class="form-control" name="image" readonly="readonly" onclick="openKCFinder(this)"
    value="Click here and select a file double clicking on it" style="width:600px;cursor:pointer" />
  

	</div>
  </div>
 
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Rank</label>
    <div class="col-sm-10">
      <input type="text" name="rank" value=""class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add New</button>
    </div>
  </div>
</form>

 
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 

  <?php $this->load->view('admin/footer'); ?>