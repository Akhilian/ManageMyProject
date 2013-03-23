
	<script src="<?= base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="<?= base_url(); ?>ckeditor/ckeditor.js"></script>
	<script src="<?= base_url(); ?>js/bootstrap-datepicker.js"></script>
	
	<script src="<?= base_url(); ?>js/gantt.js"></script>
	
	<?php
		if(isset($js)) {
			foreach($js as $v) {
				echo '<script src="' . base_url(). 'js/' . $v . '.js"></script>';
			}
		}
	?>
		
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