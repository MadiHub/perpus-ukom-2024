
<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="<?= base_url() ?>admin/dist/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="<?= base_url() ?>admin/dist/assets/brand/coreui.svg#signet"></use>
        </svg>
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
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="<?= base_url() ?>admin/dist/#">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
            </svg> Rekap</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>rekap_peminjaman"><span class="nav-icon"></span> Peminjam Buku</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>rekap_pengembalian"><span class="nav-icon"></span> Pengembalian Buku</a></li>
          </ul>
        </li>
        
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>