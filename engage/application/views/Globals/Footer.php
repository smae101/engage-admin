	<!--HTML Footer Part -->
	<footer class="footer">
        <div class="container" style="">
        	<div class="row">
	            ENGAGE &copy; 2016
        	</div>
        </div>
	</footer>
	<script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
	<?php if(isset($allow_date_picker) && $allow_date_picker == TRUE){
		?>
		<script src="<?php echo base_url("assets/js/bootstrap-datepicker.js");?>"></script>
		<?php
	}
	?>
	<!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/Tables/bootstrap.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/js/Tables/metisMenu.min.js')?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/js/Tables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/Tables/dataTables.bootstrap.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
	</body>
</html>