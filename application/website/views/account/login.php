  
  	<!--[START] wrapper -->
  	<div id="wrapper" class="container wrapper">
  
		<!--[START] content -->
		<div class="row-fluid">
			
			<div class="span4 logo">
				<a href="<?php echo site_url('/'); ?>"><img src="<?= base_url('img/logo1.png'); ?>" align="ManageMyProject" /></a>
			</div>
			


			<div class="span8">

				<?php echo validation_errors(); ?>

				<div class="box">
					<div class="title">
						<p class="lead">Connexion</p>
						<hr />

						<form action="<?= site_url('account/login'); ?>" method="post">

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
								<div class="controls row-fluid">
									<div class="span6"><a class="btn btn-primary" href="<?php echo site_url('github/register'); ?>">Connect with GitHub</a></div>
									<div class="span6"><button type="submit" class="btn">M'inscrire</button></div>
									
								</div>
							</div>

						</form>

					</div>
				</div>
			
				<a href="<?php echo site_url('account/register');?>">Je ne suis pas inscrit.</a>


			</div>
			
		<!--[END] content -->
		</div>
		
	<!--[END] wrapper -->
	</div>
