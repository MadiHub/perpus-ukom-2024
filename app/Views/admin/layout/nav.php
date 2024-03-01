<div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="<?= base_url() ?>admin/dist/#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="<?= base_url() ?>admin/dist/assets/brand/coreui.svg#full"></use>
            </svg></a>
          <ul class="header-nav ms-3">
          <ul class="header-nav ms-3">
            <li> <a href="<?= base_url()?>logout" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a></li>
          </ul>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item active"><span><?= $judul ?></span></li>
            </ol>
          </nav>
        </div>
      </header>