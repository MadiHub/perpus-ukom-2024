
<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <!-- <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="<?= base_url() ?>admin/dist/assets/brand/coreui.svg#full"></use>
        </svg> -->
        <h4><?= $nama_lengkap ?></h4>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="<?= base_url() ?>admin/dist/assets/brand/coreui.svg#signet"></use>
        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>dashboard_admin">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard Admin</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>daftar_buku">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg> Daftar Buku</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>kategori_buku">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-list"></use>
            </svg> Kategori Buku</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>sub_kategori">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-playlist-add"></use>
            </svg> Sub Kategori</a></li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="<?= base_url() ?>admin/dist/#">
            <svg class="nav-icon">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-group"></use>
            </svg> Users</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>daftar_admin"><span class="nav-icon"></span> Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>daftar_petugas"><span class="nav-icon"></span> Petugas</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>daftar_member"><span class="nav-icon"></span> Member</a></li>            
          </ul>
        </li>
        
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>