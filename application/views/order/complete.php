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

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

 
	<tr>
	  <td> 
	  <?php echo $items['qty']; ?></td>
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
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
 	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<?php foreach($cargo_detail as $cargo){ ?>
<tr>
  <td colspan="2"></td>
  <td class="right">Cargo : <strong><?php echo $cargo->name; ?></strong></td>
  <td class="right">$<?php echo $this->cart->format_number($cargo->price); ?></td>
</tr>

<? } ?>
<tr>
  <td colspan="2"></td>
  <td class="right"><strong>Total</strong></td>
 
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total() + $cargo->price); ?></td>
</tr>

</table>
 								<p class="text-right"><button type="submit" class="btn btn-primary">&raquo; Confirm</button></p>

 </form>
 

            </div>

        </div>

    </div>
    <!-- /.container -->
 <? $this->load->view('footer'); ?>
   