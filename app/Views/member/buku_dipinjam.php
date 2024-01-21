<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Dipinjam</title>
    <!-- bootsrap -->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url() ?>DataTables/datatables.min.css">
</head>
<body>
    <div class="container-lg">
          <div class="row">
            <button type="button" class="btn btn-primary mb-3" style="width: 200px"data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kategori
            </button>
                <div class="card">
                    <div class="card-body">
                        <table id="tablePeminjaman" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Nama Kategori</th>
                                    <th>Sampul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($buku_dipinjam_by_member as $buku_dipinjam): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $buku_dipinjam['judul'] ?></td>
                                    <td><?= $buku_dipinjam['nama_kategori_buku'] ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $buku_dipinjam['sampul_buku'] ?>" alt="sampul" width="50"></td>
                                    <td><?= $buku_dipinjam['tanggal_peminjaman'] ?></td>
                                    <td><?= $buku_dipinjam['tanggal_pengembalian'] ?></td>
                                    <td><?= $buku_dipinjam['status_peminjaman'] ?></td>
                                    <td></td>
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

    <!-- script jquery -->
      <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <!-- script popper -->
    <script src="<?= base_url() ?>popper/popper.js"></script>
    <!-- script bootsrap -->
    <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- script datatables -->
    <script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  
    <script>
      $(document).ready(function() {
          $('#tablePeminjaman').DataTable();
      });
    </script>
</body>
</html>