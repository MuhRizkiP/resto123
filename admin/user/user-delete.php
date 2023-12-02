<?php
$id_user = $_GET['id_user'];
$query_delete = $koneksi->query("DELETE FROM user WHERE id_user = '$id_user'");

if ($query_delete) {
?>
    <script>
        window.alert('Data berhasil di DELETE !');
        window.location.href = '?page=user';
    </script>
<?php
} else {
?>
    <script>
        window.alert('Data gagal di DELETE !');
        window.location.href = '?page=user';
    </script>
<?php
}
?>