<div class="body flex-grow-1 px-3">
  <div class="container-lg">
    <div class="row">
      <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary" style="height: 100px">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div><h5>Total Buku</h5></div>
                <div class="fs-4 fw-semibold"><?= $total_buku->total_buku?></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary" style="height: 100px">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div><h5>Total Kategori</h5></div>
                <div class="fs-4 fw-semibold"><?= $total_kategori->total_kategori?></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary" style="height: 100px">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div>
                  <div><h5>Total Sub Kategori</h5></div>
                  <div class="fs-4 fw-semibold"><?= $total_sub_kategori->total_sub_kategori?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary" style="height: 100px">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div>
                  <div><h5>Total Admin</h5></div>
                  <div class="fs-4 fw-semibold"><?= $total_admin->total_admin?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary" style="height: 100px">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div>
                  <div><h5>Total Petugas</h5></div>
                  <div class="fs-4 fw-semibold"><?= $total_petugas->total_petugas?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary" style="height: 100px">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div>
                  <div><h5>Total Member</h5></div>
                  <div class="fs-4 fw-semibold"><?= $total_member->total_member?></div>
                </div>
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
    <div class="ms-auto">Powered by&nbsp;<a href="<?= base_url() ?>admin/dist/https://coreui.io/docs/">Rahmadi Cahyo Saputro</a></div>
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