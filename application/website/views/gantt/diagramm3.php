
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
				
<div id="diagramWrapper">
</div>