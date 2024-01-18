
    
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
            <button type="button" class="btn btn-primary mb-3" style="width: 200px"data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kategori
            </button>
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($semua_kategori_buku as $k_buku): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k_buku['nama_kategori_buku'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success mr-2" id="btn-edit-k-buku"
                                            data-bs-toggle="modal"  data-bs-target="#editKBuku"
                                            data-id_kategori_buku="<?= $k_buku['id_kategori_buku'] ?>"
                                            data-nama_kategori_buku="<?= $k_buku['nama_kategori_buku'] ?>"
                                            > EDIT
                                        </button>
                                        <a href="" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          <!-- /.row-->
          
          <!-- /.row-->
        </div>
      </div>
      <footer class="footer">
        <div class="ms-auto">Powered by&nbsp;<a href="<?= base_url() ?>admin/dist/https://coreui.io/docs/">Rahmadi Cahyo Saputro</a></div>
      </footer>
    </div>
    
    <!-- script datatables -->
    <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  
    <script>
      $(document).ready(function() {
          $('#myTable').DataTable();
      });
    </script>

    <!-- script bootsrap -->
    <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>

    <!-- Modal Tambah Kategori-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>proses_tambah_kategori_buku">
            <div class="mb-3">
            <input type="text" class="form-control" name="nama_kategori_buku"  aria-describedby="nama kategori buku" placeholder="Nama Kategori Buku">
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Edit Kategori-->
    <div class="modal fade" id="editKBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>proses_edit_kategori_buku">
        <input type="hidden" name="id_kategori_buku" id="id_kategori_buku">
            <div class="mb-3">
            <input type="text" class="form-control" name="nama_kategori_buku" id="nama_kategori_buku" aria-describedby="nama kategori buku" placeholder="Nama Kategori Buku">
            </div>
            
            <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
        </form>
        </div>
        </div>
    </div>
    </div>
    <!-- script edit kategori buku -->
    <script>
        $(document).on('click', '#btn-edit-k-buku', function() {
            $('.modal-body #id_kategori_buku').val($(this).data('id_kategori_buku'));
            $('.modal-body #nama_kategori_buku').val($(this).data('nama_kategori_buku'));
        })
    </script>