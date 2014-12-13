 
    <li class="dropdown">
        <a href="#"  data-toggle="dropdown">
			<small> <?php echo $this->lang->line('total'); ?> : <?php echo $this->cart->total_items(); ?> | (<?php echo $this->cart->format_number($cart_total); ?>$)</small>
        </a>
        <ul class="dropdown-menu">
  
      
  <?php if($this->cart->total_items() > 0){ ?>
				<?php echo form_open('cart/update'); ?>
<table class="table small">
				<?php $i = 1; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
	<?php echo form_hidden('rowid[]', $items['rowid']); ?>
	<tr>
 

	  <td>
		 <?php echo $items['name']; ?>
					<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
					<br>
				
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				

			<?php endif; ?>
		</td>


	  <td style="text-align:right">	  <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
  x $<?php echo $this->cart->format_number($items['price']); ?></td>
 
	  <td style="text-align:right"><?php echo anchor('cart/remove/'.$items['rowid'], $this->lang->line('delete')); ?>   </td>
	</tr>
 

 
<?php $i++; ?>

<?php endforeach; ?>

<?php } ?>
</table>
<br style="clear:both;">

<div class="sepet_alt">
 	<button type="submit" style="display: block; width: 100%;" class="btn btn-primary btn"><?php echo $this->lang->line('update_cart'); ?></button>

	<a href="<?php echo base_url(); ?>cart" role="button" class="btn btn-success"><?php echo $this->lang->line('view_basket'); ?></a>

 
</div>
</form>
        </ul>
    </li>
 
