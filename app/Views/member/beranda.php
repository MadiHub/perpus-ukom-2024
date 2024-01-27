<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>owl-slide/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>owl-slide/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">

    <style>
        .container {
            max-width: 1200px;
            width: 75%;
            margin: auto;
        }

        /* Responsive container for mobile */
        @media only screen and (max-width: 767px) {
            .container {
                max-width: 1200px;
                width: 100%;
                margin: auto;
            }
        }

        .navbar-nav .nav-link.active {
         color:  #DF791E !important;
         }
         .navbar {
        transition: background-color 0.3s, box-shadow 0.3s;
        }
        .navbar.sticky {
        background-color: #ffffff; /* Sticky background color */
        box-shadow: 0 4px 2px -2px rgba(0,0,0,0.1); /* Sticky box shadow */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 3;
            }
        }
        .navbar.fadeIn {
        animation: fadeIn 0.5s ease-in-out;
        }
        /* responsive card mobile */
        @media (max-width: 767px) {
            .card {
                width: 11rem;
            }
        }
        /* responsive card tab */
        @media (min-width: 768px) and (max-width: 991px) {
            .card {
                width: 12rem; 
            }
        }
        .judul h6 a {
            font-weight: 500px;
            font-size: 20px;
            color: black;
            text-decoration: none;
            transition: color 0.3s; 
        }
        .judul h6 a:hover {
            color: #0E51A5;
            text-decoration: none; 
        }
        .kategori p a {
            font-weight: 500;
            font-size: 15px;
            color: #DF791E;
            text-decoration: none;
            transition: color 0.3s; 
        }
        input[readonly] {
            background-color: #D0D0D0;
        }
        textarea[readonly] {
            background-color: #D0D0D0;
        }
        .img-card {
            transition: box-shadow 0.7s;
            border: none; /* Menghilangkan border */

        }
        .img-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.03);
            cursor: pointer; /* Ganti cursor saat dihover */
            opacity: 0.9; /* Nilai opacitas selama dihover (0.0 - 1.0) */

        }
    </style>
    

</head>
<body>
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
                <a class="nav-link mx-2 active" href="#!"><i class="fa-solid fa-house active"></i> Beranda</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-clock-rotate-left"></i> Riwayat
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="buku_dipinjam">Riwayat Peminjaman</a></li>
                    <li><a class="dropdown-item" href="#">Riwayat Pengembalian</a></li>
                </ul>
                </li>
                <li class="nav-item ms-3">
                    <?php if($status_login == null) {
                        echo "<a class='btn btn-danger btn-rounded' href='login_member'>Masuk | Daftar</a>";
                    } else {
                        echo "<a class='btn btn-danger btn-rounded' href='logout'><i class='fa-solid fa-right-to-bracket'></i></a>";
                    }
                    ?>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- banner -->
    <div class="container" style="margin-top:110px">
        <div class="owl-carousel">
            <div class="img-banner" style="height:10px;">
                <img class=" img-fluid rounded" width="400" src="<?= base_url() ?>banner/1.jpg" alt="">
            </div>
            <div class="img-banner ">
                <img class=" img-fluid rounded" width="400" src="<?= base_url() ?>banner/2.jpg" alt="">
            </div>
        </div>
    </div>

    <!-- CARD -->
    <div class="populer">
        <div class="container">
            <div class="row">
                <div class="col mt-4">
                    <h3>Daftar Buku</h3>
                </div>
                <div class="col text-end text-secondary">
                    <div class="mt-3">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                <?php foreach($semua_buku as $buku) : ?>
                <!-- Card 1 -->
                <div class="col">
                        <div class="card mr-2" style="border: none; background: transparent;">
                            <a href="<?= base_url() ?>pinjam_buku/<?= $buku['id_buku']?>">
                                <div class="img-card mt-1 mr-1 ml-1 mb-1" style="max-height: 400px; max-weight: 400px; overflow: hidden;">
                                    <img src="<?= base_url() ?>buku/<?= $buku['sampul_buku']?>" class="card-img-top img-fluid" alt="course">
                                </div>
                            </a>
                            <div class="kategori mt-2">
                                <p><a href="#"><?= $buku['nama_kategori_buku']?></a></p>
                            </div>
                            <div class="judul">
                                <h6 class="mb-2"><a href="<?= base_url() ?>pinjam_buku/<?= $buku['id_buku']?>"><?= $buku['judul']?></a></h6>
                            </div>
                        </div>
                </div>
                <?php endforeach ?>
        </div>
    </div>
    <!-- script jquery -->
    <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <!-- script popper -->
    <script src="<?= base_url() ?>popper/popper.js"></script>
    <!-- script bootsrap -->
    <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- script bootsrap -->
    <!-- script sweeetalert -->
    <script src="<?= base_url() ?>sweetalert/alert.js"></script>
    <script>
		$(function() {
			<?php if (session()->has("success")) { ?>
				Swal.fire({
					icon: 'success',
					title: 'Berhasil Login',
					text: '<?= session("success") ?>'
				})
			<?php } ?>
		});
	</script>
    <script>
		$(function() {
			<?php if (session()->has("info")) { ?>
				Swal.fire({
					icon: 'info',
					title: 'Info',
					text: '<?= session("info") ?>'
				})
			<?php } ?>
		});
	</script>
    <!-- owl script -->
    <script src="<?= base_url() ?>owl-slide/dist/owl.carousel.min.js"></script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            // nav:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true
        });
        $('.play').on('click',function(){
            owl.trigger('play.owl.autoplay',[1000])
        })
        $('.stop').on('click',function(){
            owl.trigger('stop.owl.autoplay')
        })
    </script>
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
    <script>
		$(function() {
			<?php if (session()->has("error")) { ?>
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: '<?= session("error") ?>'
				})
			<?php } ?>
		});
	</script>
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
      var navbar = document.querySelector(".navbar");

      function handleScroll() {
        navbar.classList.toggle("sticky", window.scrollY > 0);
      }

      window.addEventListener("scroll", handleScroll);

      // Initial check for sticky on page load
      handleScroll();
    });
  </script>
</body>
</html>