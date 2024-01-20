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
            <div class="mb-3">
                <input type="password" class="form-control" id="exampleInputPassword1" value="">
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
</body>
</html>