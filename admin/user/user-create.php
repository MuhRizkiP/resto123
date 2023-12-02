<center>
    <br>
    <h2>Input user baru</h2>
    <br>
    <table width="400px">
        <tr>
            <td>
                <form action="?page=user_detail-create" method="post" enctype="multipart/form-data">
                    <select class="form-control mb-2" name="nama_role_user">
                        <option value="">Pilih Role</option>
                        <?php
                        $select_kategori = $koneksi->query("SELECT *FROM user 
                                                            JOIN role_user 
                                                            On user.id_role_user = role_user.id_role_user
                                                            ");
                        while ($hasil_kategori = $select_kategori->fetch_object()) {
                        ?>
                            <option value="<?php echo
                                           $hasil_kategori->id_role_user ?>">
                                <?php echo $hasil_kategori->nama_role_user ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <input class="form-control mb-2" type="text" name="nama_user" placeholder="Nama User">
                    <input class="form-control mb-2" type="text" name="username" placeholder="Username">
                    <input class="form-control mb-2" type="text" name="password" placeholder="Password">
                    <input class="form-control mb-2" type="file" name="photo_user">
                    <div class="text-from mb-3">masukan File Gambar</div>
                    <div class="d-grid">

                    <center><button class="btn btn-success" type="submit">Simpan</button></center>
                </form>
            </td>
        </tr>
    </table>
</center>