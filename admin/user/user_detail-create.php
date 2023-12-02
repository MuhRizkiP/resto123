<?php
if ($_POST) {
    $nama_role_user         = $_POST['nama_role_user'];
    $nama_user              = $_POST['nama_user'];
    $username               = $_POST['username'];
    $password               = $_POST['password'];
    $photo_user             = $_FILES['photo_user']['name'];

    $password = password_hash($password, PASSWORD_BCRYPT);

    $target_lokasi         = "../../assets/image/user/";

    move_uploaded_file($_FILES['photo_user']['tmp_name'],$target_lokasi.$photo_user);

    $query_insert = $koneksi->query("INSERT INTO user (id_role_user,nama_user,username,password,photo_user)
                                  VALUES('$nama_role_user','$nama_user','$username','$password','$photo_user')");
    if ($query_insert) {
?>
        <script>
            window.alert('Data Berhasil Ditambahkan');
            window.location.href = '?page=user';
        </script>
    <?php
    } else {
    ?>
        <script>
            window.alert('Data Gagal Ditambahkan');
            window.location.href = '?page=user';
        </script>
<?php
    }
}
?>