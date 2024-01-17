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
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="<?= base_url() ?>admin/dist/#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="<?= base_url() ?>admin/dist/assets/img/avatars/8.jpg" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                  </svg> Profile</a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                  </svg> Settings</a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                  </svg> Lock Account</a><a class="dropdown-item" href="<?= base_url() ?>admin/dist/#">
                  <svg class="icon me-2">
                    <use xlink:href="<?= base_url() ?>admin/dist/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item active"><span>Dashboard Petugas</span></li>
            </ol>
          </nav>
        </div>
      </header>