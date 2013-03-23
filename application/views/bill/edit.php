  
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
			
				<p class="lead">Factures / Facture1</p>
			
				<div class="box">
					<div class="title">
					
						<div class="row-fluid">
							<div class="span6" style="border:solid #414141 1px; padding:15px 15px 0px 15px;">
								<address>
									<strong>Twitter, Inc.</strong><br>
									795 Folsom Ave, Suite 600<br />
									San Francisco, CA 94107<br /><br />
									
									<abbr title="Telephone">P:</abbr> (123) 456-7890<br />
									<abbr title="Email">T:</abbr> contact@alwin.fr
								</address>
							</div>
							<div class="span6" style="border:solid #414141 1px; padding:15px 15px 0px 15px;">
								<address>
									<strong>Twitter, Inc.</strong><br>
									795 Folsom Ave, Suite 600<br />
									San Francisco, CA 94107<br /><br />
									
									<abbr title="Telephone">P:</abbr> (123) 456-7890<br />
									<abbr title="Email">T:</abbr> contact@alwin.fr
								</address>
							</div>
						</div>
						
						<br />
						
						<div class="row-fluid">
					
			            <table class="table table-bordered">
							<thead>
								<tr>
									<th>Description</th>
									<th>Quantité</th>
									<th>Prix unitaire</th>
									<!--<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Username</th>-->
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><strong>Réalisation d'un site statique de présentation produit (dont) :</strong></td>
									<td rowspan="2">1</td>
									<td rowspan="2">120€</td>
								</tr>
								<tr>
									<td>Realisation d'un site vitrine composé de :
										<ul>
											<li>Page d'accueil</li>
											<li>Mentions légales</li>
											<li>Fonctionnement et Comment ça marche</li>
											<li>Usage et comment en profiter</li>
											<li>Options</li>
											<li>Page de contact</li>
											<li>FAQ</li>
										</ul>
									</td>
								</tr>
							</tbody>
						</table>
						
						</div>

						<a class="btn"><i class="icon-download"></i>Télécharger</a>

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
