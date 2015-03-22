  <? $this->load->view('admin/header'); ?>
<div id="page-wrapper">

            <div class="container-fluid">
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li class="active"><a href="#order" role="tab" data-toggle="tab">Order Details</a></li>
  <li><a href="#billing" role="tab" data-toggle="tab">Billings Details</a></li>
  <li><a href="#shipping" role="tab" data-toggle="tab">Shipping Details</a></li>
  <li><a href="#products" role="tab" data-toggle="tab">Products</a></li>
</ul>



<script>
  $(function () {
    $('#myTab a:first').tab('show')
  })
</script>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="order">
  	  <?php
foreach($order as $order_detail) { ?> 
<table class="table table-striped">
         <tr>
		           <td>Order ID#</td>
				   <td><?php echo $order_detail->order_id; ?></td>
 
		 </tr>
         <tr>
		           <td>Customer ID#</td>
				   <td><?php if($order_detail->customer_id == 0){ ?> Visitor <? } else { ?> <?php echo $result->customer_id; ?> <?php } ?></td>
		 </tr>
         <tr>
		           <td>Total</td>
				<td><?php echo $order_detail->total; ?></td>
		 </tr>
			<tr>
		           <td>Date</td>
				   <td><?php echo $order_detail->date; ?></td>
		 </tr>
         <tr>
		           <td>IP</td>
				   <td><?php echo $order_detail->ip; ?></td>
		 </tr>
         <tr>
		           <td>Status</td>
				   <td>
				    <?php if($order_detail->status == "1"){ ?> <p class="bg-info">Waiting</p> <?} ?>
				    <?php if($order_detail->status == "2"){ ?> <p class="bg-warning">Shipping</p> <?} ?>
					<?php if($order_detail->status == "3"){ ?> <p class="bg-success">Completed</p> <?} ?>
					<?php if($order_detail->status == "4"){ ?> <p class="bg-warning">Arrived</p> <?} ?>
 
				   </td>
		 </tr>
		          <tr>
		           <td>Comment</td>
				   <td><?php echo $order_detail->comment; ?></td>
		 </tr>
		 </table>
		 <hr>
		 <h4>Order Operations</h4>

<form class="form-horizontal" action="<?php echo $this->config->item('admin_url'); ?>order/detail" method="post" accept-charset="utf-8"  role="form"  >
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
	      <input name="order_id" type="hidden" value="<?php echo $order_detail->order_id; ?>">
<select name="status" class="form-control">
   <option value="<?php echo $order_detail->status; ?>"> 
   				    <?php if($order_detail->status == "1"){ ?> Waiting <?} ?>
				    <?php if($order_detail->status == "2"){ ?> Shipping <?} ?>
					<?php if($order_detail->status == "3"){ ?> Completed <?} ?>
					<?php if($order_detail->status == "4"){ ?> Arrived <?} ?>
   
   </option>
   <option value=""></option>
  <option value="1">Waiting</option>
  <option value="2">Shipping</option>
  <option value="3">Completed</option>
  <option value="4">Arrived</option>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Comment</label>
    <div class="col-sm-10">
<textarea class="form-control" name="comment" rows="3"></textarea>    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Send</button>
    </div>
  </div>
</form>
<?php } ?>
  
 </div>
  <div class="tab-pane" id="billing">
    	  <?php
foreach($order as $order_detail) { ?> 
<table class="table table-striped">
         <tr>
		           <td>First Name</td>
				   <td><?php echo $order_detail->billing_first_name; ?></td>
 
		 </tr>
         <tr>
		           <td>E-mail</td>
				   <td><?php echo $order_detail->billing_email; ?></td>
 
		 </tr>
         <tr>
		           <td>Telephone</td>
				   <td><?php echo $order_detail->billing_telephone; ?></td>
 
		 </tr>
         <tr>
		           <td>Address 1</td>
				   <td><?php echo $order_detail->billing_address1; ?></td>
 
		 </tr>
         <tr>
		           <td>Address 2</td>
				   <td><?php echo $order_detail->billing_address2; ?></td>
 
		 </tr>
         <tr>
		           <td>City</td>
				   <td><?php echo $order_detail->billing_city; ?></td>
 
		 </tr>
         <tr>
		           <td>Postcode</td>
				   <td><?php echo $order_detail->billing_postcode; ?></td>
 
		 </tr>
         <tr>
		           <td>Country</td>
				   <td><?php echo $order_detail->billing_country; ?></td>
 
		 </tr>
         <tr>
		           <td>Region</td>
				   <td><?php echo $order_detail->billing_region; ?></td>
 
		 </tr>
         <tr>
		           <td>Company Name</td>
				   <td><?php echo $order_detail->billing_company; ?></td>
 
		 </tr>
         <tr>
		           <td>Company Nr.</td>
				   <td><?php echo $order_detail->billing_companyid; ?></td>
 
		 </tr>
		 </table>
		 <? } ?>
  
  </div>
  <div class="tab-pane" id="shipping">
      	  <?php
foreach($order as $order_detail) { ?> 
<table class="table table-striped">
         <tr>
		           <td>First Name</td>
				   <td><?php echo $order_detail->cargo_first_name; ?></td>
 
		 </tr>
         <tr>
		           <td>E-mail</td>
				   <td><?php echo $order_detail->cargo_email; ?></td>
 
		 </tr>
         <tr>
		           <td>Telephone</td>
				   <td><?php echo $order_detail->cargo_telephone; ?></td>
 
		 </tr>
         <tr>
		           <td>Address 1</td>
				   <td><?php echo $order_detail->cargo_address1; ?></td>
 
		 </tr>
         <tr>
		           <td>Address 2</td>
				   <td><?php echo $order_detail->cargo_address2; ?></td>
 
		 </tr>
         <tr>
		           <td>City</td>
				   <td><?php echo $order_detail->cargo_city; ?></td>
 
		 </tr>
         <tr>
		           <td>Postcode</td>
				   <td><?php echo $order_detail->cargo_postcode; ?></td>
 
		 </tr>
         <tr>
		           <td>Country</td>
				   <td><?php echo $order_detail->cargo_country; ?></td>
 
		 </tr>
         <tr>
		           <td>Region</td>
				   <td><?php echo $order_detail->cargo_region; ?></td>
 
		 </tr>
 
		 </table>
		 <? } ?>
  
  
  
  </div>
  <div class="tab-pane" id="products">
    <table class="table table-striped">
        <thead>
        <tr>
          <th>Product</th>
          <th>QTY</th>
          <th>Price</th>
          <th>Total</th>
		  <th>Action</th>
        </tr>
      </thead>
      <tbody>
  <?php foreach($products as $product){ ?>

         <tr>
		        <td><?php echo $product['name']; ?>			
				
				<?php if($product['options']){ ?>
			<br>
				<?php foreach($product['options'] AS $option){ ?>
				
				<b>&not;</b> <small><?php echo $option->value_name; ?> (<?php echo $option->operation; ?> <?php echo $this->cart->format_number($option->price * $currency); ?> <?php echo $symbol; ?>)</small> 
				<?php } ?>
			
			<? } ?>
			
			
				</td>
				<td><?php echo $product['count']; ?></td>
				<td><?php echo $product['price']; ?></td>
				<td><?php echo $product['count'] * $product['price']; ?></td>
				<td>
				<a href="<?php echo $this->config->item('admin_url'); ?>order/product_delete/<?php echo $product['oid']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
 
		 </tr>

  <? } ?>
        </tbody>
  </table>
    		<form action="<?php echo $this->config->item('admin_url'); ?>order/product_add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
       <input name="product_id" id="tags"> <small><i>* Autocomplete</i></small>
	   <input name="order_id" type="hidden" value="<?php echo $order_id; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">QTY</label>
    <div class="col-sm-10">
       <input name="count">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add New</button>
    </div>
  </div>
  </form>
  
  </div>
  

  
  
</div>


 
    </table>
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
  <!-- AUTOCOMPLETE von jQuery UI -->
 <link href="<?php echo base_url();?>jquery-ui-1.11.2.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php echo base_url();?>jquery-ui-1.11.2.custom/jquery-ui.js"></script>
		  <script type="text/javascript">
				  $(function(){
					  $("#tags").autocomplete({
						source: "<?php echo $this->config->item('admin_url'); ?>order/get_product_name"  
					  });	
					});
		</script>

<!-- AUTOCOMPLETE von jQuery UI --> 
 

  <? $this->load->view('admin/footer'); ?>