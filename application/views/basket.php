 
    <li class="dropdown">
        <a href="#"  data-toggle="dropdown">
			<small> <?php echo $this->lang->line('total'); ?> : <?php echo $this->cart->total_items(); ?> | (<?php echo $cart_total; ?> <?php echo $currency_symbol; ?>)</small>
        </a>
        <ul class="dropdown-menu">
  
      
  <?php if($this->cart->total_items() > 0){ ?>
				<?php echo form_open('cart/update'); ?>
					<table class="table small">
						<?php $i = 1; ?>
						<?php foreach ($this->cart->contents() as $items){ ?>
						<input type="hidden" name="rowid[]" value="<?php echo $items['rowid']; ?>" />
					<tr>
						<td>
							<?php echo $items['name']; ?>
						</td>
						<td style="text-align:right">
							<input type="text" name="qty[]" value="<?php echo $items['qty']; ?>" maxlength="3" size="3" />
										x <br />
							<?php echo $last_price = $this->cart->format_number(($items['price'] * $currency_currency)); ?> <?php echo $currency_symbol; ?>
						</td>
						<td style="text-align:right">
							<?php echo anchor('cart/remove/'.$items['rowid'], $this->lang->line('delete')); ?>
						</td>
					</tr>
 
						<?php $i++; ?>
						<?php } ?>
						<?php } ?>
					</table>
					<br style="clear:both;">

					<div class="sepet_alt">
							<button type="submit" style="display: block; width: 100%;" class="btn btn-primary btn">
								<?php echo $this->lang->line('update_cart'); ?>
							</button>
						<a href="<?php echo base_url(); ?>cart" role="button" class="btn btn-success"><?php echo $this->lang->line('view_basket'); ?></a>
					</div>
		</form>
        </ul>
    </li>
 
