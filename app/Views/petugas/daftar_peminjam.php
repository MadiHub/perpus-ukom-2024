   
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped table-hover display responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sampul</th>
                                    <th>Judul Buku</th>
                                    <th>Status</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Detail Member</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($semua_peminjam as $peminjam): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $peminjam['sampul_buku'] ?>" alt="" width="50"></td>
                                    <td><?= $peminjam['judul'] ?></td>
                                    <td><span class="badge bg-danger"><?= $peminjam['status_peminjaman'] ?></span></td>
                                    <td><?= $peminjam['nama_lengkap'] ?></td>
                                    <td><?= $peminjam['email'] ?></td>
                                    <td><?= $peminjam['tanggal_peminjaman'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success mr-2" id="btn-detail-member"
                                            data-bs-toggle="modal"  data-bs-target="#detailMember"
                                            data-id_peminjaman="<?= $peminjam['id_peminjaman'] ?>"
                                            data-nama_lengkap="<?= $peminjam['nama_lengkap'] ?>"
                                            data-email="<?= $peminjam['email'] ?>"
                                            data-no_telpon="<?= $peminjam['no_telpon'] ?>"
                                            data-alamat="<?= $peminjam['alamat'] ?>"
                                            > DETAIL
                                        </button>
                                    </td>
                                    <td>
                                       
                                        <button type="button" class="btn btn-success mr-2" id="btn-edit-peminjam"
                                            data-bs-toggle="modal"  data-bs-target="#editPeminjam"
                                            data-id_peminjaman="<?= $peminjam['id_peminjaman'] ?>"
                                            data-status_peminjaman="<?= $peminjam['status_peminjaman'] ?>"
                                            > EDIT
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
    
    <!-- Modal Edit Peminjaman-->
    <div class="modal fade" id="editPeminjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Status Peminjaman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="<?= base_url() ?>proses_edit_peminjaman">
                <input type="hidden" class="form-control" name="id_peminjaman" id="id_peminjaman" aria-describedby="id peminjaman buku" >
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="status_peminjaman">
                        <option value="di-kembalikan" selected>Di Kembalikan</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Edit</button>
            </form>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Detail Member-->
    <div class="modal fade" id="detailMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" aria-describedby="penerbit buku" readonly>
                </div>                
                <div class="mb-3">
                    <label for="nama" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="penerbit buku" readonly>
                </div>                
                <div class="mb-3">
                    <label for="nama" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" name="no_telpon" id="no_telpon" aria-describedby="penerbit buku" readonly>
                </div>                
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="alamat"></textarea>
                        <label for="floatingTextarea">Alamat</label>
                    </div>
                </div>                
            </div>
            </div>
        </div>
    </div>
    <!-- script edit buku -->
    <script>
        $(document).on('click', '#btn-edit-peminjam', function() {
            $('.modal-body #id_peminjaman').val($(this).data('id_peminjaman'));
            $('.modal-body #status_peminjaman').val($(this).data('status_peminjaman'));
        })
    </script>
    <!-- script detail member -->
    <script>
        $(document).on('click', '#btn-detail-member', function() {
            $('.modal-body #id_peminjaman').val($(this).data('id_peminjaman'));
            $('.modal-body #nama_lengkap').val($(this).data('nama_lengkap'));
            $('.modal-body #email').val($(this).data('email'));
            $('.modal-body #no_telpon').val($(this).data('no_telpon'));
            $('.modal-body #alamat').val($(this).data('alamat'));
        })
    </script>

    <!-- script hapus peminjam -->
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
    