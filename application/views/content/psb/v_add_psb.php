<html>

<head>
    <title>Form Tambah PSB</title>
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
            <h3>Form Tambah PSB</h3>
        </div>
        <div class="card-body">
            <form id="form-tambah-psb" method="post" action="<?= site_url('psb/insert') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Tahun</label>
                    <input require type="number" class="form-control" name="tahun" placeholder="Tahun">
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea require type="" class="form-control" name="deskripsi_psb" placeholder="Deskripsi"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar</label>
                    <input class="form-control" type="file" id="formFile" name="gambar_psb" placeholder="Gambar">
                </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-save-psb" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('psb') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
</div>
</body>

</html>

<script>
    $(function (){
        $("#btn-save-psb").on("click", function() {
                $("#form-tambah-psb").submit()
        })
    })
</script>