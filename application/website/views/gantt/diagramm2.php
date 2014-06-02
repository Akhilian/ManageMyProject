
</style>

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
				
<div class="gantt"></div>

<script>

$(function() {

	"use strict";

	$(".gantt").gantt({
		source: [{
			name: "Sprint 0",
			desc: "Analysis",
			values: [{
				from: "/Date(1320192000000)/",
				to: "/Date(1322401600000)/",
				label: "Requirement Gathering", 
				customClass: "ganttRed"
			}]
		},{
			name: " ",
			desc: "Scoping",
			values: [{
				from: "/Date(1322611200000)/",
				to: "/Date(1323302400000)/",
				label: "Scoping", 
				customClass: "ganttRed"
			}]
		},{
			name: "Sprint 1",
			desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
</html>




