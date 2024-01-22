   
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
            <button type="button" class="btn btn-primary mb-3" style="width: 200px"data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Buku
            </button>
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sampul</th>
                                    <th>Judul</th>
                                    <th>Nama Kategori Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($semua_buku as $buku): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $buku['sampul_buku'] ?>" alt="" width="50"></td>
                                    <td><?= $buku['judul'] ?></td>
                                    <td><?= $buku['nama_kategori_buku'] ?></td>
                                    <td><?= $buku['penulis'] ?></td>
                                    <td><?= $buku['penerbit'] ?></td>
                                    <td><?= $buku['tahun_terbit'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success mr-2" id="btn-edit-buku"
                                            data-bs-toggle="modal"  data-bs-target="#editBuku"
                                            data-id_buku="<?= $buku['id_buku'] ?>"
                                            data-id_kategori_buku="<?= $buku['id_kategori_buku'] ?>"
                                            data-judul="<?= $buku['judul'] ?>"
                                            data-sampul_buku="<?= $buku['sampul_buku'] ?>"
                                            data-penulis="<?= $buku['penulis'] ?>"
                                            data-penerbit="<?= $buku['penerbit'] ?>"
                                            data-tahun_terbit="<?= $buku['tahun_terbit'] ?>"
                                            > EDIT
                                        </button>
                                        <button type="button" class="btn btn-danger" onclick="hapusBuku('<?= $buku['id_buku'] ?>', '<?= $buku['judul'] ?>')">
                                            HAPUS
                                        </button>
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

    <!-- Modal Tambah Buku-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>proses_tambah_buku" enctype="multipart/form-data">
            <div class="mb-3">
                <select id="id_kategori_buku" name="id_kategori_buku" class="form-select" placeholder="id_kategori_buku">
                    <?php foreach($semua_kategori_buku as $k_buku ): ?>
                    <option value="<?= $k_buku['id_kategori_buku']?>"><?= $k_buku['nama_kategori_buku']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul buku" placeholder="Judul Buku">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="penulis" id="penulis" aria-describedby="penulis buku" placeholder="Penulis Buku">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="penerbit" id="penerbit" aria-describedby="penerbit buku" placeholder="Penerbit Buku">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" aria-describedby="Tahun Terbit buku" placeholder="Tahun Terbit Buku">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="sampul_buku" id="sampul_buku" aria-describedby="sampul buku" placeholder="Sampul Buku">
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Modal Edit Buku-->
    <div class="modal fade" id="editBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>proses_edit_buku" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id_buku" id="id_buku" aria-describedby="id judul buku" placeholder="Judul Buku">

            <div class="mb-3">
                <select id="id_kategori_buku" name="id_kategori_buku" class="form-select" placeholder="id_kategori_buku">
                    <?php foreach($semua_kategori_buku as $k_buku ): ?>
                    <option value="<?= $k_buku['id_kategori_buku']?>"><?= $k_buku['nama_kategori_buku']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul buku" placeholder="Judul Buku">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="penulis" id="penulis" aria-describedby="penulis buku" placeholder="Penulis Buku">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="penerbit" id="penerbit" aria-describedby="penerbit buku" placeholder="Penerbit Buku">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" aria-describedby="Tahun Terbit buku" placeholder="Tahun Terbit Buku">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="sampul_buku" id="sampul_buku" aria-describedby="sampul buku" placeholder="Sampul Buku">
                <?= csrf_field() ?>

            </div>
            
            <button type="submit" class="btn btn-primary w-100">Edit</button>
        </form>
        </div>
        </div>
    </div>
    </div>
    <!-- script edit buku -->
    <script>
        $(document).on('click', '#btn-edit-buku', function() {
            $('.modal-body #id_kategori_buku').val($(this).data('id_kategori_buku'));
            $('.modal-body #id_buku').val($(this).data('id_buku'));
            $('.modal-body #judul').val($(this).data('judul'));
            $('.modal-body #penulis').val($(this).data('penulis'));
            $('.modal-body #penerbit').val($(this).data('penerbit'));
            $('.modal-body #tahun_terbit').val($(this).data('tahun_terbit'));
            $('.modal-body #sampul_buku').file($(this).data('sampul_buku'));
        })
    </script>

    <!-- script hapus buku -->
    <script>
        function hapusBuku(id_buku, judul) {
            Swal.fire({
                title: "Apa anda yakin?",
                text: "Data buku dengan judul : " + judul + " ini akan terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal" 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>hapus_buku/' + id_buku;

                }
            });
        }
    </script>