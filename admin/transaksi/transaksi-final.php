<?php
$id_transaksi   = $_POST['id_transaksi'];
$grand_total    = $_POST['grand_total'];

$query_update_tr = $koneksi->query("UPDATE transaksi SET
                                      grand_total_harga = '$grand_total', 
                                      status_transaksi = 'selesai' 
                                      WHERE id_transaksi = '$id_transaksi'
                                      ");
if ($query_update_tr) {
    ?>
    <script>
        window.alert('Transaksi Telah Diselesaikan !');
        window.open('../../assets/invoice/index.php?id_transaksi=<?= $id_transaksi?>', '_blank'); 
        window.location.href="?page=transaksi&id_transaksi=<?= $id_transaksi?>";
    </script>
    <?php
}
?>


    