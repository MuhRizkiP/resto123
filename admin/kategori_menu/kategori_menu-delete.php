<?php
$id_kategori_menu = $_GET['id_kategori_menu'];

$target_lokasi ="../../assets/image/kategori_menu/";
$query = $koneksi->query("SELECT foto_kategori_menu FROM kategori_menu 
                              WHERE id_kategori_menu = '$id_kategori_menu'");
                              
 $nama_foto_lama = $query->fetch_object()->foto_kategori_menu; 
 unlink("../../assets/image/kategori_menu/$nama_foto_lama");
 
$query_delete = $koneksi->query("DELETE FROM kategori_menu WHERE id_kategori_menu = '$id_kategori_menu'");

if ($query_delete) {
     ?>
          <script>
               window.alert('Data berhasil di DELETE !');
               window.location.href='?page=kategori_menu';
          </script>
     <?php
}else{
     ?>
          <script>
               window.alert('Data gagal di DELETE !');
               window.location.href='?page=kategori_menu';
          </script>
     <?php
}
?>