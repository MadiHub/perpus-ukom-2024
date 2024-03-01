<div class="container-content" style="margin-top: 110px">
    <div class="row">
        <!-- Card untuk Gambar -->
        <div class="col-md-4 text-center text-md-start mb-4">
            <div class="card">
                <img src="<?= base_url() ?>buku/<?= $sampul_buku ?>" alt="Produk" class="card-img-top">
                <!-- avg rating -->
                <div id="avgRating" class="card-body">
                    <!-- avg end -->
                </div>
            </div>
        </div>

        <!-- Card untuk Penjelasan -->
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Detail Buku
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mt-4">
                        <tbody>
                            <tr>
                                <th scope="row">Judul</th>
                                <td><?= $judul ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td><?= $nama_kategori_buku ?></td>
                            </tr>
                            <!-- ... (data lainnya) ... -->
                        </tbody>
                    </table>
                    <!-- ... (lanjutan penjelasan) ... -->
                </div>
            </div>
        </div>
    </div>

    <!-- Ulasan dan Rating -->
    <div class="ulasan mt-4">
        <ul class="nav nav-tabs" id="myTabs">
            <!-- ... (tab lainnya) ... -->
            <li class="nav-item">
                <a class="nav-link active text-secondary" aria-current="page" href="#" data-bs-toggle="tab" data-bs-target="#content1">Ulasan & Rating</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-secondary" href="#" data-bs-toggle="tab" data-bs-target="#content2">Lihat Ulasan</a>
            </li>
            <li class="nav-item">
                <form action="<?= base_url() ?>proses_tambah_koleksi" method="post">
                    <input type="hidden" name="id_member" value="<?= $id_member?>">
                    <input type="hidden" name="id_buku" value="<?= $id_buku?>">
                    <input type="hidden" name="id_kategori_buku" value="<?= $id_kategori_buku?>">
                    <button type="submit"  class="nav-link  text-secondary"><i class="fa-solid fa-bookmark"></i> Tambah Koleksi</button>
                </form>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="content1">
                <!-- ... (form ulasan) ... -->
                <form action="<?= base_url() ?>proses_ulasan" method="post">
                    <input type="hidden" name="id_member" value="<?= $id_member ?>">
                    <input type="hidden" name="id_buku"  value="<?= $id_buku ?>">
                    <div class="form-floating mt-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="ulasan"></textarea>
                        <label for="floatingTextarea" class=" text-secondary">Berikan Ulasan</label>
                    </div>
                    <div id="rateYo" class="mt-2 mb-2"
                        data-rateyo-full-star="true">
                    </div>
                    <span class="result mt-3">Rating: 0</span>
                    <input type="hidden" name="rating">
                    <button class="btn w-100 mt-3" style="background-color: #DF791E; color: #ffff;">Kirim</button>
                </form>
            </div>
            <div class="tab-pane fade" id="content2">
                <?php if(empty($semua_ulasan) ): ?>
                    <span style="color: #DF791E">Belum ada ulasan...</span>
                <?php endif; ?>
                <?php foreach($semua_ulasan as $ulasan): ?>
                <div class="profil">
                    <div class="row">
                        <div class="col">
                            <span><?= $ulasan['tanggal_ulasan']?></span>
                            <br>
                            <i class="fa-solid fa-user"></i>   
                            <span><?= $ulasan['nama_lengkap']?></span>
                            <br>
                            <span><?= $ulasan['ulasan'] ?></span>
                        </div>
                        <div class="col text-end">
                            <div class="rating" data-rating="<?= $ulasan['rating'] ?>" id="rating-data<?= $ulasan['id_member'] ?>"></div>
                            <span>Rating: <?= $ulasan['rating'] ?></span>
                        </div>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>            
            </div>
        </div>
    </div>
</div>
