<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/topbar'); ?>
<body>
<div id="screenshot" class="Screenshot">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="titlepage">
					<h3>Staff</h3>
				</div>
			</div>
		</div>
	</div>
	<div id="blog" class="blog">
		<div class="container">
			<div class="row">
			</div>
			<div class="row">
				<?php foreach ($staff as $s): ?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="blog-box">
									<div style="text-align: center;">
										<figure>
											<a href="<?= base_url('upload/' . $s->foto) ?>" download="fff">
												<img src="<?= base_url('upload/' . $s->foto) ?>" alt="#"
													 class="rounded img-bordered img-fluid">
											</a>
										</figure>
									</div>
									<div class="travel">
										<div class="text-center"><h4><?= $s->nama_staff ?></h4></div>
										<hr>
										<div class="text-center"><?= $s->jabatan ?></div>
									</div>
								</div>
							</div>
						</div>
						<br>
					</div>

				<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>

</body>

</html>
<script>
	$(function () {
		let idStaff = 0
		$(".btn-delete-staff").on("click", function () {
			idStaff = $(this).data("id");
			console.log(idStaff);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function () {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_staff")
				.val(idStaff);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
<?php $this->load->view('layout/footer'); ?>
