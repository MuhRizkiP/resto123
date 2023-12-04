<?php
$id_user                = $_POST['id_user'];
$nama_role_user         = $_POST['nama_role_user'];
$nama_user              = $_POST['nama_user'];
$username               = $_POST['username'];
$password               = $_POST['password'];
$nama_foto              = $_FILES['photo_user']['name'];


$target_lokasi         = "../../assets/image/user/";

move_uploaded_file($_FILES['photo_user']['tmp_name'], $target_lokasi . $nama_foto);

if ($_POST) {
    $id_user            = $_POST['id_user'];
    $nama_role_user     = $_POST['nama_role_user'];
    $nama_user          = $_POST['nama_user'];
    $username           = $_POST['username'];
    $password           = $_POST['password'];
    $nama_foto          = $_FILES['photo_user']['name'];

    $password = password_hash($password, PASSWORD_BCRYPT);

    if ($password == '') {
        $query_update = $koneksi->query("UPDATE user
                                    SET id_role_user        ='$nama_role_user',
                                        nama_user           ='$nama_user',
                                        username            ='$username',
                                        password            ='$password',
                                        photo_user          ='$nama_foto'

                                        WHERE id_user       ='$id_user'
                                        ");
    } else {
        $query_update = $koneksi->query("UPDATE user
                                    SET id_role_user        ='$nama_role_user',
                                        nama_user           ='$nama_user',
                                        username            ='$username',
                                        password            ='$password',
                                        photo_user          ='$nama_foto'

                                        WHERE id_user       ='$id_user'
                                        ");
    }
    if ($query_update) {
?>
        <script>
            window.alert('Data Berhasil Di ubah');
            window.location.href = '?page=user';
        </script>
    <?php
    } else {
    ?>
        <script>
            window.alert('Data Gagal Diubah');
            window.location.href = '?page=user';
        </script>
<?php
    }
}

?>