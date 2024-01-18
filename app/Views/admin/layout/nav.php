<div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="<?= base_url() ?>admin/dist/assets/brand/coreui.svg#full"></use>
            </svg></a>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown"role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="<?= base_url() ?>admin/dist/assets/img/avatars/8.jpg" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                    <a href="<?= base_url()?>logout" >
                      <i class="icon icon-2xl cil-user"></i>
                      Akun
                    </a>
                    <br>
                    <a href="<?= base_url()?>logout" >
                      <i class="icon icon-2xl cil-arrow-thick-to-left"></i>
                      Logout
                    </a>
               
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item active"><span><?=$judul?></span></li>
            </ol>
          </nav>
        </div>
      </header>