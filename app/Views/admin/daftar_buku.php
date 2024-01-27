<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row">
        <button type="button" class="btn btn-primary mb-3" style="width: 200px"data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-square-plus"></i>  Tambah Buku
        </button>
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id Buku</th>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Nama Kategori</th>
                                <th>Nama Sub Kategori</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($semua_buku as $buku): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $buku['id_buku'] ?></td>
                                <td><img src="<?= base_url() ?>buku/<?= $buku['sampul_buku'] ?>" alt="" width="50"></td>
                                <td><?= $buku['judul'] ?></td>
                                <?php 
                                $nama_kategori = $buku['nama_kategori_buku'];
                                if ($buku['id_kategori_buku'] == null) {
                                    echo '<td>Belum Ada Kategori</td>';
                                } else {
                                    echo "<td>$nama_kategori</td>
                                    ";
                                }
                                ?>
                                <?php 
                                $nama_sub_kategori = $buku['nama_sub_kategori'];
                                if ($buku['id_sub_kategori'] == null) {
                                    echo '<td>Belum Ada Sub Kategori</td>';
                                } else {
                                    echo "<td>$nama_sub_kategori</td>
                                    ";
                                }
                                ?>
                                <td><?= $buku['penulis'] ?></td>
                                <td><?= $buku['penerbit'] ?></td>
                                <td><?= $buku['tahun_terbit'] ?></td>
                                <td><?= $buku['stok'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success mr-2" id="btn-edit-buku"
                                        data-bs-toggle="modal"  data-bs-target="#editBuku"
                                        data-id_buku="<?= $buku['id_buku'] ?>"
                                        data-id_kategori_buku="<?= $buku['id_kategori_buku'] ?>"
                                        data-id_sub_kategori="<?= $buku['id_sub_kategori'] ?>"
                                        data-judul="<?= $buku['judul'] ?>"
                                        data-nama_kategori_buku="<?= $buku['nama_kategori_buku'] ?>"
                                        data-nama_sub_kategori="<?= $buku['nama_sub_kategori'] ?>"
                                        data-sampul_buku="<?= $buku['sampul_buku'] ?>"
                                        data-penulis="<?= $buku['penulis'] ?>"
                                        data-stok="<?= $buku['stok'] ?>"
                                        data-penerbit="<?= $buku['penerbit'] ?>"
                                        data-tahun_terbit="<?= $buku['tahun_terbit'] ?>"
                                        > <i class="fa-solid fa-square-pen"></i>
                                    </button>
                                    
                                    <button type="button" class="btn btn-danger" onclick="hapusBuku('<?= $buku['id_buku'] ?>', '<?= $buku['judul'] ?>')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <button type="button" class="btn btn-success mt-3" id="btn-edit-buku-sub-k"
                                        data-bs-toggle="modal"  data-bs-target="#editSubKatBuku"
                                        data-id_buku="<?= $buku['id_buku'] ?>"
                                        data-judul="<?= $buku['judul'] ?>"
                                        data-id_kategori_buku="<?= $buku['id_kategori_buku'] ?>"
                                        data-id_sub_kategori="<?= $buku['id_sub_kategori'] ?>"
                                        data-nama_kategori_buku="<?= $buku['nama_kategori_buku'] ?>"
                                        data-nama_sub_kategori="<?= $buku['nama_sub_kategori'] ?>"
                                        >
                                        Edit Kategori
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer">
    <div class="ms-auto">Powered by&nbsp;<a href="<?= base_url() ?>admin/dist/https://coreui.io/docs/">Rahmadi Cahyo Saputro</a></div>
    </footer>
</div>

<!-- script jquery -->
<script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
<!-- script datatables -->
<script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<!-- script bootsrap -->
<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Modal Tambah Buku-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_tambah_buku" enctype="multipart/form-data">           
                    <div class="mb-3">
                        <label for="input" class="form-label">Id Buku</label>
                        <input type="text" class="form-control" name="id_buku"  aria-describedby="judul buku" placeholder="Judul Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul"  aria-describedby="judul buku" placeholder="Judul Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="penulis"  aria-describedby="penulis buku" placeholder="Penulis Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit"  aria-describedby="penerbit buku" placeholder="Penerbit Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_terbit"  aria-describedby="Tahun Terbit buku" placeholder="Tahun Terbit Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok"  aria-describedby="Tahun Terbit buku" placeholder="Stok Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Kategori Buku</label>
                        <select  id="id_kategori_buku" name="id_kategori_buku" class="form-select" placeholder="id_kategori_buku">
                            <option value="null">--Pilih Kategori--</option>
                            <?php foreach($semua_kategori_buku as $k_buku ): ?>
                            <option value="<?= $k_buku['id_kategori_buku']?>"><?= $k_buku['nama_kategori_buku']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 " id="loadSubKategori" >
                            
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Sampul</label>
                        <input type="file" class="form-control" name="sampul_buku"aria-describedby="sampul buku" placeholder="Sampul Buku" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Buku-->
<div class="modal fade" id="editBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_edit_buku" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_buku" id="id_buku" aria-describedby="id judul buku" placeholder="Judul Buku">
                    <div class="mb-3">
                        <label for="input" class="form-label">Id Buku</label>
                        <input type="text" class="form-control" id="id_buku" name="id_buku" aria-describedby="judul buku" placeholder="Judul Buku" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" aria-describedby="judul buku" placeholder="Judul Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="penulis" id="penulis" aria-describedby="penulis buku" placeholder="Penulis Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" id="penerbit" aria-describedby="penerbit buku" placeholder="Penerbit Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" aria-describedby="Tahun Terbit buku" placeholder="Tahun Terbit Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok" aria-describedby="Tahun Terbit buku" placeholder="Stok Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Sampul</label>
                        <input type="file" class="form-control" name="sampul_buku" id="sampul_buku" aria-describedby="sampul buku" placeholder="Sampul Buku">
                        <?= csrf_field() ?>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Kategori dan sub kategori Buku-->
<div class="modal fade" id="editSubKatBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_edit_kategori_sub_buku" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="input" class="form-label">Id Buku</label>
                        <input type="text" class="form-control"  id="id_buku" name="id_buku" id="id_sub_kategori" aria-describedby="judul buku" placeholder="Judul Buku" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Judul</label>
                        <input type="text" class="form-control" value="" id="judul" name="judul"  aria-describedby="judul buku" placeholder="Judul Buku" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Nama Kategori Lama</label>
                        <input type="text" class="form-control" value="" id="nama_kategori_buku" name="id_kategori_buku" id="id_sub_kategori" aria-describedby="judul buku" placeholder="Belum Ada Kategori" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Nama Sub Kategori Lama</label>
                        <input type="text" class="form-control" name="nama_sub_kategori" id="nama_sub_kategori" aria-describedby="judul buku" placeholder="Belum Ada Sub Kategori" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Nama Kategori Baru</label>
                        <select  id="id_kategori_buku_edit" name="id_kategori_buku" class="form-select" placeholder="id_kategori_buku">
                            <option value="null">--Pilih Kategori--</option>
                            <?php foreach($semua_kategori_buku as $k_buku ): ?>
                            <option value="<?= $k_buku['id_kategori_buku']?>"><?= $k_buku['nama_kategori_buku']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 " id="loadSubKategoriEdit" >
                            
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- script jquery -->
<script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
<script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  

<script src="<?= base_url() ?>sweetalert/alert.js"></script>


<!-- script hapus buku sweetalert -->
<script>
    function hapusBuku(id_buku, judul) {
        Swal.fire({
            title: "Apa anda yakin?",
            text: "Data buku dengan judul : " + judul + " ini akan terhapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal" 
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url() ?>hapus_buku/' + id_buku;

            }
        });
    }
</script>

<!-- script berhasil sweetalert -->
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

<!-- script edit buku -->
<script>
    $(document).on('click', '#btn-edit-buku', function() {
        $('.modal-body #id_kategori_buku').val($(this).data('id_kategori_buku'));
        $('.modal-body #id_sub_kategori').val($(this).data('id_sub_kategori'));
        $('.modal-body #id_buku').val($(this).data('id_buku'));
        $('.modal-body #judul').val($(this).data('judul'));
        $('.modal-body #nama_kategori_buku').val($(this).data('nama_kategori_buku'));
        $('.modal-body #nama_sub_kategori').val($(this).data('nama_sub_kategori'));
        $('.modal-body #penulis').val($(this).data('penulis'));
        $('.modal-body #penerbit').val($(this).data('penerbit'));
        $('.modal-body #tahun_terbit').val($(this).data('tahun_terbit'));
        $('.modal-body #stok').val($(this).data('stok'));
        $('.modal-body #sampul_buku').file($(this).data('sampul_buku'));
    })
</script>
<script>
    $(document).on('click', '#btn-edit-buku-sub-k', function() {
        $('.modal-body #id_kategori_buku').val($(this).data('id_kategori_buku'));
        $('.modal-body #id_sub_kategori').val($(this).data('id_sub_kategori'));
        $('.modal-body #id_buku').val($(this).data('id_buku'));
        $('.modal-body #judul').val($(this).data('judul'));
        $('.modal-body #nama_kategori_buku').val($(this).data('nama_kategori_buku'));
        $('.modal-body #nama_sub_kategori').val($(this).data('nama_sub_kategori'));
    })
</script>

<script>
    $(function () {
        $("#id_kategori_buku").change(function () {
            
        var selectedKategori = $(this).val();

        if (selectedKategori !== 'null') {
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>admin/getDataByKategori',
                data: {
                    id_kategori_buku: selectedKategori
                },
                cache: false,
                success: function(response) {
                    // Handle response datas
                    $("#loadSubKategori").html(response);
                }
            });

        } else {
            $("#loadSubKategori").html('');
        }
        });
    });
    $(function () {
        $("#id_kategori_buku_edit").change(function () {

        var selectedKategori = $(this).val();

        if (selectedKategori !== 'null') {
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>admin/getDataByKategori',
                data: {
                    id_kategori_buku: selectedKategori
                },
                cache: false,
                success: function(response) {
                    // Handle response datas
                    $("#loadSubKategoriEdit").html(response);
                }
            });

        } else {
            $("#loadSubKategoriEdit").html('');
        }
        });
    });
</script>