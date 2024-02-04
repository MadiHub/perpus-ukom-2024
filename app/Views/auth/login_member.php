<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

    <style>
        .img-fluid {
            height: 200px;

        }
        .input-group-text {
            background-color: #DF791E;
            transition: background-color 0.3s ease-in-out; 
        }

        .form-control:hover {
            border-color: #DF791E;
        }

        .form-control:focus {
            border-color: #DF791E !important;
            outline-color: #DF791E !important;
            box-shadow: none !important; 
        }

        .input-group-text:hover {
            background-color: #DF791E;
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
                        <h3 class="card-text">MEMBER LOGIN</h3>
                        <hr>
                        <form method="post" action="<?= base_url() ?>proses_login_member">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #DF791E; color: #ffff;"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #DF791E; color: #ffff;"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password"required>
                            </div>
                            <button type="submit" style="background-color: #DF791E; color: #ffff;" class="btn w-100 mb-2">Masuk</button>
                            <p>Belum punya akun ? <a href="<?= base_url() ?>register_member">daftar disini</a></p>
                            <hr>
                            <a class="btn btn-success w-100" href="<?= base_url() ?>portal_login">Kembali</a>
                        </form>
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
