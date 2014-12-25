<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KoCART Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

     <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>js/plugins/morris/raphael.min.js"></script>
	
	<!-- Freind URL Plug-in-->
 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.friendurl.js"></script>
 
 <!-- Jquery UI FULL-->
  <link href="<?php echo base_url();?>jquery-ui-1.11.2.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php echo base_url();?>jquery-ui-1.11.2.custom/jquery-ui.js"></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->config->item('admin_url'); ?>dashboard">KoCART Admin</a> 
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
			<li>
			<a target="_blank" href="<?php echo base_url(); ?>">Website</a>
			</li>
 

				                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language "></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="<?php echo base_url(); ?>language/set/tr">Türkce</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>language/set/en">Englisch</span></a>
                        </li>
  
                    </ul>
                </li>
				
 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('name'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $this->config->item('admin_url'); ?>account/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo $this->config->item('admin_url'); ?>dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-cube"></i> Catalog<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                     <li>
                        <a href="<?php echo $this->config->item('admin_url'); ?>category/lists"><i class="fa fa-fw fa-angle-double-right"></i>Categorys</a>
                    </li>
                     <li>
                        <a href="<?php echo $this->config->item('admin_url'); ?>product/lists"><i class="fa fa-fw fa-angle-double-right"></i>Products</a>
                    </li>
                        </ul>
                    </li> 
  

                    <li>
                        <a href="<?php echo $this->config->item('admin_url'); ?>order/lists"><i class="fa fa-fw fa-shopping-cart"></i> Orders</a>
                    </li>

					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#settings"><i class="fa fa-fw fa-asterisk"></i> Settings<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="settings" class="collapse">
					<li>
                        <a href="<?php echo $this->config->item('admin_url'); ?>module/lists"><i class="fa fa-fw fa-cogs"></i> Modules</a>
                    </li>
                     <li>
                        <a href="<?php echo $this->config->item('admin_url'); ?>currency/lists"><i class="fa fa-fw fa-try"></i>Currency</a>
                    </li>
                        </ul>
                    </li> 
                </ul>   
            </div>
          
        </nav>

        


 