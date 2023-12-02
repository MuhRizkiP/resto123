<?php
date_default_timezone_set('Asia/Jakarta');
$waktu_transaksi = date('Y-m-d H:i:s', time());

$format_awal = 'INV/'.date('Y', time()).'/';
$query_count_transaksi = $koneksi->query("SELECT COUNT(*) as count_transaksi FROM transaksi");
$hasil_count_transksi = $query_count_transaksi->fetch_object();
$final_count_transaksi = $hasil_count_transksi->count_transaksi + 1;
$format_count_transaksi = sprintf('%04d', $final_count_transaksi);
$nomor_transaksi = $format_awal.$format_count_transaksi;

$grand_total_harga = 0;
$nama_pembeli = $_POST['nama_pembeli'];
$id_user = $_SESSION['id_user'];
$status_transaksi = 'onproses';

$query_insert_tr = $koneksi->query("INSERT INTO transaksi VALUES('','$waktu_transaksi','$nomor_transaksi','$grand_total_harga','$nama_pembeli','$id_user','$status_transaksi')");


if ($query_insert_tr)
{
?>
<script>
    window.alert('data berhasil disimpan!!');
    window.location.href='../layout/admin.php?page=transaksi-detail-create&nomor_transaksi=<?= $nomor_transaksi ?>';
    </script>
<?php
}
else
{
    ?>
<script>
    window.alert('data gagal disimpan!!');
    window.location.href='../layout/admin.php?page=transaksi';
    </script>
    <?php
}
?>
