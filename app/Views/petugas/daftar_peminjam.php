  
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
                                    <th>Total Pinjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Detail Member</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $no = 1; foreach($semua_peminjam as $peminjam): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $peminjam['sampul_buku'] ?>" alt="" width="50"></td>
                                    <td><?= $peminjam['judul'] ?></td>
                                    <td><span class="badge bg-danger"><?= $peminjam['status_peminjaman'] ?></span></td>
                                    <td><?= $peminjam['nama_lengkap'] ?></td>
                                    <td><?= $peminjam['email'] ?></td>
                                    <td><?= $peminjam['total_pinjam'] ?> Buku</td>
                                    <td><?= $peminjam['tanggal_peminjaman'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning mr-2" id="btn-detail-member"
                                            data-bs-toggle="modal"  data-bs-target="#detailMember"
                                            data-id_peminjaman="<?= $peminjam['id_peminjaman'] ?>"
                                            data-nama_lengkap="<?= $peminjam['nama_lengkap'] ?>"
                                            data-email="<?= $peminjam['email'] ?>"
                                            data-no_telpon="<?= $peminjam['no_telpon'] ?>"
                                            data-alamat="<?= $peminjam['alamat'] ?>"
                                            > <i class="fa-solid fa-address-card mr-2"></i> Member
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success mr-2" id="btn-edit-peminjam"
                                            data-bs-toggle="modal"  data-bs-target="#editPeminjam"
                                            data-id_peminjaman="<?= $peminjam['id_peminjaman'] ?>"
                                            data-status_peminjaman="<?= $peminjam['status_peminjaman'] ?>"
                                            data-total_pinjam="<?= $peminjam['total_pinjam'] ?>"
                                            > <i class="fa-solid fa-pen-to-square"></i>
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
                    <input type="text" value="di-kembalikan" class="form-control" name="status_peminjaman" aria-describedby="status_peminjaman buku" placeholder="status_peminjaman Buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Total Pinjam</label>
                    <input type="number" class="form-control" name="total_pinjam" id="total_pinjam" aria-describedby="total_pinjam buku" placeholder="total_pinjam Buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_pengembalian" class="form-label">Total Pengembalian</label>
                    <input type="number" class="form-control" name="total_pengembalian" aria-describedby="total_pengembalian buku" placeholder="total_pengembalian Buku" oninput="validateTotalPengembalian()">
                </div>
                <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
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
                    <label for="form-label">Alamat</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="alamat" readonly></textarea>
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
            $('.modal-body #total_pinjam').val($(this).data('total_pinjam'));
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

    <!-- Skrip untuk menangani validasi input total_pinjam -->
<!-- <script>
    $(document).ready(function() {
        function handleTotalPinjamValidation(totalPinjamInput, totalPinjam) {
            // Menambahkan event listener untuk setiap perubahan pada input total_pinjam
            totalPinjamInput.on('input', function() {
                var totalPinjamInputValue = parseInt(this.value);

                // Membandingkan dengan nilai total_pinjam dari atribut data
                if (totalPinjamInputValue > totalPinjam) {
                    alert('Total pinjam tidak boleh melebihi nilai awal.');
                    this.value = totalPinjam;
                }
            });
        }

        $('#editPeminjam').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang membuka modal
            var totalPinjam = button.data('total_pinjam'); // Mendapatkan nilai total_pinjam dari tombol

            var modal = $(this);
            var totalPinjamInput = modal.find('#total_pinjam');

            totalPinjamInput.val(totalPinjam); // Menetapkan nilai total_pinjam pada input modal

            // Menangani validasi input total_pinjam
            handleTotalPinjamValidation(totalPinjamInput, totalPinjam);
        });
    });
</script> -->
<script>
    function validateTotalPengembalian() {
        var totalPengembalianInput = document.getElementsByName("total_pengembalian")[0];
        var totalPinjam = parseInt(document.getElementById("total_pinjam").value);
        var totalPengembalian = parseInt(totalPengembalianInput.value);

        if (totalPengembalian > totalPinjam) {
            alert('Total pengembalian tidak boleh melebihi total pinjam.');
            totalPengembalianInput.value = totalPinjam;
        }
    }
</script>


    