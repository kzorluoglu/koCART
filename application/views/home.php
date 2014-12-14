 <? $this->load->view('header'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
 
            <div class="col-md-3">
					<div class="row">
							   <div class="col-sm-12">
						   <?php echo $categories?> 
								</div>
					 </div>
					 					<div class="row">
							   <div class="col-sm-12">
											Banner
								</div>
					 </div>
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
				<h4><?php echo $this->lang->line('best_sell'); ?></h4>
                    	<?php foreach ($most_sell_products AS $most_sell_product){ ?>
 
 
 

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $most_sell_product->image; ?>" alt="">
                            <div class="caption">
                     
                                <h4><a href="<?php echo base_url(); ?><?php echo $most_sell_product->url; ?>"><?php echo $most_sell_product->name; ?></a> 
                                </h4>
								           <h4 class="pull-right"><?php echo $this->cart->format_number($most_sell_product->price); ?> $</h4>
                                <p><?php echo $most_sell_product->details; ?></p>
								<p><a href="<?php echo base_url(); ?>basket/add/<?php echo $most_sell_product->id; ?>"><?php echo $this->lang->line('add_basket'); ?></a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 <?php echo $this->lang->line('reviews'); ?></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
	<?php } ?>
 

                </div>
                <div class="row">
				<h4><?php echo $this->lang->line('most_popular'); ?></h4>
                    	<?php foreach ($most_popular_products AS $most_popular_product){ ?>
 
 
 

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $most_popular_product->image; ?>" alt="">
                            <div class="caption">
                     
                                <h4><a href="<?php echo base_url(); ?><?php echo $most_popular_product->url; ?>"><?php echo $most_popular_product->name; ?></a> 
                                </h4>
								           <h4 class="pull-right"><?php echo $this->cart->format_number($most_popular_product->price); ?> $</h4>
                                <p><?php echo $most_popular_product->details; ?></p>
								<p><a href="<?php echo base_url(); ?>basket/add/<?php echo $most_popular_product->id; ?>"><?php echo $this->lang->line('add_basket'); ?></a>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 <?php echo $this->lang->line('reviews'); ?></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
	<?php } ?>
 

                </div>
            </div>

        </div>

    </div>
    <!-- /.container -->

 <? $this->load->view('footer'); ?>

	 