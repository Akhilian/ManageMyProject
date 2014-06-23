  
  	<div id="wrapper">

		<div class="row-fluid">
			
			<div class="span3 menu">
			
				<h2>Menu</h2>
				
				<h5>Quoi de neuf ?</h5>
				<ul class="nav">
					<li><span class="badge">0</span> <a href="#">Notifications</a></li>
					<li><span class="badge">0</span> <a href="#">Nouveaux commentaires</a></li>
				</ul>
				
				<h5>Documents</h5>
				<ul class="nav">
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('gantt/index/'); ?>">Diagramme de Gantt</a></li>
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('bills/index/'); ?>">Factures</a></li>
				</ul>

			
			</div>
			

			<div class="span9 padding-right padding-top">
			
				<!--
				<div class="box">
					<div class="title">
						<h1>Adrien Saunier</h1>
							<blockquote>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
								 the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
								  type and scrambled it to make a type specimen book. It has survived not only five centuries, but
								   also the leap into electronic typesetting, remaining essentially unchanged. It was popularised
								    in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
								     with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
							</blockquote>
					</div>
				</div>
				-->
				

				
				<div class="box">
					<div class="title">
						<h1>Adrien SAUNIER <span class="label label-primary">Akhilian</span></h1>
						<hr />
						<?php
							if( ! isset($github) )
							{
							?>
								<div class="alert alert-info">Did you know ? You can now synchronized your <a href="http://www.github.com/">GitHub</a>
								account and manage your projects within WIP and improving your managing efficiency,
								 that's easy ! Just click <a href="<?php echo site_url('account/sync/github'); ?>"><b>here</b></a>.</div>
							<?php
							}
						?>	
					</div>
				</div>

			</div>
			
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
