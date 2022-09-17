
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card demo-icons">
              <div class="card-header">
                 </div>
              <div class="card-body all-icons">

              <div class="card">
        <div class="card-header">
            <h3>Data Testimoni</h3>
        </div>
        <div class="card-footer">
            <a href="<?= site_url('testimoni/tambah') ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i>Tambah Testimoni
            </a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Peran</th>
                        <th>Testimoni</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($testimoni as $t) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $t->nama ?></td>
                            <td><?= $t->peran ?></td>
                            <td><?= $t->testimoni ?></td>
                            <td>
                                <a href="<?= site_url("testimoni/ubah/$t->id_testimoni") ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" data-id="<?= $t->id_testimoni ?>" class="btn btn-danger btn-sm btn-delete-testimoni">
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
    <form id="form-delete" method="post" action="<?= site_url('testimoni/delete') ?>">

    </form>
                <div id="icons-wrapper">
                 
                     
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          
          </div>
        </div>
      </footer>
    </div>
  </div>