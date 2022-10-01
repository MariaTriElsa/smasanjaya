<footer>
	<!-- Javascript files-->
	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery-3.0.0.min.js') ?>"></script>

	<script src="<?= base_url('assets/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugin.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>
	<script>
		$(document).ready(function () {
			$(".fancybox").fancybox({
				openEffect: "none",
				closeEffect: "none"
			});

			$(".zoom").hover(function () {

				$(this).addClass('transition');
			}, function () {

				$(this).removeClass('transition');
			});
		});

	</script>
</footer>
