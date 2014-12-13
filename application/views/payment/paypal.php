 
<br>
 
</form>
<form action='<?php echo base_url(); ?>payment/paypal/complete' method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="youremail@mail.com">
<input type="hidden" name="currency_code" value="US">
<input type="hidden" name="rm" value="2">
     


 

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

 <input type="hidden" name="item_name_<? echo $i; ?>" value="<?php echo $items['name']; ?>">
<input type="hidden" name="amount_<? echo $i; ?>" value=" <?php echo $this->cart->format_number($items['subtotal']); ?> ">
 
 
	 
 <?php // echo $this->cart->format_number($items['price']); ?> 
 

<?php $i++; ?>

<?php endforeach; ?>

 <?php // echo $this->cart->format_number($this->cart->total()); ?> 
 
<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal'/>
</form>