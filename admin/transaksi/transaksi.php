<?php
include('../login/login-session-cek.php');
?>
<br>
<center>
  <h2>Transaksi</h2>
</center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambahkan Pesanan
</button>

<table class="table table-striped">
  <tr>
    <th>No</th>
    <th>Waktu Transaksi</th>
    <th>No. Invoice</th>
    <th>Grand Total harga</th>
    <th>Nama Pembeli</th>
    <th>Petugas Kasir</th>
    <th>Status Transaksi</th>
    <th>--Action--</th>
  </tr>
  <?php
  $no = 1;
  $query_select_tr = $koneksi->query(" SELECT * FROM transaksi
                                JOIN user ON transaksi.id_user = user.id_user");

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
      <td>
        <?php
        if ($hasil_select_tr->status_transaksi == 'selesai') {
        ?>
          <a href="../../assets/invoice/index.php?&id_transaksi=<?= $hasil_select_tr->id_transaksi?>">
            <button class="btn btn-secondary">Print</button>
          </a>
          <a href="?page=transaksi-detail-create&nomor_transaksi=<?= $hasil_select_tr->nomor_transaksi ?>">
            <button class="btn btn-primary">Detail</button>
          </a>
        <?php
        } else {
        ?>
          <a href="?page=transaksi-detail-create&nomor_transaksi=<?= $hasil_select_tr->nomor_transaksi ?>">
            <button class="btn btn-warning">Lanjutkan</button>
          </a>
        <?php
        }
        ?>
      </td>
    </tr>
  <?php
    $no++;
  }
  ?>
</table>
<br>
<br>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Input Nama Pembelian</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="?page=transaksi-store" method="post">
          <input type="text" class="form-control" name="nama_pembeli" placeholder="Nama Pembeli">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>