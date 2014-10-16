 
	  <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">KoCART Admin Login</a>
            </div>
 
        </div>
        <!-- /.container -->
    </nav>    <div class="container">
          <div class="col-md-4 col-md-offset-4">
      	<form action="<?php echo base_url();?>admin/account/check" accept-charset="utf-8" id="login" method="post"> 



        <h2 class="form-signin-heading">Please sign in</h2>
		  <div class="form-group">
			<input name="email" type="text" class="form-control" placeholder="Email address">
		</div>
		
		  <div class="form-group">
			<input name="password" type="password" class="form-control" placeholder="Password"> 
		</div>
		<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
      </form>
 </div>
    </div> <!-- /container -->

   <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo base_url();?></p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url();?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/form.js"></script>
	
 <script src="<?php echo base_url();?>js/sisyphus.js"></script>

<script>
$( "#orderform" ).sisyphus(); 
</script>

</body>

</html>


	 