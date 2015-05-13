 <? $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
 

            <div class="col-md-12">
			<h4>Order Complete</h4>
			
  <?php echo form_open('order/confirm'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
 
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
			
			<? } ?>
		  </td>
		  <td style="text-align:right"><?php echo $this->cart->format_number($items['price'] * $currency_currency); ?> <?php echo $currency_symbol; ?></td>
		  <td style="text-align:right"> <?php echo $this->cart->format_number($items['subtotal'] * $currency_currency); ?> <?php echo $currency_symbol; ?></td>
 		</tr>

	<?php } ?>

<?php foreach($cargo_detail as $cargo){ ?>
<tr>
  <td colspan="2"></td>
  <td class="right">Cargo : <strong><?php echo $cargo->name; ?></strong></td>
  <td class="right"><?php echo $this->cart->format_number($cargo->price * $currency_currency); ?> <?php echo $currency_symbol; ?></td>
</tr>

<? } ?>
<tr>
  <td colspan="2"></td>
  <td class="right"><strong>Total</strong></td>
 
  <td class="right"><?php echo $this->cart->format_number(($this->cart->total() + $cargo->price) * $currency_currency); ?> <?php echo $currency_symbol; ?></td>
</tr>

</table>
 								<p class="text-right"><button type="submit" class="btn btn-primary">&raquo; Confirm</button></p>

 </form>
 

            </div>

        </div>

    </div>
    <!-- /.container -->
 <? $this->load->view('footer'); ?>
   