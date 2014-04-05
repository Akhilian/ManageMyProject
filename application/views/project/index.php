
  	<div id="wrapper" class="container wrapper">
  
		<div class="row-fluid">
			
			<div class="span4">
			
			<?php
				
			for($i = 0; $i < count($projects); $i +=3) {
						
			echo '<div class="box">
				<div class="title">
					<h1>'.$projects[$i]['name'].'</h1>
				</div>
					
				<div class="thumb">
					<a href="#" class="pop" style="float:left;"
						rel="popover" data-placement="right" data-content=" ' . $projects[$i]['description'] . ' ">
						<i class="icon-info-sign"></i>
					</a>
					
					<a href=" ' . site_url('project/staff/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Gerer l\'équipe">
						<i class="icon-user"></i>
					</a>
					<a href=" ' . site_url('project/edit/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Editer"><i class="icon-pencil"></i></a>
					<a href=" ' . site_url('project/delete/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Supprimer"><i class="icon-trash"></i></a>
				</div>
			</div>';
				
			}
			
			if(count($projects)%3 == 0 && count($projects) < 9)
			{
			
			echo '<a href=" ' . site_url('project/create') . ' ">
					<div class="new-box">
						<div class="title"><h1>Ajouter<br />un projet</h1></div>
					</div>
				</a>';
			
			}	
			?>
			
			
			

			</div>
			<div class="span4">

			<?php
				
			for($i = 1; $i < count($projects); $i +=3) {
						
		echo '<div class="box">
			<div class="title">
				<h1>'.$projects[$i]['name'].'</h1>
			</div>
					
			<div class="thumb">
				<a href="#" class="pop" style="float:left;"
					rel="popover" data-placement="right" data-content=" ' . $projects[$i]['description'] . ' ">
					<i class="icon-info-sign"></i>
				</a>

				<a href=" ' . site_url('project/staff/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Gerer l\'équipe"><i class="icon-user"></i></a>
				<a href=" ' . site_url('project/edit/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Editer"><i class="icon-pencil"></i></a>
				<a href=" ' . site_url('project/delete/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Supprimer"><i class="icon-trash"></i></a>
			</div>
		</div>';
				
			}
			
			if(count($projects)%3 == 1)
			{
			
			echo '<a href=" ' . site_url('project/create') . ' ">
					<div class="new-box">
						<div class="title"><h1>Ajouter<br />un projet</h1></div>
					</div>
				</a>';
			
			}
				
			?>
			
			</div>
			<div class="span4">
			
			<?php
				
			for($i = 2; $i < count($projects); $i +=3) {
						
			echo '<div class="box">
				<div class="title">
					<h1>'.$projects[$i]['name'].'</h1>
				</div>
					
				<div class="thumb">
					<a href="#" class="pop" style="float:left;"
						rel="popover" data-placement="right" data-content=" ' . $projects[$i]['description'] . ' ">
						<i class="icon-info-sign"></i>
					</a>
				
					<a href=" ' . site_url('project/staff/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Gerer l\'équipe">
						<i class="icon-user"></i>
					</a>
					<a href=" ' . site_url('project/edit/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Editer"><i class="icon-pencil"></i></a>
					<a href=" ' . site_url('project/delete/' . $projects[$i]['id']) . ' " class="ico" rel="tooltip" title="Supprimer"><i class="icon-trash"></i></a>
				</div>
			</div>';
				
			}
			
			if(count($projects)%3 == 2)
			{
			
			echo '<a href=" ' . site_url('project/create') . ' ">
					<div class="new-box">
						<div class="title"><h1>Ajouter<br />un projet</h1></div>
					</div>
				</a>';
			
			}
				
			?>
			
			</div>
			
		</div>
		
	</div>
	
	<div class="navbar navbar-fixed-bottom">
		<div class="navbar-inner">
			<ul class="nav">
      			<li class="active"><a href="#">Accueil</a></li>
      			<li><a href="<?= site_url('account/manage'); ?>">Mon compte</a></li>
				<li><a href="<?= site_url('account/logout'); ?>">Deconnexion</a></li>
			</ul>
		</div>
	</div>
