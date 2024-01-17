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
					Login Petugas
				</div>
				<div class="card-body">
				<form method="post" action="<?= base_url() ?>proses_login">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
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
</body>
</html>