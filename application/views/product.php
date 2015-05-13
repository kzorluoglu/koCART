 <? $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
					<br>
 				 <?php echo $categories?> 
					<br> 
             </div>
              <div class="col-md-9">
			  		<form action="<?php echo $this->config->item('base_url'); ?>basket/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				

				<?php foreach ($product AS $products){ ?>
				<input type="hidden" name="id" value="<?php echo $products['id']; ?>" />
                <div class="thumbnail">
		
                    <img class="img-responsive" src="<?php echo $products['image']; ?>" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo $this->cart->format_number(($products['price'] * $currency_currency)); ?> <?php echo $currency_symbol; ?></h4>
                        <h4><a href="<?php echo base_url(); ?>product/<?php echo $products['id']; ?>"><?php echo $products['name']; ?></a></h4>
						  <p><?php echo $products['details']; ?> </p>
 
 <?php if(@$options){ ?>
	<?php foreach($options AS $option){ ?>
		
		
			<?php if($option["option_type"] == "selectbox"){ ?>
				 <div class="form-group">
					<label class="col-sm-2 col-sm-offset-7 control-label"><p align="right"><?php echo $option["option_name"]; ?></p></label>
					<div class="col-sm-3">
				<select name="option_values[]" class="form-control">
				<option value=""></option>
				<?php foreach($option["values"] AS $value){ ?>
				<option value="<?php echo $value->id; ?>"><?php echo $value->value_name; ?>, <?php echo $value->operation; ?><?php echo $this->cart->format_number(($value->price * $currency_currency)); ?> <?php echo $currency_symbol; ?></option>
				<?php } ?>
				</select>
						<hr>		
					</div>
				  </div>
			<?php } ?>
			
			<?php if($option["option_type"] == "checkbox"){ ?>
				 <div class="form-group">
					<label class="col-sm-2 col-sm-offset-7 control-label"><p align="right"><?php echo $option["option_name"]; ?></p></label>
					<div class="col-sm-3">
				<div class="checkbox">
				<?php foreach($option["values"] AS $value){ ?>
					<label>
					  <input type="radio" name="option_values[]" value="<?php echo $value->id; ?>"> <?php echo $value->value_name; ?>,
					  <?php echo $value->operation; ?><?php echo $this->cart->format_number(($value->price * $currency_currency)); ?> <?php echo $currency_symbol; ?>
					</label>
				<?php } ?>
				</div>
						<hr>		
					</div>
				  </div>
			<?php } ?>
		
		
			<?php if($option["option_type"] == "radio"){ ?>
				 <div class="form-group">
					<label class="col-sm-2 col-sm-offset-7 control-label"><p align="right"><?php echo $option["option_name"]; ?></p></label>
					<div class="col-sm-3">
				<div class="checkbox">
				<?php foreach($option["values"] AS $value){ ?>
					<label>
					  <input type="radio" name="option_values[]" value="<?php echo $value->id; ?>"> <?php echo $value->value_name; ?>,
					  <?php echo $value->operation; ?><?php echo $this->cart->format_number(($value->price * $currency_currency)); ?> <?php echo $currency_symbol; ?>
					</label>
				<?php } ?>
				</div>
						<hr>		
					</div>
				  </div>
			<?php } ?>
		
		
		
		
		
		<?php } // Option Foreach End ?>
		
				<?php } // If Option have END ?>
						<br /><br />					
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" ></span> Add Basket</button></center>
                      
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>
	<?php } ?>
                <div class="well">
 

 <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'kocart'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
 

 
                </div>

            </div>
			
 
 
 

 

    

            </div>

        </div>

    </div>
    <!-- /.container -->
 <? $this->load->view('footer'); ?>
   