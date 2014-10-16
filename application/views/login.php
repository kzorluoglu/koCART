 <? $this->load->view('header'); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
				
				
				
											<?php 
 
							foreach ($all_categorys AS $all_category){ ?>
								 <a href="<?php echo base_url(); ?><?php echo $all_category->link; ?> " class="list-group-item"><?php echo $all_category->category_name; ?> </a>
                                    

	
						<?php
 
						} ?>
                   
 
                </div>
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
   