<?php session_start(); ?>
<?php include("includes/cart_count.php"); ?>
<?php require_once('includes/repeatables.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php
				bloginfo('name');
				wp_title(' | ', 'true', 'left'); 
			?>
		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=10" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css">		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
	</head>
	<body>
