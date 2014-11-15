 <? $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
 <p><?php echo $categories?></p>
				<p class="lead">Basket</p>

 <?php if($this->cart->total_items() > 0){ ?>
				<?php echo form_open('cart/update'); ?>

				<?php $i = 1; ?>
				<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden('rowid[]', $items['rowid']); ?>

	<tr>
	  <td> 
	  <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	  <td style="text-align:right"><?php echo anchor('cart/remove/'.$items['rowid'],'Delete'); ?>   </td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>
<p><?php echo form_submit('', 'Update your Cart'); ?></p>
<?php } ?>
				Total : <?php echo $this->cart->total_items(); ?> Product<br>
				<?php echo $cart_total; ?> $
				<br><a href="<?php echo base_url(); ?>cart">View Basket</a>

            </div>

             <div class="col-md-9">
				                    	<?php foreach ($product AS $products){ ?>
 
                <div class="thumbnail">

 
  
 
                         
                     
                                 
                                
								  
                               
								
       

                    <img class="img-responsive" src="<?php echo $products->image; ?>" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo $products->price; ?> $ </h4>
                        <h4><a href="<?php echo base_url(); ?>product/<?php echo $products->id; ?>"><?php echo $products->name; ?></a> 
                        </h4>
						<a href="<?php echo base_url(); ?>basket/add/<?php echo $products->id; ?>">Add Basket</a>
                        <p><?php echo $products->details; ?> </p>
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
   