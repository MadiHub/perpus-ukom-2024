<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
    <style>
        .img-fluid {
            height: 200px;

        }
</style>
</head>
<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-12 col-md-5 mx-auto">
                <div class="card shadow">
                    <img src="<?= base_url() ?>logo/logo-background.png" class="card-img-top img-fluid" alt="logo">
                    <div class="card-body text-center">
                        <h3 class="card-text">Portal Login ETERNAL LIBRARY</h3>
                        <p class="card-text">Silahkan pilih halaman login yang sesuai dengan status anda</p>
                        <div class="row gap-2 p-2">
                            <a class="btn btn-secondary" href="<?= base_url() ?>login_petugas">Petugas</a>
                            <a class="btn mb-2" style="background-color: #DF791E; color: #ffff;" href="<?= base_url() ?>login_member">Member</a>
                            <hr>
                            <a class="btn btn-success" href="<?= base_url() ?>">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <!-- script jquery -->
    <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <!-- sweet allert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
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
            <?php if (session()->has("error")) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session("error") ?>'
                })
            <?php } ?>
        });
    </script>
</body>
</html>
