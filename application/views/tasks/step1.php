  
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
						<p class="lead">Ajouter une tache / Etape 1 (sur 3)<hr /></p>
						
						<form method="post">
							
							<label for="inputTitle">Intitulé de la tâche *</label>
							<input type="text" name="inputTitle" placeholder="Intitulé" value="<?= set_value('inputTitle'); ?>">
							
							<label for="inputDescription">Description : </label>
							<div class="editor">
								<textarea name="inputDescription" id="ckeditor"><?= set_value('inputDescription'); ?></textarea>
							</div>
							
								
							<label for="inputCateg">Categories : </label>
							<select name="inputCateg">
							<?php
							
							function displayCategory(array $sub, $lvl = '') {
								
								if($lvl == '')
									$lvl = 0;
								
								$sep = '';
								
								for($i = 0; $i < $lvl; $i++)
									$sep .= '-';
								
								foreach($sub as $k => $v) {

								?>
									<option value="<?= $k ?>"><?= $sep. ' ' .$v['name']; ?></option>
								<?php
								
									if( isset($v['children']) )
									{
										displayCategory($v['children'], $lvl+1);
									}
								
								}
							}
							
							displayCategory($category);
							
							?>
							</select>
							
							<br />
							<button type="submit" class="btn btn-primary">Etape suivante</button>
							<a href="<?= site_url('tasks/edit/' . $projectId . '/' . $ganttId); ?>" class="btn">Retour</a>
							
						</form>
						
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
