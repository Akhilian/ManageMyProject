  
  	<div id="wrapper" class="container wrapper">

		<?= validation_errors(); ?>

		<div class="box">
			<div class="title">
			
				<form method="post" action="<?= site_url('project/create'); ?>">
				
					<p class="lead">Creer un nouveau projet</p>
					
					<div class="control-group">	
						<label class="control-label" for="projectName">Nom du projet</label>
						<div class="controls">
							<input type="text" name="projectName" id="projectName" placeholder="Nom du projet"  value="<?= set_value('projectName'); ?>"/>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="projectDescription">Description du projet</label>
						<div class="controls">
							<textarea id="projectDescription" name="projectDescription" placeholder="Description"><?= set_value('projectDescription'); ?></textarea>
						</div>
					</div>
					
					<?php
					if(count($customers) > 0)
					{
					?>
						<div class="control-group">
						<label class="control-label" for="projectClient">Commanditaire</label>
						<div class="controls">
						
							<?php

								echo '
								<select name="projectClient">
								<optgroup label="Liste des clients">';

								foreach($customers as $k)
								{
									echo '<option value="' . $k['id'] . '">' . $k['name'] . '</option>';
								}

								echo '</optgroup>
								</select>';
							?>
							
							
						</div>
					</div>
					<?php
					}
					
					echo '<a href="' . site_url('customer/add'). '" class="btn">Créer un ficher client</a><br /><br />';
					?>

					<div class="control-group">
						<div class="controls">
				    		<button type="submit" class="btn btn-primary">Sauvegarder</button>
				    		<a href="<?= site_url('home'); ?>" class="btn">Annuler</a>
					    </div>
					</div>
				
				</form>
				
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
