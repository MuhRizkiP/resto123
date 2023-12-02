<?php
include('../login/login-session-cek.php');
?>
<br>
<center>
     <h2>Data Kategori Menu</h2>
</center>
<a href="?page=kategori_menu-create">
     <button class="btn btn-success mb-2">Tambah</button>
</a>
<table class="table table-striped">
     <tr>
          <th>No</th>
          <th>Nama Kategori Menu</th>
          <th>Foto Kategori Menu</th>
          <th>--Action--</th>
     </tr>
     <?php
     $no = 1;
     $query = $koneksi->query(" SELECT * FROM kategori_menu");
     while ($hasil = $query->fetch_object()) {
     ?>
          <tr>
               <td valign="middle"><?= $no ?></td>
               <td valign="middle"><?= $hasil->nama_kategori_menu ?></td>
               <td valign="middle">
                    <img width="100" class="img-fluid" src="../../assets/image/kategori_menu/<?= $hasil->foto_kategori_menu ?>" alt="">
               </td>
               <td valign="middle">|
                    <a style="text-decoration:none" href="?page=kategori_menu-edit&id_kategori_menu=<?= $hasil->id_kategori_menu ?>">
                         <i class="fa-solid fa-pen-to-square fa-sm" style="color: #005eff;"></i>
                    </a>
                    |
                    <a style="text-decoration:none" href="?page=kategori_menu-delete&id_kategori_menu=<?= $hasil->id_kategori_menu ?>">
                         <i class="fa-solid fa-trash fa-sm" style="color: #ff0000;"></i>
                    </a>|
               </td>
          </tr>
     <?php
          $no++;
     }
     ?>
</table>
<br>
<br>