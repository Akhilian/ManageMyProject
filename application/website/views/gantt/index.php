  
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
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('gantt/index/' . $projectId); ?>">Diagramme de Gantt</a></li>
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('bills/index/' . $projectId); ?>">Factures</a></li>
				</ul>

			
			</div>
			
			<div class="span9 padding-right padding-top">
			
				<div class="box">
					<div class="title">
						<p class="lead">Diagrammes de Gantt</p>
						
						<table class="table">
							<thead>
								<tr>
									<th>Diagramme</th>
									<th>Date</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
								if(isset($diagramms) && ! empty($diagramms) )
								{
									foreach($diagramms as $k)
									{
								?>
									<tr>
										<td><?= $k['name']; ?></td>
										<td><?= $k['date']; ?></td>
										<td>
											<a class="btn" href="<?= site_url('gantt/edit/' . $projectId . '/' . $k['id']); ?>">
												<i class="icon-eye-open"></i> Voir</a>
											<a class="btn" href="<?= site_url('tasks/edit/' . $projectId . '/' . $k['id']); ?>">
												<i class="icon-eye-open"></i> Gérer les tâches</a>
										</td>
									</tr>
								<?php
									}
								}
								?>
							
							</tbody>
						</table>
						
						<a class="btn" href="<?= site_url('gantt/add/' . $projectId); ?>">Ajouter un diagramme</a>

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
						<li><a href="<?= site_url('project/edit/' . $projectId); ?>">Informations</a></li>
						<li><a href="#">Gérer l'équipe</a></li>
                        <li><a href="#">Editer la fiche du projet</a></li>
                        
                        <li class="divider"></li>
                        
                        <li class="nav-header">Documents</li>
                        <li><a href="<?= site_url('gantt/index/' . $projectId); ?>">Diagramme de gantt</a></li>
                        </ul>
                      </li>
      			
				<li><a href="<?= site_url('account/logout'); ?>">Deconnexion</a></li>
			</ul>
		</div>
	</div>
