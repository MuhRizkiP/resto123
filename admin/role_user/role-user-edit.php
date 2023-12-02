<?php
$id = $_GET['id_role_user'];
$query_select = $koneksi->query("SELECT * FROM role_user WHERE id_role_user = '$id' ");
$data = $query_select->fetch_assoc();
?>
<form action="?page=role-user-update" method="POST">
    <h3>Edit Role User</h3>
    <div class="mb-3">
    <input value="<?= $id ?>" type="text" class="form-control" name="id_role_user" id="id_role_user" hidden>
        <label for="nama_role_user" class="form-label">Nama Role User</label>
        <input value="<?= $data['nama_role_user'] ?>" type="text" class="form-control" name="nama_role_user" id="nama_role_user">
    </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <!-- <a type="" class="btn btn-info">Kembali</a> -->
    </div>
</form>