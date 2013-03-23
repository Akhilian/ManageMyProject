  
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
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('gantt/index/' . $project['id']); ?>">Diagramme de Gantt</a></li>
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('bill/index/' . $project['id']); ?>">Factures</a></li>
				</ul>

			
			</div>
			
			<div class="span9 padding-right padding-top">
			
				<div class="box">
					<div class="title">
						<p class="lead"><?= $project['name']; ?></p>
						
						<blockquote>
							<p><?= $project['description']; ?></p>
							
						</blockquote>
					</div>
				</div>
				
				<div class="box">
					<div class="title">
						<p class="lead">Avancement du projet</p>
						<div class="progress progress-striped">
						  <div class="bar" style="width: 20%;"></div>
						</div>
					</div>
				</div>
				
				<div class="box">
					<div class="title">
						<p class="lead">Membres de l'équipe</p>

							<div class="row-fluid" style="text-align:center;">
								
								<div class="span2">
									<img src="<?= base_url(); ?>img/user.png" /><br />
									Moi
								</div>
								
							</div>
							

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
      			
      			<li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projet <b class="caret"></b></a>
                    
                    <ul class="dropdown-menu">
						
						<li class="nav-header">General</li>
						<li><a href="<?= site_url('project/edit/' . $project['id']); ?>">Informations</a></li>
						<li><a href="#">Gérer l'équipe</a></li>
                        <li><a href="#">Editer la fiche du projet</a></li>
                        
                        <li class="divider"></li>
                        
                        <li class="nav-header">Documents</li>
                        <li><a href="<?= site_url('gantt/index/' . $project['id']); ?>">Diagramme de gantt</a></li>
                        </ul>
                      </li>
      			
				<li><a href="<?= site_url('account/logout'); ?>">Deconnexion</a></li>
			</ul>
		</div>
	</div>
