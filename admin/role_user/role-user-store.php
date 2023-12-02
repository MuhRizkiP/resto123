<?php
require('role-user.php');
    $nama_role_user    = $_POST['nama_role_user'];


    $query = $koneksi->query("INSERT INTO role_user VALUES ('', '$nama_role_user')
                        ");
    if ($query) {
        ?>
        <script>
            window.alert('Data berhasil disimpan')
            window.location.href='../layout/admin.php?page=role-user';
        </script>
        <?php
    }else{
        ?>
        <script>
            window.alert('Data Gagal disimpan')
            window.location.href='../layout/admin.php?page=role-user-create';
        </script>
        <?php
    }

?>