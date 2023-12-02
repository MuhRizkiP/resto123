<?php
$id = $_POST['id_role_user'];
$nama_role_user = $_POST['nama_role_user'];
        $query_update = $koneksi->query("UPDATE role_user SET 
                                        nama_role_user = '$nama_role_user'
                                        where id_role_user = '$id'
                                        ");
                                        if($query_update){
?>
        <script>
            window.alert('Data Berhasil di Edit !');
            window.location.href = '?page=role-user';
        </script>
   
        
    <?php
    } else {
    ?>
        <script>
            window.alert('Data gagal di Edit !');
            window.location.href = '?page=role-user-edit';
        </script>
<?php
    }