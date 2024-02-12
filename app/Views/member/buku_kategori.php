
    <!-- CARD -->
    <div class="populer" style="margin-top:110px">
        <div class="container-content">
            <div class="row">
                <div class="col mt-4">
                    <h3>Daftar Buku <?= $judul ?></h3>
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
                <?php if (empty($buku_kategori)): ?>
                    <img src="<?= base_url() ?>buku/buku404.png" class="img buku-404" alt="course">
                <?php else: ?>
                <?php foreach($buku_kategori as $buku) : ?>
                <!-- Card 1 -->
                <div class="col">
                        <div class="card-produk mr-2" style="border: none; background: transparent;">
                            <a href="<?= base_url() ?>pinjam_buku/<?= $buku['id_buku']?>">
                                <div class="img-card-produk mt-1 mr-1 ml-1 mb-1" style="max-height: 400px; max-weight: 400px; overflow: hidden;">
                                    <img src="<?= base_url() ?>buku/<?= $buku['sampul_buku']?>" class="card-produk-img-top img-fluid" alt="course">
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
                <?php endif; ?>
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