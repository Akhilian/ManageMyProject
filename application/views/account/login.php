  
  	<!--[START] wrapper -->
  	<div id="wrapper" class="container wrapper">
  
		<!--[START] content -->
		<div class="row-fluid">
			
			<div class="span4 logo">
				<img src="<?= base_url(); ?>img/logo1.png" align="ManageMyProject" />
			</div>
			
			<div class="span8">
				
				<?php echo validation_errors(); ?>
				
				<form action="<?= site_url('account/login'); ?>" method="post">

					<div class="control-group">
						<div class="controls">
							<p class="lead">Connexion</p>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input type="text" name="inputEmail" id="inputEmail" placeholder="Votre adresse email" value="<?= set_value('inputEmail'); ?>">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="inputPassword">Mot de passe</label>
						<div class="controls">
							<input type="password" name="inputPassword" id="inputPassword" placeholder="Votre mot de passe">
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn">M'inscrire</button>
						</div>
					</div>
										
				</form>
			
				<a href="<?php echo site_url('account/register');?>">Je ne suis pas inscrit.</a>


			</div>
			
		<!--[END] content -->
		</div>
		
	<!--[END] wrapper -->
	</div>
