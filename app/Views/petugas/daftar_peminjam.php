   
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped table-hover display responsive" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Judul Buku</th>
                                    <th>Email</th>
                                    <th>No Telpon</th>
                                    <th>Alamat</th>
                                    <th>Sampul</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($semua_peminjam as $peminjam): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $peminjam['nama_lengkap'] ?></td>
                                    <td><?= $peminjam['judul'] ?></td>
                                    <td><?= $peminjam['email'] ?></td>
                                    <td><?= $peminjam['no_telpon'] ?></td>
                                    <td><?= $peminjam['alamat'] ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $peminjam['sampul_buku'] ?>" alt="" width="50"></td>
                                    <td><?= $peminjam['tanggal_peminjaman'] ?></td>
                                    <td><?= $peminjam['status_peminjaman'] ?></td>
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
    <!-- script edit buku -->
    <script>
        $(document).on('click', '#btn-edit-peminjam', function() {
            $('.modal-body #id_peminjaman').val($(this).data('id_peminjaman'));
            $('.modal-body #status_peminjaman').val($(this).data('status_peminjaman'));
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
    