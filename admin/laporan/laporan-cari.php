<?php
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
// Query select untuk tanggal awal dan akhir
$query_select_tr = $koneksi->query("SELECT * FROM transaksi 
                                    JOIN user ON transaksi.id_user = user.id_user
                                    WHERE waktu_transaksi 
                                    BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59' ");
//Menghitung jumlah transaksi
$jumlahtransaksi = mysqli_num_rows($query_select_tr);



?>
<br>
<center><img src="../../assets/image/logo.jpg" alt="logo-resto" width="10%"></center>
<center>
    <p><span style="font-size: xx-large;">Resto 123</span>
    <br>Laporan Transaksi Penjualan<br>Periode <?= $tgl_awal ?> - <?= $tgl_akhir ?></p>
</center>
<center>
<a href="../laporan/laporan-print.php?tgl_awal=<?= $tgl_awal?>&tgl_akhir=<?= $tgl_akhir?>">
    <button class="btn btn-secondary">Print</button>
</a>
</center>
<table>
    <tr>
        <td>Total Pendapatan</td>
        <?php


        // Query Grand Total Harga
        $query_select_sum = $koneksi->query("SELECT SUM(grand_total_harga) AS totalpendapatan
                                        FROM transaksi
                                        JOIN user ON transaksi.id_user = user.id_user
                                        WHERE waktu_transaksi 
                                        BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59' 
                                        ");
        $totalpendapatan = $query_select_sum->fetch_object()->totalpendapatan;
        
        ?>
        <td>: Rp. <?= number_format($totalpendapatan,2,".",".") ?></td>
    </tr>
    <tr>
        <td>Total Transaksi</td>
        <td>: <?=$jumlahtransaksi ?></td>
    </tr>
</table>
<table class="table table-stripped">
    <tr>
        <td>No</td>
        <td>Waktu Transaksi</td>
        <td>Nomor Invoice</td>
        <td>Grand Total Harga</td>
        <td>Nama Pembeli</td>
        <td>Nama Petugas</td>
        <td>Status Transaksi</td>
    </tr>
    <?php
    
    $no = 1;
    while ($hasil_select_tr = $query_select_tr->fetch_object()) {
    ?>
    <tr>
        <td><?=$no ?></td>
        <td><?=$hasil_select_tr->waktu_transaksi ?></td>
        <td><?=$hasil_select_tr->nomor_transaksi ?></td>
        <td>Rp. <?= number_format($hasil_select_tr->grand_total_harga,2,".",".") ?></td>
        <td><?=$hasil_select_tr->nama_pembeli?></td>
        <td><?=$hasil_select_tr->nama_user?></td>
        <td><?=$hasil_select_tr->status_transaksi ?></td>
    <?php
    $no++;
    }
    ?>
    <tr>
        <td colspan="3" style="text-align: right;"><h4>Pendapatan</h4></td>
        <td><h4>Rp. <?= number_format($totalpendapatan,2,".",".") ?></h4></td>
        <td colspan="3"></td>
    </tr>
</table>
<style>
    .ttd-petugas{
        float: right;
        text-align: left;
        width: 250px;
    }
</style>
<div class="ttd-petugas">
    <p>
    Bekasi, <?= date("d M Y") ?><br>
    <?php echo $_SESSION['role'] ?><br>
    <br><br>
    <?= $_SESSION['nama_user'] ?>
    </p>
</div>