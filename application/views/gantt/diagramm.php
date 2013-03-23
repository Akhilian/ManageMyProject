	<style>
	
		th {
			text-align: center;
		}
		
		td {
			border: 1px solid #FFFFFF;
		}
		
		td:hover {
			background-color: white;
			color: black;
		}
		
		.progress {
			margin: 5px;
		}
		
	</style>

	<!--[START] wrapper -->
	<div id="wrapper">

		<div class="row-fluid">
			<div class="span3"></div>
		
			<div class="span9 box">ICI</div>
		</div>	

		<div style="margin-top:100px;">
			
			<div class="row-fluid">
				<div class="span2">Task #1</div>
				<div class="span10">
					<div class="progress progress-striped task" style="width:400px;">
						<div class="bar" style="width: 50%;"></div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span2">Task #2</div>
				<div class="span10">
					<div class="progress progress-striped progress-info task" style="width:320px;">
						<div class="bar" style="width: 100%;"></div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span2">Task #3</div>
				<div class="span10">
					<div class="progress progress-striped progress-success task" style="width:120px;">
						<div class="bar" style="width: 100%;"></div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span2">Task #4</div>
				<div class="span10">
					<div class="progress progress-striped progress-warning task" style="width:200px;">
						<div class="bar" style="width: 100%;"></div>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span2">Task #5</div>
				<div class="span10">
					<div class="progress progress-striped progress-danger task" style="width:160px;">
						<div class="bar" style="width: 100%;"></div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="container" style="margin-top:100px;">
		
		
		<!--
		<div class="row-fluid">
			<div class="span3">Tasks</div>
			<div class="span9" style="overflow:scroll;">
			
				<table class="table">
					<thead>
						<tr>
							<th colspan="30">Mars</th>
							<th colspan="30">Avril</th>
							<th colspan="30">Mai</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td>' . $i . '</td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td>' . $i . '</td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td>' . $i . '</td>';
							}
							?>
						</tr>
						
						<tr>
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
						</tr>
						
						<tr>
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
						</tr>
						
						<tr>
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
						</tr>
						
						<tr>
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
							
							<?php
							for($i = 1; $i < 30; $i++)
							{
								echo '<td></td>';
							}
							?>
						</tr>
					</tbody>
				</table>
			
			</div>
		</div>
		-->
		
		
	</div>
	<!--[END] wrapper -->
	
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
