  
  	<!-- wrapper -->
  	<div id="wrapper">

		<!-- row-fluid -->
		<div class="row-fluid">
			
			<!-- menu -->
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
					<li><span class="badge badge-success">6</span> <a href="<?= site_url('bill/index/' . $projectId); ?>">Factures</a></li>
				</ul>
			
			</div>
			<!-- ./menu -->
			
			<!-- contenu -->
			<div class="span9 padding-right padding-top">
			
				<?= validation_errors(); ?>
			
				<div class="box">
					<div class="title">
						<p class="lead">Ajouter une tache / Etape 2 (sur 3)<hr /></p>
						
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#date">Par date</a></li>
							<li><a href="#previousDate">Par dépendance</a></li>
						</ul>
 
 						<!-- tab-content -->
						<div class="tab-content">
						
							<!-- tab : date -->
							<div class="tab-pane active" id="date">
							
								<p>A présent, veuillez renseigner vos estimations de réalisation de la tâche. 
								Choisissez un date de début, ainsi qu'une date de fin.
								Vous pouvez également définir une durée de réalisation pour la tache,
								la date de fin sera alors calculée automatiquement.</p>
							
								<form method="post">

									<input type="hidden" value="date" name="form" />
								
								<div class="row-fluid">
									<div class="span6">
							
										<h5>1) Choisir la date de début</h5>
										
										<div class="input-append date datepicker" data-date="" data-date-format="dd-mm-yyyy">
											<input size="16" type="text" value="<?= set_value('inputStartDate');?>"
												 name="inputStartDate" readonly="" style="width:90%;">
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									
									</div>
								</div>
							
								<div class="row-fluid">
									<div class="span6">
							
										<h5>2) Choisir une date de fin …</h5>
														
										<div class="input-append date datepicker" data-date="" data-date-format="dd-mm-yyyy">
											<input size="16" type="text" value="<?= set_value('inputEndDate');?>" name="inputEndDate" readonly="" style="width:90%;">
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									</div>
									<div class="span6">
									
										<h5>… ou une durée</h5>
										
										<input type="text" name="inputDuration" value="<?= set_value('inputDuration');?>" style="width:60%;" />
										<select name="inputUnity" style="width:35%;">
											<option value="1">heures</option>
											<option value="2">jours</option>
										</select>
														
									</div>
								</div>
							
								<hr />
							
								<button type="submit" class="btn btn-primary">Etape suivante</button>
								<a href="<?= site_url('tasks/edit/' . $projectId . '/' . $ganttId); ?>" class="btn">Retour</a>
							
								</form>
							
							</div>
							<!-- ./tab : date -->
	
							<!-- tab : previousDate -->
							<div class="tab-pane" id="previousDate">
							
								<form method="post">
								
									<input type="hidden" value="previous" name="form" />
									
									<h5>Durée de le tache</h5>
										
									<input type="text" name="inputDuration" value="<?= set_value('inputDuration');?>" />
									<select name="inputUnity">
										<option value="1">heures</option>
										<option value="2">jours</option>
									</select>
									
									<h5>Taches précédentes</h5>
									
									<?php
									if(!empty($tasks))
									{
									?>
									<table class="table table-striped table-hover">
										<tbody>
											<?php
												foreach($tasks as $v)
												{
												?>
												<tr>
													<td><input type="checkbox" name="tasks[]" value="<?= $v['id']; ?>"/></td>
												    <td><?= $v['name']; ?></td>
												</tr>										
												<?php
												}
											?>
										</tbody>
									</table>
									<?php
									}
									else
									{
									?>
									<p>Aucune tache n'est actuellement répertorier pour ce diagramme.</p>
									<?php
									}
									?>
									
									<hr />
							
									<button type="submit" class="btn btn-primary">Etape suivante</button>
									<a href="<?= site_url('tasks/edit/' . $projectId . '/' . $ganttId); ?>" class="btn">Retour</a>
							
								</form>
							
							</div>
							<!-- ./tab : previousDate -->
							
						</div>
						<!-- ./tab-content -->
						
					</div>
				</div>
				
			</div>
			<!-- ./contenu -->
			
		</div>
		<!-- ./row-fluid -->

	</div>
	<!-- ./wrapper -->
	
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
