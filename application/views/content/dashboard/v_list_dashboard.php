<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/topbar'); ?>
<body>


	<section class="slider_section>">
		<div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="first-slide" src="<?= base_url('assets/images/bannerfirst.png') ?>" alt="First slide">
					<div class="container">
						<div class="carousel-caption relative">
							<h1>SMA Sanjaya XIV Nanggulan(LOGO)</h1>
							<p></p>
							<a href="Javascript:void(0)">Read More</a>
						</div>
					</div>
				</div>
				<?php
				$no = 1;
				foreach ($fasilitas as $f) {
				?>
				<div class="carousel-item">
					<img class="second-slide" src="<?php echo base_url();?>upload/<?php echo $f->gambar_fasilitas?>" alt="Second slide">
					<div class="container">
						<div class="carousel-caption relative">
							<h1>Basic template</h1>
							<p>It is a long established fact that a reader will be distracted by the readable content of a
								page when looking at its layout. The point of using Lorem Ipsum is that it has a
								more-or-less normal distribution of letters, as opposed to using 'Content here, content
								here', making it look like readable English. Many desktop publishing packages and </p>
							<a href="Javascript:void(0)">Read More</a>
						</div>
					</div>
				</div>
					<?php
				}
				?>
			</div>
			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<i class='fa fa-angle-left'></i>
			</a>
			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<i class='fa fa-angle-right'></i>
			</a>
			<a class="bottom_arrow_scroll" href="#about"><img src="<?= base_url('assets/icon/errow.png') ?>"/></a>
		</div>
	</section>

</body>

</html>
<script>
    $(function() {
        let idStaff = 0
        $(".btn-delete-staff").on("click", function() {
            idStaff = $(this).data("id");
            console.log(idStaff);
            $("#modal-confirm-delete").modal('show');
        });
        $("#btn-delete").on("click", function() {
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
