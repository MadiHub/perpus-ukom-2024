<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light" >
        <div class="container">
            <a class="navbar-brand" href="#"
            ><img id="logo" src="<?= base_url() ?>logo/logo1.png" alt="Logo" draggable="false" width="75"
            /> <span style="color:#DF791E;">Eternal Library</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link mx-2 active" href="<?= base_url() ?>"><i class="fa-solid fa-house active"></i> Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-clock-rotate-left"></i> Riwayat
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url() ?>riwayat_peminjaman">Riwayat Peminjaman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url() ?>riwayat_pengembalian">Riwayat Pengembalian</a></li>
                    </ul>
                </li>
                <li class="nav-item ms-3">
                    <?php if($status_login == null) {
                        echo "<a class='btn btn-danger btn-rounded' href='login_member'>Masuk | Daftar</a>";
                    } else {
                        echo "
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fa-solid fa-user'></i> $nama_lengkap
                            </a>
                            <ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='buku_dipinjam'><i class='fa-regular fa-id-card'></i> Profil</a></li>
                                <li><a class='dropdown-item' href='logout'><i class='fa-solid fa-right-from-bracket'></i> Keluar</a></li>
                            </ul>
                        </li>                     
                        ";
                    }
                    ?>
                </li>
            
            </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->