<!-- footer start-->
<footer class="footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 footer-copyright text-center">
							<p class="mb-0">Copyright <?= date('Y'); ?> Desa Xyz </p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>


	<!-- latest jquery-->
	<script src="<?php echo base_url() ?>assets/frontend/js/datepicker/date-time-picker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js">
	</script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datepicker/date-time-picker/datetimepicker.custom.js">
	</script>
	<!-- Bootstrap js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/bootstrap/bootstrap.bundle.min.js"></script>
	<!-- feather icon js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/icons/feather-icon/feather.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/icons/feather-icon/feather-icon.js"></script>
	<!-- scrollbar js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/scrollbar/simplebar.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/scrollbar/custom.js"></script>
	<!-- Sidebar jquery-->
	<script src="<?php echo base_url() ?>assets/frontend/js/config.js"></script>
	<!-- Plugins JS start-->
	<script src="<?php echo base_url() ?>assets/frontend/js/sidebar-menu.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datatable/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/datatable/datatables/datatable.custom.js"></script>
	<script src="<?php echo base_url() ?>assets/frontend/js/tooltip-init.js"></script>
	<!-- Plugins JS Ends-->
	<!-- Theme js-->
	<script src="<?php echo base_url() ?>assets/frontend/js/script.js"></script>

	<!-- Dashboard JS-->
	<script src="<?= base_url('assets/frontend/js/chart/chartist/chartist.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/chartist/chartist-plugin-tooltip.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/knob/knob.min.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/knob/knob-chart.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/apex-chart/apex-chart.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/chart/apex-chart/stock-prices.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/dashboard/default.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/datepicker/date-picker/datepicker.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/datepicker/date-picker/datepicker.en.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/datepicker/date-picker/datepicker.custom.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead/handlebars.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead/typeahead.bundle.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead/typeahead.custom.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead-search/handlebars.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/typeahead-search/typeahead-custom.js'); ?>"></script>
	<script src="<?= base_url('assets/frontend/js/tooltip-init.js'); ?>"></script>

</body>

<script>
	// ***************** ALERT **********************//////////////
	window.setTimeout(function () {
		$(".alert").fadeTo(500, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 5000);

</script>

</html>
