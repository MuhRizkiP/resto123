<?php
$id_role_user   = $_POST ['id_role_user'];
$nama_user      = $_POST ['nama_user'];
$username       = $_POST ['username'];
$password       = $_POST ['password'];
$photo_user     = $_FILES['photo_user']['name'];


$target_lokasi         = "../../assets/image/user/";

move_uploaded_file($_FILES['photo_user']['tmp_name'],$target_lokasi.$nama_foto);


$query =$koneksi->query("INSERT INTO user VALUES ('',
                                                  '$id_role_user',
                                                  '$nama_user',
                                                  '$username',
                                                  '$password',
                                                  '$photo_user'
                                                  )");
if ($query)
{
     ?>
     <script>
        window.alert('data berhasil disimpan');
        window.location.href='index.php?page=user';
     </script>
     <?php
}
else
{
    ?>
    <script>
        window.alert('data gagal disimpan');
        window.location.href='index.php?page=user';
    </script>
    <?php
}