<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <!-- fontawesome -->
    <link href="../../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../assets/fontawesome/css/solid.css" rel="stylesheet">
</head>
<script>
        window.print();
    </script>
<body>
    <?php
    include('../../config/koneksi.php');
    session_start();
    include('../login/login-session-cek.php');
    $tgl_awal = $_GET['tgl_awal'];
    $tgl_akhir = $_GET['tgl_akhir'];
    $query_select_tr = $koneksi->query("SELECT * FROM transaksi 
                                    JOIN user ON transaksi.id_user = user.id_user
                                    WHERE waktu_transaksi 
                                    BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59' ");
    ?>
    <br>
    <center><img src="../../assets/image/logo.jpg" alt="logo-resto" width="20%"></center>
    <center>
        <p><span style="font-size: xx-large;">Resto 123</span>
            <br>Laporan Transaksi Penjualan<br>Periode <?= $tgl_awal ?> - <?= $tgl_akhir ?>
        </p>
    </center>

    <table class="table table-striped">
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
        $query_select_sum = $koneksi->query("SELECT SUM(grand_total_harga) AS totalpendapatan
                                        FROM transaksi
                                        JOIN user ON transaksi.id_user = user.id_user
                                        WHERE waktu_transaksi 
                                        BETWEEN '$tgl_awal 00:00:00' AND '$tgl_akhir 23:59:59' 
                                        ");
        $totalpendapatan = $query_select_sum->fetch_object()->totalpendapatan;
        $no = 1;
        while ($hasil_select_tr = $query_select_tr->fetch_object()) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $hasil_select_tr->waktu_transaksi ?></td>
                <td><?= $hasil_select_tr->nomor_transaksi ?></td>
                <td>Rp. <?= number_format($hasil_select_tr->grand_total_harga, 2, ".", ".") ?></td>
                <td><?= $hasil_select_tr->nama_pembeli ?></td>
                <td><?= $hasil_select_tr->nama_user ?></td>
                <td><?= $hasil_select_tr->status_transaksi ?></td>
            <?php
            $no++;
        }
            ?>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <h4>Pendapatan</h4>
                </td>
                <td>
                    <h4>Rp. <?= number_format($totalpendapatan, 2, ".", ".") ?></h4>
                </td>
                <td colspan="3"></td>
            </tr>
    </table>
    <style>
        .ttd-petugas {
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
    
</body>

</html>