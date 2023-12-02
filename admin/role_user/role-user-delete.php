<?php
$id = $_GET['id_role_user'];

$query = $koneksi->query("DELETE FROM role_user WHERE id_role_user = '$id'");
if ($query) {
    $_SESSION['CRUD'] = 'delete';
?>
    <script>
        window.alert('Data Berhasil di Hapus');
        window.location.href = '?page=role-user';
    </script>
<?php
} else {
?>
    <script>
        window.alert('Data Gagal di Hapus');
        window.location.href = '?page=role-user';
    </script>
<?php
}
?> 