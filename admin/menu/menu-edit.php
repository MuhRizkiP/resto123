<?php
$id_menu = $_GET['id_menu'];
$query = $koneksi->query("SELECT * FROM menu JOIN kategori_menu 
                            ON menu.id_kategori_menu = kategori_menu.id_kategori_menu
                            WHERE id_menu = '$id_menu'");
$hasil_menu = $query->fetch_object();
?>
<br><center><h2>Edit Data Kategori Menu</h2><br>
<table width="400px">
     <tr>
          <td>
               <form action="?page=menu-update" method="POST" enctype="multipart/form-data">
                    <input type="text" value="<?= $hasil_menu->id_menu ?>" name="id_menu" hidden>
                    <select class="form-control mb-2" name="id_kategori_menu">
                    <option value="<?= $hasil_menu->id_kategori_menu ?>">
                        <?= $hasil_menu-> nama_kategori_menu ?>
                    </option>
                    <?php
                        $select_kategori = $koneksi->query("SELECT * FROM kategori_menu");
                        while ($hasil_kategori = $select_kategori->fetch_object()){
                    ?>
                   <option value="<?= $hasil_kategori->id_kategori_menu ?>">
                        <?= $hasil_kategori-> nama_kategori_menu ?>
                   </option>
                   <?php
                        }
                        ?>
                            </select>
                            <input value="<?= $hasil_menu->nama_menu ?>" class="form-control mb-2" type="text" name="nama_menu" placeholder="nama menu">
                            <textarea  class="form-control mb-2" name="deskripsi_menu" placeholder="deskripsi menu"><?= $hasil_menu->deskripsi_menu ?>"</textarea>
                            <input value="<?= $hasil_menu->harga_menu ?>" class="form-control mb-2" type="text" name="harga_menu" placeholder="harga menu">
                            <select class="form-control mb-2" name="status_menu">
                                <option value="tersedia" <?=$hasil_menu->status_menu == 'tersedia' ? 'selected':'' ?> >
                                Tersedia
                                </option>
                                <option value="habis" <?=$hasil_menu->status_menu == 'habis' ? 'selected':'' ?> >
                                Habis
                                </option>
                            </select>
                            <input class="form-control mb-2" type="file" name="foto_menu">
                    <div class="text-from mb-3">*Masukan File Gambar</div>
                    <div class="d-grid">
                        <center><button class="btn btn-success" type="submit">Simpan</button></center>
                    </div>
                    
               </form>
          </td>
     </tr>
</table>
</center>