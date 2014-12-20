<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>koCART - Open Source E-Commerce </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/shop-homepage.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
<link href='<?php echo base_url(); ?>css/sm-core-css.css' rel='stylesheet' type='text/css' />
<link href='<?php echo base_url(); ?>css/sm-blue/sm-blue.css' rel='stylesheet' type='text/css' />
 
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
                <a class="navbar-brand" href="<?php echo base_url(); ?>">koCART</a>
            </div>
            
 
				 
 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('currency'); ?> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a   href="<?php echo base_url(); ?>currency/set/1">TL ₺</a> 
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>currency/set/2">Euro €</a>
                            </li>
 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('language'); ?> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a   href="<?php echo base_url(); ?>language/set/tr">Türkce</a> 
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>language/set/en">English</a>
                            </li>
 
                        </ul>
                    </li>
					<? $this->load->view('basket'); ?>
 </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 
 
	
