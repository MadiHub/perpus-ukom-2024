<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

    <style>
         .container {
            max-width: 1200px;
            width: 75%;
            margin: auto;
        }

        /* Responsive container for mobile */
        @media only screen and (max-width: 767px) {
            .container {
                max-width: 1200px;
                width: 100%;
                margin: auto;
            }
        }


        input[readonly] {
            background-color: #D0D0D0;
            /* Ganti #your_color_here dengan kode warna yang diinginkan */
        }
        textarea[readonly] {
            background-color: #D0D0D0;
            /* Ganti #your_color_here dengan kode warna yang diinginkan */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Detail Buku
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-5">
                        <div class="col">
                            <img src="<?= base_url() ?>buku/<?= $sampul_buku ?>" alt="" width="200" class="img mx-auto d-block">
                        </div>
                        <div class="col ml-10">
                            <p>Judul : <?= $judul ?></p>
                            <p>Kategori : <?= $nama_kategori_buku ?></p>
                            <p>Penulis : <?= $penulis ?></p>
                            <p>Penerbit : <?= $penerbit ?></p>
                            <p>Tahun Terbit : <?= $tahun_terbit ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Form Pinjam Buku
            </div>
            <div class="card-body">
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
                        <label for="exampleInputPassword1" class="form-label">Tanggal Pengembalian <span class="text-danger">* Wajib isi</span></label>
                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian"  required onchange="validasiTanggal()">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Total Pinjam</label>
                        <input type="number" class="form-control" name="total_pinjam">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Pinjam Sekarang</button>
                    </div>
				</form>
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

</body>
</html>