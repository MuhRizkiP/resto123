<center>
    <br>
    <h2>Input Data Menu</h2>
    <br>
    <table width="400px">
        <tr>
            <td>
                <form action="?page=menu-store" method="post" enctype="multipart/form-data">
                    <select class="form-control mb-2" type="text" name="id_kategori_menu">
                        <option value="">Pilih Kategori</option>
                        <?php
                        $select_kategori = $koneksi->query("SELECT * FROM kategori_menu");
                        while ($hasil_kategori = $select_kategori->fetch_object()) {
                        ?>
                            <option value="<?php echo $hasil_kategori->id_kategori_menu ?>"><?php echo $hasil_kategori->nama_kategori_menu ?></option>
                        <?php
                        }
                        ?>
                        <input class="form-control mb-2" name="nama_menu" placeholder="Nama Menu">
                        <textarea class="form-control mb-2" name="deskripsi_menu" id="deskripsi_menu" cols="30" rows="10"></textarea>
                        <input type="number" class="form-control mb-2" name="harga_menu" placeholder="Harga Menu">
                        <select class="form-control mb-2" name="status_menu">
                            <option value="tersedia" selected>Tersedia</option>
                            <option value="habis">Habis</option>
                        </select>
                        <input class="form-control" type="file" name="foto_menu">
                        <div class="text-form mb-3">*Masukan File Gambar</div>

                        <center><button class="btn btn-success" type="submit">Simpan</button></center>
                </form>
            </td>
        </tr>

    </table>
</center>