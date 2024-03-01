<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row">
        <button type="button" class="btn btn-primary mb-3" style="width: 200px"data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-square-plus"></i> Tambah Sub Kategori
        </button>
            <div class="card">
                <div class="card-body">
                    <table id="myTablekategori" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id Sub Kategori</th>
                                <th>Nama Sub Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($semua_sub_kategori as $sub_k): ?>
                            <tr>
                                <td><?= $sub_k['id_sub_kategori'] ?></td>
                                <td><?= $sub_k['nama_sub_kategori'] ?></td>
                                <td><?= $sub_k['nama_kategori_buku'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success mr-2" id="btn-edit-sub-k"
                                        data-bs-toggle="modal"  data-bs-target="#editSBuku"
                                        data-id_sub_kategori="<?= $sub_k['id_sub_kategori'] ?>"
                                        data-id_kategori_buku="<?= $sub_k['id_kategori_buku'] ?>"
                                        data-nama_sub_kategori="<?= $sub_k['nama_sub_kategori'] ?>"
                                        data-nama_kategori_buku="<?= $sub_k['nama_kategori_buku'] ?>"
                                        > <i class="fa-solid fa-square-pen"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="hapusKBuku('<?= $sub_k['id_sub_kategori'] ?>', '<?= $sub_k['nama_sub_kategori'] ?>')">
                                        <i class="fa-solid fa-trash-can"></i>
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
     <div class="ms-auto">Dibuat Oleh&nbsp; <span class="text-primary">Rahmadi Cahyo Saputro</span></div>
    </footer>
</div>
<!-- script bootsrap -->
<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Modal Tambah Kategori-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sub Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_tambah_sub_kategori">
                    <div class="mb-3">
                        <label for="input" class="form-label">Id Sub Kategori</label>
                        <input type="text" class="form-control" name="id_sub_kategori"  value="<?= $kode_sub ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Nama Sub Kategori</label>
                        <input type="text" class="form-control" name="nama_sub_kategori"  aria-describedby="nama sub kategori buku" placeholder="Nama Sub Kategori">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Dari Kategori</label>
                        <select id="id_kategori_buku" name="id_kategori_buku" class="form-select" placeholder="id_kategori_buku">
                            <?php foreach($semua_kategori_buku as $k_buku ): ?>
                                <option value="<?= $k_buku['id_kategori_buku']?>"><?= $k_buku['nama_kategori_buku']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Kategori-->
<div class="modal fade" id="editSBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>proses_edit_sub_kategori">
                    <div class="mb-3">
                        <label for="input" class="form-label">Id Sub Kategori</label>
                        <input type="text" class="form-control" name="id_sub_kategori" id="id_sub_kategori" aria-describedby="id_sub_kategori" placeholder="id_sub_kategori" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Sub Kategori</label>
                        <input type="text" class="form-control" name="nama_sub_kategori" id="nama_sub_kategori" aria-describedby="nama kategori buku" placeholder="Nama Kategori Buku">
                    </div>
                    <div class="mb-3">
                        <label for="input" class="form-label">Dari Kategori</label>
                        <select id="id_kategori_buku" name="id_kategori_buku" class="form-select" placeholder="id_kategori_buku">
                            <?php foreach($semua_kategori_buku as $k_buku ): ?>
                                <option value="<?= $k_buku['id_kategori_buku']?>"><?= $k_buku['nama_kategori_buku']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- script jquery -->
<script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
<!-- script datatables -->
<script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  
<!-- sweetalert -->
<script src="<?= base_url() ?>sweetalert/alert.js"></script>
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
<!-- script hapus buku -->
<script>
    function hapusKBuku(id_sub_kategori, nama_sub_kategori) {
        Swal.fire({
            title: "Apa anda yakin?",
            text: "Data Sub Kategori : " + nama_sub_kategori + " ini akan terhapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal" 
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url() ?>hapus_sub_kategori/' + id_sub_kategori;

            }
        });
    }
</script>
<!-- script edit kategori buku -->
<script>
    $(document).on('click', '#btn-edit-sub-k', function() {
        $('.modal-body #id_sub_kategori').val($(this).data('id_sub_kategori'));
        $('.modal-body #id_kategori_buku').val($(this).data('id_kategori_buku'));
        $('.modal-body #nama_kategori_buku').val($(this).data('nama_kategori_buku'));
        $('.modal-body #nama_sub_kategori').val($(this).data('nama_sub_kategori'));
    })
</script>