<html>

<head>
    <title>Form Ubah About Us</title>
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
            <h3>Form Ubah About Us</h3>
        </div>
        <div class="card-body">
            <form id="form-update-aboutus" method="post" action="<?= site_url('aboutus/update') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input require type="text" value="<?= $aboutus->nama?>" class="form-control" name="nama" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Logo</label>
					<input value="<?= $aboutus->logo?>" type="hidden" id="formFile" name="logo">
                    <input class="form-control" value="<?= $aboutus->logo?>" type="file" id="formFile" name="logo">
                </div>
                <div class="form-group">
                    <label class="form-label">Visi</label>
                    <input require type="text" value="<?= $aboutus->visi?>" class="form-control" name="visi" placeholder="Visi">
                </div>
                <div class="form-group">
                    <label class="form-label">Misi</label>
                    <input require type="text" value="<?= $aboutus->misi?>" class="form-control" name="misi" placeholder="Misi">
                </div>
                <div class="form-group">
                    <label class="form-label">Sejarah</label>
                    <input require type="text" value="<?= $aboutus->sejarah?>" class="form-control" name="sejarah" placeholder="Sejarah">
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <input require type="text" value="<?= $aboutus->alamat?>" class="form-control" name="alamat" placeholder="Alamat">
                </div>
<<<<<<< HEAD
                <input type="hidden" name="id_aboutus" value="<?= $aboutus->id ?>">
=======
                <div class="form-group">
                    <label class="form-label">Kontak</label>
                    <input require type="text" value="<?= $aboutus->kontak?>" class="form-control" name="kontak" placeholder="Kontak">
                </div>
                <input type="hidden" name="id" value="<?= $aboutus->id?>">
>>>>>>> a59bcc48bf5041e8af9e95e56623082d3ba38014
            </form>
        </div>
        <div class="card-footer">
            <button type="button" id="btn-update-aboutus" class="btn btn-success btn-sm">
                <i class="fa fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('aboutus') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-reply"></i> Kembali
            </a>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(function (){
        $("#btn-update-aboutus").on("click", function() {
           
                $("#form-update-aboutus").submit()
        })
    })
</script>
