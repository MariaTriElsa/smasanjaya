<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('layout/header'); ?>
<body>
<?php $this->load->view('layout/topbar'); ?>
<div id="screenshot" class="Screenshot">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="titlepage">
					<h3>Unduh Berkas</h3>
				</div>
			</div>
		</div>
	</div>
<div class="content">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Berkas</th>
                        <th>Unduh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($berkas as $b) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b->nama_berkas?></td>
                            <td><?= $b->kategori ?></td>
							<td><?= $b->file_berkas ?></td>
							<td>
								<a class="btn btn-sm btn-primary text-white"
								   href="<?= base_url('upload/' . $b->file_berkas) ?>" download="<?= $b->nama_berkas ?>">
									<i class="fa fa-download"></i>
								</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
	<div class="card-footer">
	</div>
    </div>
    <div class="modal" id="modal-confirm-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Anda Yakin Hapus data ini?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <form id="form-delete" method="post" action="<?= site_url('berkas/delete') ?>">

    </form>
</div>
</body>
<?php $this->load->view('layout/footer');?>
</html>
<script>
    $(function() {
        let idFasilitas = 0
        $(".btn-delete-berkas").on("click", function() {
            idFasilitas = $(this).data("id");
            console.log(idFasilitas);
            $("#modal-confirm-delete").modal('show');
        });
        $("#btn-delete").on("click", function() {
            //panggil url untuk hapus data
            let inputId = $("<input>")
                .attr("type", "hidden")
                .attr("name", "id_berkas")
                .val(idFasilitas);
            let formDelete = $("#form-delete");
            formDelete.empty().append(inputId);
            formDelete.submit();
            $("#modal-confirm-delete").modal('hide');
        });
    })
</script>

