<html>

<head>
    <title>Form Ubah Staff</title>
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
            <h3>Form Ubah Staff</h3>
        </div>
        <div class="card-body">
            <form id="form-update-staff" method="post" action="<?= site_url('staff/update') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input require type="text" value="<?= $staff->nama_staff?>" class="form-control" name="nama_staff">
                </div>
                <div class="form-group">
                    <label class="form-label">Jabatan</label>
                    <input require type="text" value="<?= $staff->jabatan?>" class="form-control" name="jabatan">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" value="<?= $staff->foto?>" type="file" id="formFile" name="foto">
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <input require type="text" value="<?= $staff->deskripsi?>" class="form-control" name="deskripsi">
                </div>
                <input type="hidden" name="id_staff" value="<?= $staff->id_staff ?>">
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-update-staff" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('staff') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(function (){
        $("#btn-update-staff").on("click", function() {
           
                $("#form-update-staff").submit()
        })
    })
</script>