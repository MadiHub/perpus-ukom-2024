    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url() ?>admin/dist/vendors/chart.js/js/chart.min.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?= base_url() ?>admin/dist/js/main.js"></script>
    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
    <script>
		$(function() {
			<?php if (session()->has("success")) { ?>
				Swal.fire({
					icon: 'success',
					title: 'Berhasil Login',
					text: '<?= session("success") ?>'
				})
			<?php } ?>
		});
	</script>
  
   
  </body>
</html>