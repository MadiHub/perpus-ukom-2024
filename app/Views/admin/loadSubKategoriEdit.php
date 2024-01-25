<label for="input" class="form-label">Pilih Sub Kategori</label>
<select class="form-select select-siswa" aria-label="Default select example"  name="id_sub_kategori" id="id_sub_kategori">
<?php

if (empty($semua_sub_kategori)) {
    echo "<option>Sub Kategori Belum Ada</option>";
} else {
    foreach ($semua_sub_kategori as $s) {
        ?>
        <option value="<?php echo $s['id_sub_kategori']; ?>"><?php echo $s['nama_sub_kategori']; ?></option>

<?php } } ?>
</select>