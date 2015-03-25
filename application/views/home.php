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
							   <br>
											<img class="img-thumbnail" src="http://jolyjokerz.com/upload/files/banners/reklam.png">
								<br><br>
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
                                    <a href="<?php echo base_url(); ?><?php echo $slider_product['url']; ?>"> <img class="slide-image" src="<?php echo $slider_product['image']; ?>" alt=""></a>
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
                            <img src="<?php echo $most_sell_product['image']; ?>" alt="">
                            <div class="caption">
                     
                                <h4><a href="<?php echo base_url(); ?><?php echo $most_sell_product['url']; ?>"><?php echo $most_sell_product['name']; ?></a> 
                                </h4>
								           <h4 class="pull-right"><?php echo $most_sell_product['price']; ?> <?php echo $currency_symbol; ?></h4>
 								<p><?php echo strip_tags(substr($most_sell_product['details'], 0, 45)); ?></p>
								<p>
									<form action="<?php echo $this->config->item('base_url'); ?>basket/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
										<input type="hidden" name="id" value="<?php echo $most_sell_product['product_id']; ?>" />
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" ></span><?php echo $this->lang->line('add_basket'); ?></button>
									</form>
								</p>
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
                            <img src="<?php echo $most_popular_product['image']; ?>" alt="">
                            <div class="caption">
                     
                                <h4><a href="<?php echo base_url(); ?><?php echo $most_popular_product['url']; ?>"><?php echo $most_popular_product['name']; ?></a> 
                                </h4>
								           <h4 class="pull-right"><?php echo $most_popular_product['price']; ?> <?php echo $currency_symbol; ?></h4>
 								<p><?php echo strip_tags(substr($most_popular_product['details'], 0, 45)); ?></p>
							 	<p>
										<form action="<?php echo $this->config->item('base_url'); ?>basket/add" method="post" accept-charset="utf-8" class="form-horizontal" role="form">				
										<input type="hidden" name="id" value="<?php echo $most_sell_product['product_id']; ?>" />
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" ></span><?php echo $this->lang->line('add_basket'); ?></button>
										</form>
								</p>
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

	 