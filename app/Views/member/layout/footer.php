<!-- Footer -->
<footer class="text-center text-lg-start mt-5 shadow"  style="background-color: #862B0D; color:#FFC95F;" >
        <div class="container p-4 pb-0">
        <section class="">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                    Eternal Library
                    </h6>
                    <p>
                    Perpustakaan Digital 24 Jam
                    </p>
                </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Kategori</h6>
                <div class="row row-cols-4 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 ">
                    <?php foreach($semua_kategori_buku as $k) : ?>
                    <div class="col">
                        <div class="kategori mt-2">
                            <p>
                            <a href="<?= base_url() ?>ID-<?= $k['id_kategori_buku']?>"  style="color:#FFC95F;" class="text" ><?= $k['nama_kategori_buku']?></a>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Info</h6>
                <p><i class="fa-solid fa-location-dot"></i> Bekasi, Jembatan Viral 2 Arah</p>
                <p><i class="fas fa-envelope mr-3"></i> eternal_library@gmail.com</p>
                <p><i class="fas fa-phone mr-3"></i> + 08 210 447 88</p>
            </div>
            </div>
        </section>
        <hr class="my-3">
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                <!-- Grid column -->
                <div class="col-md-7 col-lg-8 text-center text-md-start">
                    <!-- Copyright -->
                    <div class="p-3">
                    © 2024 Copyright:
                    <a class="text" href="https://mdbootstrap.com/"
                        >Rahmadi Cahyo Saputro Dev</a
                        >
                    </div>
                    <!-- Copyright -->
                </div>
                <!-- Grid column -->
                </div>
            </section>
        </div>
    </footer>