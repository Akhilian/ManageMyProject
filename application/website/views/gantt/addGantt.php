 
 	<div id="wrapper" class="container wrapper">

		<div class="row-fluid">
		
			<div class="span4" style="text-align:right;">
				<img src="<?= base_url(); ?>img/task.png" alt="New task" />
			</div>
			
			<div class="span8">
			
				<?= validation_errors(); ?>
			
				<div class="box">
			
					<div class="title">
						<p class="lead">Ajouter un diagramme de Gantt</p>
					
						<form method="post" action="<?= site_url('gantt/add/' . $id); ?>">
							<div class="control-group">
								<label class="control-label" for="inputName">Intitulé du diagramme</label>
								<div class="controls">
									<input type="text" id="inputName" name="inputName" placeholder="Intitulé" style="width:98%;">
								</div>
							</div>
						
							<div class="control-group">
								<div class="controls">
									<input type="submit" name="" value="Ajouter" class="btn btn-primary" />
									<a class="btn" href="<?= site_url('gantt/index/' . $id); ?>">Annuler</a>
								</div>
							</div>
						
						</form>
					
					</div>
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
