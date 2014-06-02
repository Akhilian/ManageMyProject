<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>ManageMyProject</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="Alwin.fr">

	    <link href="css/bootstrap.css" rel="stylesheet">
	
	    <style type="text/css">
		
			body {
				padding-top: 20px;
		    }

		/* Custom container */
	    .container {
	    	margin: 0 auto;
			max-width: 1000px;
		}
    
	    .container > hr {
	    	margin: 60px 0;
	    }

	    /* Main marketing message and sign up button */
	    .jumbotron {
	    	margin: 90px 0;
			text-align: center;
		}
    
	    .jumbotron h1 {
	    	font-size: 70px;
	        font-weight: 200;
	        line-height: 1;
		}
    
	    .jumbotron .lead {
			font-size: 24px;
	        line-height: 1.25;
		}
    
	    .jumbotron .btn {
	    	font-size: 21px;
	        padding: 14px 24px;
		}

		/* Supporting marketing content */
	    .marketing {
	    	margin: 60px 0;
	    }
    
	   	.marketing p + h4 {
	    	margin-top: 28px;
	    }

		/* Customize the navbar links to be fill the entire space of the .navbar */
	    .navbar .navbar-inner {
	    	padding: 0;
	    }
    
	    .navbar .nav {
	    	margin: 0;
	        display: table;
	        width: 100%;
		}
    
	    .navbar .nav li {
	    	display: table-cell;
	        width: 1%;
	        float: none;
		}
    
	    .navbar .nav li a {
	    	font-weight: bold;
	        text-align: center;
	        border-left: 1px solid rgba(255,255,255,.75);
	        border-right: 1px solid rgba(0,0,0,.1);
	    }
    
	    .navbar .nav li:first-child a {
	    	border-left: 0;
	        border-radius: 3px 0 0 3px;
	    }
    
	    .navbar .nav li:last-child a {
	    	border-right: 0;
	        border-radius: 0 3px 3px 0;
	    }
      
		.options {
	    	background-color: white;
	    	color: #414141;
      	
			padding: 50px 0;
		}
      
		.preview {
			padding: 40px 0;
		}
	
	
		@media (max-width: 767px) {

			body {
				padding: 0 0;
			}	
		}
    
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

	<div class="row-fluid">
	</div>

	<div class="row-fluid">
		<div class="container">
    		<div class="jumbotron">    		
    				<img src="<?= base_url(); ?>img/logo1.png" />
	    	    	<h1>Organisez, Développez, Créez</h1>
	    	    	<p class="lead">Découvrez un outil de gestion de projet totalement intégré.</p>
	    	    	<a class="btn btn-large btn-success" href="<?= site_url('account/login'); ?>">Découvrir dès maintenant.</a>
    	  	</div>
		</div>	
	</div>
	
	<div class="options">
		<div class="container">

			<div class="row-fluid">
		        <div class="span4">
		          	<h2>Gestion de t&acirc;ches</h2>
		          	<p>Planifier les étapes de votre projet et gérer son avancement.</p>
		        	<p><a class="btn" href="#">Plus d'infos</a></p>
		        </div>    
		        <div class="span4">
		          	<h2>Partage de fichiers</h2>
		          	<p>
		          		Profiter d'un système de partage de fichier avec les membres de votre équipe de projet.
		          	</p>
		        	<p><a class="btn" href="#">Plus d'infos</a></p>
		       	</div>
		        <div class="span4">
		          	<h2>Facturation</h2>
		          	<p>Gérer toutes vos factures et archiver une version en version PDF.</p>
		        	<p><a class="btn" href="#">Plus d'infos</a></p>
		    	</div>
			</div>
			
			<hr />
			
			ManageMyProject &copy; 2012 - Tous droits réservés.
			
		</div>
	</div>
	
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-latest.js"></script>

  </body>
</html>
