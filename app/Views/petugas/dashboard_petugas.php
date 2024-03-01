
    
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary" style="height: 100px">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <?php
                      // Mendapatkan indeks bulan saat ini
                      $bulan_sekarang = date('n'); 
                      // Mendapatkan nama bulan saat ini 
                      $namaBulanSaatIni = $nm_bulan[$bulan_sekarang]; //$nm_bulan dari controller
                    ?>
                    <div><h6>Total Peminjam Bulan <?= $namaBulanSaatIni ?></h6></div>
                    <div class="fs-4 fw-semibold"><?= $total_peminjaman->total_peminjaman?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary" style="height: 100px">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <?php
                      // Mendapatkan indeks bulan saat ini
                      $bulan_sekarang = date('n'); 
                      // Mendapatkan nama bulan saat ini 
                      $namaBulanSaatIni = $nm_bulan[$bulan_sekarang]; //$nm_bulan dari controller
                    ?>
                    <div><h6>Total Pengembalian Bulan <?= $namaBulanSaatIni ?></h6></div>
                    <div class="fs-4 fw-semibold"><?= $total_pengembalian->total_pengembalian?></div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.row-->
          
          <!-- /.row-->
        </div>
      </div>
      <footer class="footer">
        <div class="ms-auto">Dibuat Oleh&nbsp; <span class="text-primary">Rahmadi Cahyo Saputro</span></div>
      </footer>
    </div>
    
    <!-- script jquery -->
    <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
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