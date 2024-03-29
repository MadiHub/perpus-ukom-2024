<style>
     .product-image {
      max-width: 100%;
      height: auto;
    }

</style>

<!-- rateyo -->
<link rel="stylesheet" href="<?= base_url() ?>rateyo/jquery.rateyo.min.css" />
    
    <div class="container-content" style="margin-top: 110px">
    <div class="row">
        <!-- Card untuk Gambar -->
        <div class="col-md-4 text-center text-md-start mb-4">
            <div class="card" style="margin-top: 20px">
                <img src="<?= base_url() ?>buku/<?= $sampul_buku ?>" alt="Produk" class="card-img-top">
               
            </div>
        </div>

        <!-- Card untuk Penjelasan -->
        <div class="col-md-8">
            
            <table class="table table-bordered table-striped mt-4">
                <tbody>
                    <tr>
                        <th scope="row">Judul</th>
                        <td><?= $judul ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Kategori</th>
                        <td><?= $nama_kategori_buku ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sub Kategori</th>
                        <td><?= $nama_sub_kategori ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Penulis</th>
                        <td><?= $penulis ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Penerbit</th>
                        <td><?= $penerbit ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tahun Terbit</th>
                        <td><?= $tahun_terbit ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Rating</th>
                        <td><span id="avgRating"></span></td>
                    </tr>
                    <!-- ... (data lainnya) ... -->
                </tbody>
            </table>
            <!-- ... (lanjutan penjelasan) ... -->
            <button class="btn w-100 " style="background-color: #DF791E; color: #ffff;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pinjam Buku</button>
        </div>
        
        </div>

        
    <!-- Ulasan dan Rating -->
    <div class="ulasan mt-4">
        <div class="card">
            <div class="container mt-3 mb-3">
        <ul class="nav nav-tabs" id="myTabs">
            <!-- ... (tab lainnya) ... -->
            <li class="nav-item">
                <a class="nav-link active text-secondary" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#content1">Ulasan & Rating</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-secondary" href="#" data-bs-toggle="tab" data-bs-target="#content2">Lihat Ulasan</a>
            </li>
            <li class="nav-item">
                <form action="<?= base_url() ?>proses_tambah_koleksi" method="post">
                    <input type="hidden" name="id_member" value="<?= $id_member?>">
                    <input type="hidden" name="id_buku" value="<?= $id_buku?>">
                    <input type="hidden" name="id_kategori_buku" value="<?= $id_kategori_buku?>">
                    <button type="submit"  class="nav-link  text-secondary"><i class="fa-solid fa-bookmark"></i> Tambah Koleksi</button>
                </form>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="content1">
                <!-- ... (form ulasan) ... -->
                <form action="<?= base_url() ?>proses_ulasan" method="post">
                    <input type="hidden" name="id_member" value="<?= $id_member ?>">
                    <input type="hidden" name="id_buku"  value="<?= $id_buku ?>">
                    <div class="form-floating mt-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="ulasan"></textarea>
                        <label for="floatingTextarea" class=" text-secondary">Berikan Ulasan</label>
                    </div>
                    <div id="rateYo" class="mt-2 mb-2"
                        data-rateyo-full-star="true">
                    </div>
                    <span class="result mt-3">Rating: 0</span>
                    <input type="hidden" name="rating">
                    <button class="btn w-100 mt-3" style="background-color: #DF791E; color: #ffff;">Kirim</button>
                </form>
            </div>
            <div class="tab-pane fade" id="content2">
                <?php if(empty($semua_ulasan) ): ?>
                    <span style="color: #DF791E">Belum ada ulasan...</span>
                <?php endif; ?>
                <?php foreach($semua_ulasan as $ulasan): ?>
                <div class="profil">
                    <div class="row">
                        <div class="col">
                            <span><?= $ulasan['tanggal_ulasan']?></span>
                            <br>
                            <i class="fa-solid fa-user"></i>   
                            <span><?= $ulasan['nama_lengkap']?></span>
                            <br>
                            <span><?= $ulasan['ulasan'] ?></span>
                        </div>
                        <div class="col text-end">
                            <div class="rating" data-rating="<?= $ulasan['rating'] ?>" id="rating-data<?= $ulasan['id_member'] ?>"></div>
                            <span>Rating: <?= $ulasan['rating'] ?></span>
                        </div>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>            
            </div>
        </div>
    </div>
</div>
</div>
</div>

 

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulir Pinjam Buku</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?= base_url() ?>proses_pinjam_buku">
                    <input type="hidden" class="form-control" value="<?= $id_member ?>" name="id_member" readonly>
                    <input type="hidden" class="form-control" value="<?= $id_buku ?>" name="id_buku" readonly>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" value="<?= $nama_lengkap ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Peminjam</label>
                        <input type="email" class="form-control" value="<?= $email ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" value="<?= $tanggal_pinjam ?>" id="tanggal_peminjaman" name="tanggal_peminjaman" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Stok Buku</label>
                        <input type="text" class="form-control" value="<?= $stok ?>" id="stok" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Pengembalian <span class="text-danger">* Wajib isi</span></label>
                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian"  required onchange="validasiTanggal()">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Total Pinjam</label>
                            <div class="input-group" style="width: 120px;">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-outline-secondary" onclick="decrementValue()">-</button>
                                </span> 
                                <input type="number" class="form-control text-end" value="0" min="0" id="total_pinjam" name="total_pinjam" readonly>
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-outline-secondary" onclick="incrementValue()">+</button>
                                </span>
                            </div>
                        <!-- </div> -->
                    <!-- <input type="number" class="form-control" name="total_pinjam" id="total_pinjam" required oninput="validateTotalPengembalian()"> -->
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn" style="background-color: #DF791E; color: #ffff;" type="submit">Pinjam Sekarang</button>
                    </div>
				</form>
            </div>
        </div>
    </div>
    </div>
     <!-- script jquery -->
     <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <!-- script popper -->
    <script src="<?= base_url() ?>popper/popper.js"></script>
    <!-- script bootsrap -->
    <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- script bootsrap -->
    <!-- script sweeetalert -->
    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
    <script>
    function validasiTanggal() {
        var tanggal_peminjaman = new Date(document.getElementById("tanggal_peminjaman").value);
        var tanggalPengembalian = new Date(document.getElementById("tanggal_pengembalian").value);

        // Menghitung selisih hari
        var selisihHari = (tanggalPengembalian - tanggal_peminjaman) / (1000 * 3600 * 24);

        if (tanggal_peminjaman > tanggalPengembalian) {
            alert("Tanggal pengembalian tidak boleh kurang dari tanggal peminjaman.");
            // Atur tanggal pengembalian kembali ke tanggal peminjaman atau ambil tindakan lain sesuai kebutuhan.
            document.getElementById("tanggal_pengembalian").value = "";
        } else if (selisihHari > 7) {
            alert("Peminjaman buku dibatasi hingga 7 hari.");
            // Atur tanggal pengembalian kembali ke tanggal peminjaman atau ambil tindakan lain sesuai kebutuhan.
            document.getElementById("tanggal_pengembalian").value = "";
        }
    }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        var navbar = document.querySelector(".navbar");

        function handleScroll() {
            navbar.classList.toggle("sticky", window.scrollY > 0);
        }

        window.addEventListener("scroll", handleScroll);

        // Initial check for sticky on page load
        handleScroll();
        });
    </script>

    <!-- rateyo -->
    <script src="<?= base_url() ?>rateyo/jquery.rateyo.min.js"></script>
    <script>
    $(function () {
        $("#rateYo").rateYo({
        onChange: function (rating, rateYoInstance) {
            $(this).parent().find('.result').text('Rating: ' + rating);
            $(this).parent().find('input[name=rating]').val(rating);
        }
        });
    });
    </script>

    <script>
    $(function () {
        <?php foreach ($semua_ulasan as  $ulasan): ?>
        $("#rating-data<?= $ulasan['id_member'] ?>").rateYo({
        rating: <?= $ulasan['rating'] ?>,
        readOnly: true, 
        });
        <?php endforeach; ?>

    });
    </script>

    <script>
        // Menggunakan nilai rata-rata rating dari controller
        var avgRating = <?php echo $avgRating; ?>;

        // Inisialisasi RateYo dengan nilai rata-rata rating
        $("#avgRating").rateYo({
            rating: avgRating,
            readOnly: true, 
            // Konfigurasi lainnya
        });
    </script>
    <!-- rateyo end -->

    <!-- script sweeetalert -->
    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
        <script>
            $(function() {
                <?php if (session()->has("success")) { ?>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '<?= session("success") ?>'
                    })
                <?php } ?>
            });
    </script>
    <script>
		$(function() {
			<?php if (session()->has("info")) { ?>
				Swal.fire({
					icon: 'info',
					title: 'Info',
					text: '<?= session("info") ?>'
				})
			<?php } ?>
		});
	</script>
<script>
  function incrementValue() {
    var input = document.getElementById('total_pinjam');
    var value = parseInt(input.value, 10);
    input.value = value + 1;
    validateTotalPengembalian();
  }

  function decrementValue() {
    var input = document.getElementById('total_pinjam');
    var value = parseInt(input.value, 10);
    if (value > 0) {
      input.value = value - 1;
    }
    validateTotalPengembalian();
  }

  function validateTotalPengembalian() {
    var stok = parseInt(document.getElementById("stok").value);
    var totalPinjam = parseInt(document.getElementById("total_pinjam").value);

    if (stok < totalPinjam) {
    //   alert('Total Peminjaman tidak boleh melebihi total pinjam.');
      document.getElementById("total_pinjam").value = stok;
    }
  }
</script>
</body>
</html>