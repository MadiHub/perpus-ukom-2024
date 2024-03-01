    <!-- banner -->
    <div class="container-content" style="margin-top:110px">
        <div class="owl-carousel">
            <div class="img-banner" >
                <img class=" img-fluid rounded" src="<?= base_url() ?>banner/3.png" alt="">
            </div>
            <div class="img-banner ">
                <img class=" img-fluid rounded" src="<?= base_url() ?>banner/2.png" alt="">
            </div>
            <div class="img-banner ">
                <img class=" img-fluid rounded" src="<?= base_url() ?>banner/1.png" alt="">
            </div>
        </div>
    </div>
    
    <!-- CARD -->
    <div class="populer">
        <div class="container-content">
            <div class="row">
                <div class="text-end text-secondary">
                    <div class="mt-3 d-flex justify-content-end mb-3 ">
                        <form class="d-flex" role="search" action="<?= base_url() ?>" method="get">
                            <div class="reload">
                                <a href="<?= base_url() ?>" class="btn mr-5" style="background-color: #862B0D; color: #FFC95F;"><i class="fa-solid fa-rotate-right"></i></a>
                            </div>
                            <input class="form-control me-2 text-align-center" type="search" placeholder="Temukan Buku Mu.." aria-label="Search" name="cari_buku" style="width: 200px;">
                            <button class="btn btn-outline" style="background-color: #862B0D; color: #FFC95F;" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
                <!-- <div class="container"> -->
                <div class="card" style="background-color: #FFF9C9;">
                <div class="card-header">
                <h3 class="text-center mt-3" style="color: #862B0D;">Daftar Buku</h3>
                </div>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mt-3 text-center">
                    <?php if (empty($semua_buku)): ?>
                        <img src="<?= base_url() ?>buku/buku404.png" class="img buku-404" alt="course">
                    <?php else: ?>
                        <?php foreach($semua_buku as $buku): ?>
                            <!-- Card 1 -->
                            <div class="col">
                                <div class="card-produk mr-5">
                                    <a href="<?= base_url() ?>pinjam_buku/<?= $buku['id_buku']?>">
                                        <div class="img-card-produk mt-1 mr-1 ml-1 mb-1" style="max-height: 400px; max-weight: 400px; overflow: hidden;">
                                            <img src="<?= base_url() ?>buku/<?= $buku['sampul_buku']?>" class="card-produk-img-top img-fluid" alt="course">
                                        </div>
                                    </a>
                                    <div class="kategori text-start">
                                        <p><a href="<?= base_url() ?>ID-<?= $buku['id_kategori_buku']?>"><?= $buku['nama_kategori_buku']?></a></p>
                                    </div>
                                    <div class="judul text-start">
                                        <h6 class="mb-2"><a href="<?= base_url() ?>pinjam_buku/<?= $buku['id_buku']?>"><?= $buku['judul']?></a></h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
    
  
</body>
</html>