<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container mt-5">
		<div class="row mt-5">
			<div class="col mt-5">
			<div class="card mt-5">
				<div class="card-header text-center">
					Register Member
				</div>
				<div class="card-body">
				<form method="post" action="<?= base_url() ?>proses_register_member">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" id="no_telpon" name="no_telpon">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
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
