
<body>
    <div class="sidebar sidebar-fixed"  style="background-color: #0E51A5;"  id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
      <!-- nama user -->
      <h4><?= $nama_lengkap ?></h4>
      <!-- end -->
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>dashboard_petugas">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard Petugas</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>daftar_peminjam">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-indent-increase"></use>
            </svg> Daftar Peminjam</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>daftar_pengembalian">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-indent-decrease"></use>
            </svg> Daftar Pengembalian</a></li>
        
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>