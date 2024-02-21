  
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
                <div class="card">
                    <div class="print text-end">
                        <form action="<?= base_url()?>cetak_peminjaman" method="post">
                            <input type="hidden" value="di-pinjam" name="status_peminjaman">
                        <button type="submit" class="btn btn-danger mt-3"><i class='fas fa-print'></i> Rekap Peminjaman</button>
                        </form>
                    </div>
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
                                            data-id_buku="<?= $peminjam['id_buku'] ?>"
                                            data-id_member="<?= $peminjam['id_member'] ?>"
                                            data-email="<?= $peminjam['email'] ?>"
                                            data-status_peminjaman="<?= $peminjam['status_peminjaman'] ?>"
                                            data-tanggal_pengembalian="<?= $peminjam['tanggal_pengembalian'] ?>"
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
                <input type="hidden" class="form-control" name="id_peminjaman" id="id_peminjaman">
                <input type="hidden" class="form-control" name="id_member" id="id_member">
                <input type="hidden" class="form-control" name="email" id="email">
                <input type="hidden" class="form-control" name="id_buku" id="id_buku">
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Status</label>
                    <input type="text" value="di-kembalikan" class="form-control" name="status_peminjaman" placeholder="status_peminjaman Buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Total Pinjam</label>
                    <input type="number" class="form-control" name="total_pinjam" id="total_pinjam" placeholder="total_pinjam Buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" id="tanggal_pengembalian" class="form-control" name="tanggal_pengembalian" placeholder="status_peminjaman Buku" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_pengembalian" class="form-label">Total Pengembalian</label>
                    <input type="number" class="form-control" name="total_pengembalian" placeholder="Masukkan Total Pengembalian Buku" oninput="validateTotalPengembalian()" required>
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Tanggal Hari Ini</label>
                    <input type="date" value="" class="form-control" id="tanggal_hari_ini" name="tanggal_hari_ini"  required>
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Total Keterlambatan</label>
                    <input type="text" class="form-control" id="total_keterlambatan" name="total_keterlambatan" readonly>
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Total Denda</label>
                    <input type="text" class="form-control" id="total_denda" name="total_denda" readonly >
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Uang Dibayar</label>
                    <input type="text" class="form-control" id="uang_dibayarkan" name="uang_dibayarkan" value="-">
                </div>
                <div class="mb-3">
                    <label for="total_pinjam" class="form-label">Kembalian</label>
                    <input type="number" class="form-control" id="uang_kembalian" name="uang_kembalian" readonly>
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
    <!-- script edit peminjaman -->
    <script>
        $(document).on('click', '#btn-edit-peminjam', function() {
            $('.modal-body #id_peminjaman').val($(this).data('id_peminjaman'));
            $('.modal-body #id_buku').val($(this).data('id_buku'));
            $('.modal-body #id_member').val($(this).data('id_member'));
            $('.modal-body #email').val($(this).data('email'));
            $('.modal-body #tanggal_pengembalian').val($(this).data('tanggal_pengembalian'));
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


<!-- Validasi total peminjaman -->
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

<script>
    // Ambil elemen input tanggal_pengembalian
    var tanggalPengembalianInput = document.getElementById('tanggal_pengembalian');
    // Ambil elemen input tanggal_hari_ini
    var tanggalHariIniInput = document.getElementById('tanggal_hari_ini');
    // Ambil elemen input total_keterlambatan
    var totalKeterlambatanInput = document.getElementById('total_keterlambatan');
    // Ambil elemen input total_denda
    var totalDendaInput = document.getElementById('total_denda');

    // Tambahkan event listener untuk memonitor perubahan nilai tanggal_hari_ini
    tanggalHariIniInput.addEventListener('input', hitungTotalKeterlambatan);

    // Fungsi untuk menghitung total keterlambatan
    function hitungTotalKeterlambatan() {
        // Ambil nilai tanggal_pengembalian dan tanggal_hari_ini
        var tanggalPengembalian = tanggalPengembalianInput.value;
        var tanggalHariIni = tanggalHariIniInput.value;

        // Jika tanggal_pengembalian diisi dan tanggal_hari_ini > tanggal_pengembalian
        if (tanggalPengembalian && tanggalHariIni > tanggalPengembalian) {
            // Hitung selisih hari
            var selisihHari = Math.floor((new Date(tanggalHariIni) - new Date(tanggalPengembalian)) / (24 * 60 * 60 * 1000));
            
            // Tampilkan hasil pada input total_keterlambatan
            totalKeterlambatanInput.value = (selisihHari > 0) ? selisihHari : (selisihHari === 0) ? 'Tidak Terlambat' : '';

            // Hitung total denda (2000 per hari)
            var totalDenda = (selisihHari > 0) ? selisihHari * 2000 : 0;
            totalDendaInput.value = totalDenda;
        } else {
            // Kosongkan input total_keterlambatan dan total_denda jika tidak terlambat
            totalKeterlambatanInput.value = '-';
            totalDendaInput.value = '-';
        }
    }

    // Panggil fungsi untuk menghitung total keterlambatan saat halaman dimuat
    hitungTotalKeterlambatan();
</script>

<script>
    // Ambil elemen input total_denda
    var totalDendaInput = document.getElementById('total_denda');
    // Ambil elemen input uang_dibayarkan
    var uangDibayarkanInput = document.getElementById('uang_dibayarkan');
    // Ambil elemen input uang_kembalian
    var uangKembalianInput = document.getElementById('uang_kembalian');

    // Tambahkan event listener untuk memonitor perubahan nilai uang_dibayarkan
    uangDibayarkanInput.addEventListener('input', hitungUangKembalian);

    // Fungsi untuk menghitung uang kembalian
    function hitungUangKembalian() {
        // Ambil nilai total_denda dan uang_dibayarkan
        var totalDenda = parseInt(totalDendaInput.value) || 0;
        var uangDibayarkan = parseInt(uangDibayarkanInput.value) || 0;

        // Hitung uang kembalian
        var uangKembalian = uangDibayarkan - totalDenda;

        // Tampilkan hasil pada input uang_kembalian
        uangKembalianInput.value = uangKembalian;

        
    }

    // Panggil fungsi untuk menghitung uang kembalian saat halaman dimuat
    hitungUangKembalian();
</script>

<!-- format rp -->
<script>
    function formatRupiah(input) {
        // Mengambil nilai input
        let nilai = input.value;

        // Menghapus karakter selain digit
        nilai = nilai.replace(/\D/g, '');

        // Format sebagai mata uang Rupiah
        let hasilFormat = "Rp " + new Intl.NumberFormat('id-ID').format(nilai);

        // Menampilkan hasil format pada input
        input.value = hasilFormat;
    }
</script>