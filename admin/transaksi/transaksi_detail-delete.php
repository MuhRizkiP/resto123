<?php
$id_detail_transaksi = $_GET['id_detail_transaksi'];
$nomor_transaksi = $_GET['nomor transaksi'];
$query_delete = $koneksi->query("DELETE FROM detail_transaksi WHERE id_detail_transaksi = '$id_detail_transaksi'");

if ($query_delete) {
     ?>
          <script>
               window.alert('Data berhasil di DELETE !');
               window.location.href='?page=transaksi-detail-create&nomor_transaksi=<?=$nomor_transaksi ?>';
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