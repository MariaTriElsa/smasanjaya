<html>

<head>
    <title>Form Ubah Berita</title>
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
</head>

<body>
    <div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Form Ubah Berita</h3>
        </div>
        <div class="card-body">
            <form id="form-update-berita" method="post" action="<?= site_url('berita/update') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input require type="text" value="<?= $berita->nama_berita?>" class="form-control" name="nama_berita" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <input require type="text" value="<?= $berita->deskripsi_berita?>" class="form-control" name="deskripsi_berita" placeholder="Deskripsi">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" value="<?= $berita->gambar_berita?>" type="file" id="formFile" name="gambar_berita">
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal</label>
                    <input require type="date" class="form-control" value="<?= date('Y-m-d')?> name="tanggal" placeholder="Tanggal">
                </div>
                <input type="hidden" name="id_berita" value="<?= $berita->id_berita?>">
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-update-berita" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('berita') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(function (){
        $("#btn-update-berita").on("click", function() {
           
                $("#form-update-berita").submit()
        })
    })
</script>