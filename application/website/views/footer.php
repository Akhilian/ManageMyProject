
	<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>js/bootstrap-datepicker.js"></script>
	
	<script src="<?= base_url('js/jquery-latest.js'); ?>"></script>
	<script src="<?= base_url(); ?>js/jquery-ui-1.10.1.custom.min.js"></script>
	
	<!-- D3.js - Drawing library -->
	<!--
	<script type="text/javascript" src="<?php echo base_url('js/d3.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/d3.pert.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/pert.js'); ?>"></script>
	-->

	<style type="text/css">
svg:not(.active):not(.ctrl) {
  cursor: crosshair;
}

path.link {
  fill: none;
  stroke: #FFF;
  stroke-width: 4px;
  cursor: default;
}

svg:not(.active):not(.ctrl) path.link {
  cursor: pointer;
}

path.link.selected {
  stroke-dasharray: 10,2;
}

path.link.dragline {
  pointer-events: none;
}

path.link.hidden {
  stroke-width: 0;
}

circle.node {
  stroke-width: 1.5px;
  cursor: pointer;
}

circle.node.reflexive {
  stroke: #000 !important;
  stroke-width: 2.5px;
}

text {
  font: 12px sans-serif;
  pointer-events: none;
}

text.id {
  text-anchor: middle;
  font-weight: bold;
}
	</style>

	<?php
		if(isset($js)) {
			foreach($js as $v) {
				echo '<script src="' . base_url(). 'js/' . $v . '.js"></script>';
			}
		}
	?>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
	
		$('.ico').tooltip();
		$('.pop').popover(
			{
				trigger : 'hover',
				title : 'Description',
			}
		);
	</script>
	
  </body>
</html>