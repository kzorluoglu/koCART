 <? $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
 <p><?php echo $categories?></p>
				<p class="lead">Basket</p>
				Total : <?php echo $cart_total; ?> $
				<br><a href="<?php echo base_url(); ?>cart">View Basket</a>

            </div>

            <div class="col-md-9">
			
 
 

            </div>

        </div>

    </div>
    <!-- /.container -->
 <? $this->load->view('footer'); ?>
   