<?php
$id_menu           = $_POST['id_menu'];
$id_kategori_menu  = $_POST['id_kategori_menu'];
$nama_menu         = $_POST['nama_menu'];
$deskripsi_menu    = $_POST['deskripsi_menu'];
$harga_menu        = $_POST['harga_menu'];
$status_menu       = $_POST['status_menu'];

$nama_foto         = $_FILES['foto_menu']['name'];   


if ($nama_foto == "") {
     $query_update = $koneksi->query("UPDATE menu SET 
     id_kategori_menu = '$id_kategori_menu',
     nama_menu        = '$nama_menu',
     deskripsi_menu   = '$deskripsi_menu',
     harga_menu       = '$harga_menu',
     status_menu      = '$status_menu'
                                        WHERE id_menu = '$id_menu'");
}else{
     $target_lokasi = "../../assets/image/menu/";
     $query = $koneksi->query("SELECT foto_menu FROM menu WHERE id_menu = '$id_menu'");
     $nama_foto_lama = $query->fetch_object()->foto_menu; 
     unlink("../../assets/image/menu/$nama_foto_lama");
     move_uploaded_file($_FILES['foto_menu']['tmp_name'],$target_lokasi.$nama_foto);

     $query_update = $koneksi->query("UPDATE menu SET 
     id_kategori_menu = '$id_kategori_menu',
     nama_menu        = '$nama_menu',
     deskripsi_menu   = '$deskripsi_menu',
     harga_menu       = '$harga_menu',
     status_menu      = '$status_menu',
     foto_menu        = '$nama_foto'
     WHERE id_menu    = '$id_menu'
");
}

if ($query_update) {
     ?>
          <script>
               window.alert('Data berhasil diupdate');
               window.location.href='?page=menu';
          </script>
     <?php
}else{
     ?>
          <script>
               window.alert('Data gagal diupdate');
               window.location.href='?page=menu';
          </script>
     <?php
}
?>