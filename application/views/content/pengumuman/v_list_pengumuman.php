<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Testimoni</title>
    <!-- CSS only CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- JQuery and Javascript CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
    <!-- JQuery Validation CDN -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <!-- JQuery and Javascript CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
    <!-- JQuery Validation CDN -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Data Pengumuman</h3>
        </div>
        <div class="card-footer">
            <a href="<?= site_url('pengumuman/tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i>Tambah Pengumuman
            </a>
        </div>
        <div class="card-body">
			<div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
						<th>Tanggal</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pengumuman as $p) {
                    ?>
                        <tr class="text-nowrap">
                            <td><?= $no++ ?></td>
                            <td><?= $p->nama?></td>
                            <td><?= $p->deskripsi?></td>
							<td><?= $p->tanggal?></td>
                            <td><?php echo $p->file?></td>
                            <td>
                            <a class="btn btn-sm btn-primary text-white"
								   href="<?= base_url('upload/'. $p->file)?>" download="<?= $p->nama?>">
									<i class="fa fa-download"></i>
								</a>
                                <a href="<?= site_url("pengumuman/ubah/$p->id_pengumuman") ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" data-id="<?= $p->id_pengumuman ?>" class="btn btn-danger btn-sm btn-delete-pengumuman">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
			</div>
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
</div>
    <form id="form-delete" method="post" action="<?= site_url('pengumuman/delete') ?>">

    </form>
</body>

</html>
<script>
    $(function() {
        let idBerita = 0
        $(".btn-delete-pengumuman").on("click", function() {
            idBerita = $(this).data("id");
            console.log(idBerita);
            $("#modal-confirm-delete").modal('show');
        });
        $("#btn-delete").on("click", function() {
            //panggil url untuk hapus data
            let inputId = $("<input>")
                .attr("type", "hidden")
                .attr("name", "id_pengumuman")
                .val(idBerita);
            let formDelete = $("#form-delete");
            formDelete.empty().append(inputId);
            formDelete.submit();
            $("#modal-confirm-delete").modal('hide');
        });
    })
</script>
