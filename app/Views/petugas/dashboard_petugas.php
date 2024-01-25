
    
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary" style="height: 100px">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                        <svg class="icon">
                          <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                        </svg>)</span></div>
                    <div>Users</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary" style="height: 100px">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                        <svg class="icon">
                          <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                        </svg>)</span></div>
                    <div>Users</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary" style="height: 100px">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                        <svg class="icon">
                          <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                        </svg>)</span></div>
                    <div>Users</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-white bg-primary" style="height: 100px">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                        <svg class="icon">
                          <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                        </svg>)</span></div>
                    <div>Users</div>
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
        <div><a href="<?= base_url() ?>admin/dist/https://coreui.io">CoreUI </a><a href="<?= base_url() ?>admin/dist/https://coreui.io">Bootstrap Admin Template</a> © 2023 creativeLabs.</div>
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