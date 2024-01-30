<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <!-- bootsrap -->
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">
    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url() ?>DataTables/datatables.min.css">
</head>
<body>
    <div class="container-lg" style="margin-top:110px">
          <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table id="tablePeminjaman" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sampul Buku</th>
                                    <th>Judul</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Total Dikembalikan</th>
                                    <th>Hari Keterlambatan</th>
                                    <th>Total Denda</th>
                                    <th>Uang Dibayarkan</th>
                                    <th>Uang Kembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($buku_dikembalikan_by_member as $buku_dikembalikan): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $buku_dikembalikan['sampul_buku'] ?>" alt="sampul" width="50"></td>
                                    <td><?= $buku_dikembalikan['judul'] ?></td>
                                    <td><?= $buku_dikembalikan['tanggal_pengembalian'] ?></td>
                                    <td><?= $buku_dikembalikan['total_pengembalian'] ?> Buku</td>
                                    <td><?= $buku_dikembalikan['hari_keterlambatan'] ?></td>
                                    <td><?= $buku_dikembalikan['total_denda'] ?></td>
                                    <td><?= $buku_dikembalikan['uang_dibayarkan'] ?></td>
                                    <td><?= $buku_dikembalikan['uang_kembalian'] ?></td>
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
    <!-- script datatables -->
    <script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  
    <script>
      $(document).ready(function() {
          $('#tablePeminjaman').DataTable();
      });
    </script>
    <!-- script popper -->
    <script src="<?= base_url() ?>popper/popper.js"></script>
    <!-- script bootsrap -->
    <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>

</body>
</html>