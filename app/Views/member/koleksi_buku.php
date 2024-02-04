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
                    <div class="card-header text-center">
                        <h5>Koleksi Buku</h5>
                    </div>
                    <div class="card-body">
                        <table id="tablePeminjaman" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sampul Buku</th>
                                    <th>Judul</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($semua_koleksi_by_member as $koleksi): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img src="<?= base_url() ?>buku/<?= $koleksi['sampul_buku'] ?>" alt="sampul" width="50"></td>
                                    <td><?= $koleksi['judul'] ?></td>
                                    <td><?= $koleksi['nama_kategori_buku'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>pinjam_buku/<?= $koleksi['id_buku']?>" class="btn btn-success">Detail Buku</a>
                                        <button type="button" class="btn btn-danger" onclick="hapusKoleksi('<?= $koleksi['id_buku'] ?>', '<?= $koleksi['judul'] ?>')">
                                        <i class="fa-solid fa-trash-can"></i>
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

    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
    <!-- script hapus koleksi sweetalert -->
    <script>
        function hapusKoleksi(id_buku, judul) {
            Swal.fire({
                title: "Apa anda yakin?",
                text: "Data koleksi dengan judul : " + judul + " ini akan terhapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal" 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url() ?>hapus_koleksi_buku/' + id_buku;

                }
            });
        }
    </script>
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

</body>
</html>