<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>
    <link rel="stylesheet" href="<?= base_url() ?>bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>owl-slide/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>owl-slide/dist/assets/owl.theme.default.min.css">

    <style>
        .container {
            max-width: 1200px;
            width: 75%;
            margin: auto;
        }

        /* Responsive container for mobile */
        @media only screen and (max-width: 767px) {
            .container {
                width: 95%;
                margin: auto;
            }
        }

        .navbar-nav .nav-link.active {
         color:  rgb(48, 21, 248) !important;
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
                width: 13rem; 
            }
        }

        .judul h5 a {
            font-weight: 500;
            font-size: 20px;
            color: black;
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            transition: color 0.3s; 
        }

        .judul h5 a:hover {
            color: #0193C5;
            text-decoration: none; /* Menghilangkan garis bawah pada hover */
        }



    </style>
    

</head>
<body>

   <!-- navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- navbar end -->

    <!-- banner -->
    <div class="container">
        <div class="owl-carousel mt-5">
            <div class="img-banner ">
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
                <!-- Card 1 -->
                <div class="col">
                    <div class="card mb-3 mr-2">
                        <div class="img mt-1 mr-1 ml-1 mb-1" style="max-height: 250px; overflow: hidden;">
                            <img src="buku/1.jpg" class="card-img-top img-fluid" alt="course">
                        </div>
                        <div class="card-body">
                            <div class="judul">
                                <h5 class="mb-4"><a href="#">Ancika 1995</a></h5>
                            </div>
                            <hr>
                            <p>Kategori : Fiksi</p>
                            <hr>
                            <button class="btn btn-block btn-primary w-100">Pinjam</button>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col">
                    <div class="card mb-3 mr-2">
                        <div class="img mt-1 mr-1 ml-1 mb-1" style="max-height: 250px; overflow: hidden;">
                            <img src="buku/2.jpg" class="card-img-top img-fluid" alt="course">
                        </div>
                        <div class="card-body">
                            <div class="judul">
                                <h5 class="mb-4"><a href="#">Dongeng Free Fire</a></h5>
                            </div>
                            <hr>
                            <p>Kategori : Fiksi</p>
                            <hr>
                            <button class="btn btn-block btn-primary w-100">Pinjam</button>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col">
                    <div class="card mb-3 mr-2">
                        <div class="img mt-1 mr-1 ml-1 mb-1" style="max-height: 250px; overflow: hidden;">
                            <img src="buku/3.jpg" class="card-img-top img-fluid" alt="course">
                        </div>
                        <div class="card-body">
                            <div class="judul">
                                <h5 class="mb-4"><a href="#">Kedamaian</a></h5>
                            </div>
                            <hr>
                            <p>Kategori : Fiksi</p>
                            <hr>
                            <button class="btn btn-block btn-primary w-100">Pinjam</button>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col">
                    <div class="card mb-3 mr-2">
                        <div class="img mt-1 mr-1 ml-1 mb-1" style="max-height: 250px; overflow: hidden;">
                            <img src="buku/4.jpg" class="card-img-top img-fluid" alt="course">
                        </div>
                        <div class="card-body">
                            <div class="judul">
                                <h5 class="mb-4"><a href="#">Lorem Ipsum</a></h5>
                            </div>
                            <hr>
                            <p>Kategori : Fiksi</p>
                            <hr>
                            <button class="btn btn-block btn-primary w-100">Pinjam</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script jquery -->
    <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <!-- script popper -->
    <script src="<?= base_url() ?>popper/popper.js"></script>
    <!-- script bootsrap -->
    <script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
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
</body>
</html>