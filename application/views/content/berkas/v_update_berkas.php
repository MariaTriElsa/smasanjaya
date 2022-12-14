<html>

<head>
    <title>Form Ubah Berkas</title>
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
            <h3>Form Ubah Berkas</h3>
        </div>
        <div class="card-body">
            <form id="form-update-berkas" method="post" action="<?= site_url('berkas/update') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input require type="text" value="<?= $berkas->nama_berkas?>" class="form-control" name="nama_berkas" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <input require type="text" value="<?= $berkas->kategori?>" class="form-control" name="kategori" placeholder="Kategori">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">File</label>
                    <input class="form-control" value="<?= $berkas->file_berkas?>" type="file" id="formFile" name="file_berkas">
                </div>
                <input type="hidden" name="id_berkas" value="<?= $berkas->id_berkas ?>">
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-update-berkas" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('berkas') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(function (){
        $("#btn-update-berkas").on("click", function() {
           
                $("#form-update-berkas").submit()
        })
    })
</script>
