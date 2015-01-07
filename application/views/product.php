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
				                    	<?php foreach ($product AS $products){ ?>
 
                <div class="thumbnail">

 
  
 
                         
                     
                                 
                                
								  
                               
								
       

                    <img class="img-responsive" src="<?php echo $products['image']; ?>" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo $products['price']; ?></h4>
                        <h4><a href="<?php echo base_url(); ?>product/<?php echo $products['id']; ?>"><?php echo $products['name']; ?></a> 
                        </h4>
						  <p><?php echo $products['details']; ?> </p>
 
						
						<br /><br />					
						<center><h3><a href="<?php echo base_url(); ?>basket/add/<?php echo $products['id']; ?>"><span class="glyphicon glyphicon-shopping-cart" ></span> Add Basket</a></h3></center>
                      
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>
	<?php } ?>
                <div class="well">
 

 <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'kocart'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
 

 
                </div>

            </div>
			
 
 
 

 

    

            </div>

        </div>

    </div>
    <!-- /.container -->
 <? $this->load->view('footer'); ?>
   