 <?php $this->load->view('header'); ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
					<br>
 				 <?php echo $categories?> 
					<br> 
            </div>

            <div class="col-md-9">
			
			
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
							<?php 
							$slider_row = 0;
							foreach ($slider_products AS $slider_product){ ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $slider_row; ?>" <?php if($slider_row == 0){ echo "class=' active'"; } ?>></li>
								 
  
						<?php
						$slider_row++;
						} ?>	
                            </ol>
                            <div class="carousel-inner">
							<?php 
							$i = 1;
							foreach ($slider_products AS $slider_product){ ?>
								<div class="item <?php if($i == 1){ echo "active"; } ?>">
                                    <img class="slide-image" src="<?php echo $slider_product->image; ?>" alt="">
                                </div>

	
						<?php
						$i++;
						} ?>	
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
				<h4><?php echo $this->lang->line('cart_title'); ?></h4>
 
 
	 
<?php echo form_open('cart/update'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

	<tr>
	  <th><?php echo $this->lang->line('qty'); ?></th>
	  <th><?php echo $this->lang->line('item_desc'); ?></th>
	  <th style="text-align:right"><?php echo $this->lang->line('item_price'); ?></th>
	  <th style="text-align:right"><?php echo $this->lang->line('sub_total'); ?></th>
	  <th style="text-align:right"><?php echo $this->lang->line('action'); ?></th>
	</tr>
	<?php foreach ($cart as $items){ ?>
			<input type="hidden" name="rowid[]" value="<?php echo $items['rowid']; ?>" />
		<tr>
			<td>
				<input type="text" name="qty[]" value="<?php echo $items['qty']; ?>" maxlength="3" size="5" />
			</td>
			<td>
			<?php echo $items['name']; ?>
			<?php if($items['options']){ ?>
			<br>
				<?php foreach($items['options'] AS $option){ ?>
				
				<b>&not;</b> <small><?php echo $option->value_name; ?> (<?php echo $option->operation; ?> <?php echo $this->cart->format_number($option->price * $currency_currency); ?> <?php echo $currency_symbol; ?>)</small> 
				<?php } ?>
			
			<?php } ?>
		  </td> 
		  <td style="text-align:right"><?php echo $this->cart->format_number(($items['price'] * $currency_currency)); ?> <?php echo $currency_symbol; ?></td>
		  <td style="text-align:right"><?php echo $this->cart->format_number(($items['subtotal'] * $currency_currency)); ?> <?php echo $currency_symbol; ?></td>
		  <td style="text-align:right"><?php echo anchor('cart/remove/'.$items['rowid'], $this->lang->line('cart_delete')); ?>   </td>
		</tr>

	<?php } ?>

	<tr>
	  <td colspan="2"></td>
	  <td class="right"><strong><?php echo $this->lang->line('total'); ?> </strong></td>
	  <td class="right"><?php echo $cart_total; ?> <?php echo $currency_symbol; ?></td>
	</tr>

</table>
		 <?php if($this->cart->total_items() > 0){ ?>
			<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('cart_listupdate'); ?></button>
		<?php } ?>
		<a href="<?php echo base_url(); ?>order/detail" role="button" class="btn btn-success"><?php echo $this->lang->line('checkout'); ?></a>
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
 <?php $this->load->view('footer'); ?>
