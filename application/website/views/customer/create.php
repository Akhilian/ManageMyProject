  
  	<div id="wrapper" class="container wrapper">

		<?= validation_errors(); ?>

		<div class="box">
			<div class="title">
			
				<form method="post" action="<?= site_url('customer/add'); ?>">
				
					<p class="lead">Nouveau fichier client</p>
					
					<div class="control-group">	
						<label class="control-label" for="customerName">Nom / Raison sociale *</label>
						<div class="controls">
							<input type="text" name="customerName" id="customerName" placeholder="Nom / Raison sociale"  value="<?= set_value('customerName'); ?>"/>
						</div>
					</div>
					
					<div class="control-group">	
						<label class="control-label" for="customerEmail">Adresse email *</label>
						<div class="controls">
							<input type="text" name="customerEmail" id="customerEmail" placeholder="Adresse email"  value="<?= set_value('customerEmail'); ?>"/>
						</div>
					</div>
					
					<div class="control-group">	
						<label class="control-label" for="customerPhone">Téléphone</label>
						<div class="controls">
							<input type="text" name="customerPhone" id="customerPhone" placeholder="Téléphone"  value="<?= set_value('customerPhone'); ?>"/>
						</div>
					</div>
					
					<div class="control-group">	
						<label class="control-label" for="customerStreet">Adresse *</label>
						<div class="controls">
						
						<input type="text" name="customerStreet" id="customerStreet" placeholder="Adresse"  value="<?= set_value('customerStreet'); ?>" style="width:50%;"/><br />
						<input type="text" name="customerZip" id="customerZip" placeholder="Code postal"  value="<?= set_value('customerZip'); ?>"/>
						<input type="text" name="customerCity" id="customerCity" placeholder="Ville"  value="<?= set_value('customerCity'); ?>" style="width:30%;"/>

						</div>
					</div>
					
					

					<div class="control-group">
						<div class="controls">
				    		<button type="submit" class="btn btn-primary">Enregistrer</button>
				    		<a href="<?= site_url('project/create'); ?>" class="btn">Retour</a>
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
