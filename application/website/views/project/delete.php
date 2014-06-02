  
  	<div id="wrapper" class="container wrapper">

		<div class="row-fluid">
		
			<div class="span4" style="text-align:right;">
				<img src="<?= base_url(); ?>img/poubelle.png" alt="A la poubelle ?" />
			</div>
			<div class="span8 box">
			
				<div class="title">
					<p class="lead">Supprimer le projet ?</p>
					<p>Vous êtes sur le point de supprimer définitivement un projet.<br />Cette action est irréversible !</p>
					
					<p>
						<a class="btn" href="<?= site_url('project/delete/' . $test . '/true'); ?>">Confirmer</a>
						<a class="btn" href="<?= site_url('home'); ?>">Annuler</a>
					</p>
				</div>
			
			</div>
		
		</div>
		<div class="box">

		</div>

	</div>
	
	<div class="navbar navbar-fixed-bottom">
		<div class="navbar-inner">
			
		    <ul class="nav">
      			<li class="active"><a href="<?= site_url('home'); ?>">Accueil</a></li>
      			<li><a href="<?= site_url('account/manage'); ?>">Mon compte</a></li>
				<li><a href="<?= site_url('account/logout'); ?>">Deconnexion</a></li>
			</ul>
		</div>
	</div>
