<!DOCTYPE html>
<html>
	<head>
		<title>[Manage My Projet] - by Alwin</title>
		<meta charset="utf-8">
	
	    <!-- Bootstrap -->
		<link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?= base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
 
  
  <style type="text/css">
  
  		body {
  			background-image: url('<?= base_url(); ?>img/wild_oliva.png');
  		}
		
		.header {
			height: 500px;
		}
		
		.macbook {
			display: block;
			position: absolute;
			
			top:170px;
			text-align: center;
			width: 100%;
		}
		
		.arguments {
			background-color: white;
			margin-top: 100px;
			height: 2000px;
			
			padding-top: 190px;
		}
		
		.sideMenu {
			width: 50px;
			height: 200px;
			background-color: aqua;
			
			z-index: 1000;
			
			position: fixed;
			top:30px;
			right: 30px;
		}
		
		.logo {
			position:absolute;
			top:120px;
			width: 100%;
			text-align: center;
			color: white;
		}

  </style>
  
  </head>
  
	<body>
	<!--[if lt IE 9]>
		<div class="alert alert-block">
			<strong class=alert-heading>Warning!</strong>
			Your browser is <em>ancient!</em>
			<a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.
		</div>
	<![endif]--> 
  
  	<div class="sideMenu">
  		
  	</div>
  	  
  	
  	<div id="wrapper">

		<div class="macbook">
			<div class="logo">
				<img src="<?= base_url(); ?>img/logo1.png" /><br />
				<h1>ManageMyProject</h1>
			</div>

	  		<img src="<?= base_url(); ?>/img/macbook.png" />
	  	</div>  	
  	
  		<section class="header"></section>

		<section class="arguments">
		
			<div class="container">
				<h1>Un nouveau projet, pour vous !</h1>
				<p class="lead">Mener un projet de bout en bout est un travail long et qui nécessite un certain nombre d'outils. ManageMyProject regroupe ces outils et vous les met à disposition.</p>
		
				<div class="row-fluid">
					<div class="span6">Ici</div>
					<div class="span6">La</div>
				</div>
			</div>
		</section>
		
	</div>
  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$('.ico').tooltip();
		$('.pop').popover(
			{
				trigger : 'hover',
				title : 'Description',
			}
		);
	</script>
	
  </body>
</html>