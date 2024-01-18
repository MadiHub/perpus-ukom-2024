    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url() ?>admin/dist/vendors/chart.js/js/chart.min.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="<?= base_url() ?>admin/dist/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?= base_url() ?>admin/dist/js/main.js"></script>
  
    <!-- script datatables -->
    <script src="<?= base_url() ?>jquery/jquery.slim.min.js"></script>
    <script src="<?= base_url() ?>DataTables/datatables.min.js"></script>  
    <script>
      $(document).ready(function() {
          $('#myTable').DataTable();
      });
    </script>

<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>



<!-- Modal Tambah Kategori-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url() ?>proses_tambah_kategori_buku">
        <div class="mb-3">
          <input type="text" class="form-control" name="nama_kategori_buku"  aria-describedby="nama kategori buku" placeholder="Nama Kategori Buku">
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit Kategori-->
<div class="modal fade" id="editKBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url() ?>proses_edit_kategori_buku">
      <input type="hidden" name="id_kategori_buku" id="id_kategori_buku">
        <div class="mb-3">
          <input type="text" class="form-control" name="nama_kategori_buku" id="nama_kategori_buku" aria-describedby="nama kategori buku" placeholder="Nama Kategori Buku">
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Edit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- script edit kategori buku -->
<script>
    $(document).on('click', '#btn-edit-k-buku', function() {
        $('.modal-body #id_kategori_buku').val($(this).data('id_kategori_buku'));
        $('.modal-body #nama_kategori_buku').val($(this).data('nama_kategori_buku'));
    })
</script>
  </body>
</html>