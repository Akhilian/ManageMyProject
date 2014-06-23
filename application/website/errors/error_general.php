<!DOCTYPE html>
<html>
	<head>
		<title>[Manage My Projet] - by Alwin</title>
	
	    <!-- Bootstrap -->
		<link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?= base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
  
  <style type="text/css">
		
		body {
			background-image: url('<?= base_url(); ?>img/wild_oliva.png');
			color: white;
		}
		
		.wrapper {
			margin-top: 200px;
		}
		
		.alert {
			background-color:transparent;
			border: 1px dashed white;
			
			color: white;
		}

		.logo {
			text-align: right;
		}
		
  </style>
  
  </head>
  
  <body>
  
  	<!--[START] wrapper -->
  	<div id="wrapper" class="container wrapper">
  
		<!--[START] content -->
		<div class="row-fluid">
			
			<div class="span4 logo">
				<img src="<?= base_url(); ?>img/logo1.png" align="ManageMyProject" />
			</div>
			
			<div class="span8">
				<p class="lead"><?php echo $status_code; ?> - <?php echo str_replace(array('<p>', '</p>'), '', $message); ?></p>

				<p>Aïe … Une erreur imprévue a été découverte.<br />
				Si l'erreur se reproduit, n'hésitez pas à nous la signaler, nous essayerons de résoudre ce problème au plus vite.</p>
				<p><a href="<?= site_url(); ?>" class="btn">Revenir à l'accueil</a></p>
			</div>
			
		<!--[END] content -->
		</div>
		
	<!--[END] wrapper -->
	</div>
		
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
  </body>
</html>