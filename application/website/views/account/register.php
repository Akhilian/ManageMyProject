
  	<!--[START] wrapper -->
  	<div id="wrapper" class="container wrapper">
  
		<!--[START] content -->
		<div class="row-fluid">
			
			<div class="span4 logo">
				<a href="<?php echo site_url('/'); ?>">
					<img src="<?= base_url('img/logo1.png'); ?>" align="ManageMyProject" />
				</a>
			</div>

			<div class="span8 padding-right padding-top">

				<?php echo validation_errors(); ?>

				<div class="box" id="slide1">

					<div class="title" >

						<form  action="<?= site_url('account/register'); ?>" method="post" style="margin-bottom:0px;">

							<div class="control-group">
								<div class="controls">
									<p class="lead">Inscription</p>
									<hr />
									<p>En remplissant le formulaire ci-dessous, vous reconnaissez avoir lu et compris les <a href="<?= site_url('infos/EULA'); ?>">conditions
									 générales d'utilisation</a> et pouvez ainsi profiter de l'ensemble des outils mis à votre disposition.</p>
								</div>
							</div>

							<div class="control-group">

								<label class="control-label" for="inputEmail">Email</label>
								<div class="controls">
									<input type="text" name="inputEmail" id="inputEmail" placeholder="Votre adresse email" value="<?= set_value('inputEmail'); ?>">
								</div>

								<label class="control-label" for="inputPassword">Mot de passe</label>
								<div class="controls">
									<input type="password" name="inputPassword" id="inputPassword" placeholder="Votre mot de passe">
								</div>

							</div>
							
								<div class="controls">
									<button id="register" type="submit" class="btn btn-primary">M'inscrire</button>
								</div>
												
						</form>

					</div>	
				</div>


			</div>
			
			
		<!--[END] content -->
		</div>
		
	<!--[END] wrapper -->
	</div>

