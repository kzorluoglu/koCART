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
	  <td style="text-align:right"><?php echo anchor('cart/remove/'.$items['rowid'], $this->lang->line('cart_delete')); ?>   </td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="2"></td>
  <td class="right"><strong><?php echo $this->lang->line('total'); ?></strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
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
 <? $this->load->view('footer'); ?>
