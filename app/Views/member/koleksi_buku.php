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

    <!-- CARD -->
    <div class="populer" style="margin-top: 100px">
        <div class="container-content">
            <div class="row">
                <div class="col mt-4">
                    <h3>Daftar Koleksi</h3>
                </div>
            </div>
            <div class="card"  style="background-color: #FFF9C9;">
                <div class="container">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mt-3 text-center">
                    <?php if (empty($semua_koleksi_by_member)): ?>
                        <img src="<?= base_url() ?>buku/buku404.png" class="img buku-404" alt="course">
                    <?php else: ?>
                        <?php $no = 1; foreach($semua_koleksi_by_member as $koleksi): ?>
                            <!-- Card 1 -->
                            <div class="col">
                                <div class="card-produk mr-2" style="border: none; background: transparent;">
                                    <a href="<?= base_url() ?>pinjam_buku/<?= $koleksi['id_buku']?>">
                                        <div class="img-card-produk mt-1 mr-1 ml-1 mb-1" style="max-height: 400px; max-weight: 400px; overflow: hidden;">
                                            <img src="<?= base_url() ?>buku/<?= $koleksi['sampul_buku']?>" class="card-produk-img-top img-fluid" alt="course">
                                        </div>
                                    </a>
                                    <div class="container">
                                    <div class="kategori mt-2 mr-6 text-start">
                                        <p><a href="<?= base_url() ?>ID-<?= $koleksi['id_kategori_buku']?>"><?= $koleksi['nama_kategori_buku']?></a></p>
                                    </div>
                                    <div class="judul text-start">
                                        <h6 class="mb-2"><a href="<?= base_url() ?>pinjam_buku/<?= $koleksi['id_buku']?>"><?= $koleksi['judul']?></a></h6>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
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