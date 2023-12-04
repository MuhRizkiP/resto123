<?php
$id_user = $_GET['id_user'];
$query = $koneksi->query("SELECT * FROM user JOIN role_user 
                                ON user.id_role_user = role_user.id_role_user
                                WHERE id_user = '$id_user'");

$hasil = $query->fetch_object();
?>
<center>
    <br>
    <h2>ubah Data User</h2>
    <br>
    <table width="400px">
        <tr>
            <td>
                <form action="?page=user-update" method="POST" enctype="multipart/form-data">
                    <input type="text" value="<?= $hasil->id_user ?>" name="id_user" hidden>

                    <select class="form-control mb-2" name="nama_role_user">
                        <option value="<?php echo
                                        $hasil->id_role_user ?>">
                            <?php echo $hasil->nama_role_user ?>
                        </option>
                        <?php
                        $select_kategori = $koneksi->query("SELECT *FROM role_user");
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

                    <input class="form-control mb-2" value="<?= $hasil->nama_user ?>" name="nama_user" placeholder="Nama User">
                    <input class="form-control mb-2" value="<?= $hasil->username ?>" name="username" placeholder="username">
                    <input class="form-control mb-2" type="text" name="password" placeholder="<?= $hasil->password ?>" required>
                    
                    <input class="form-control mb-2" type="file" name="photo_user">
                    <div class="text-from mb-3">*Masukan File Gambar</div>
                    <div class="d-grid">
                    <br>

                    <center><button class="btn btn-success" type="submit">Simpan</button></center>
                </form>
            </td>
        </tr>
    </table>
</center>