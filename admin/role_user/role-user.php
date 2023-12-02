<table class="table table-striped">
    <tr>
        <td colspan="8" style="text-align: center;">
            <h4>Daftar List Role User</h4>
        </td>
    </tr>
    <tr class="text-center">
        <th>No</th>
        <th>Role User</th>
        <th>--Action--</th>
    </tr>
    <?php
    $query = $koneksi->query("SELECT * FROM role_user");
    $no = 1;
    while ($data = $query->fetch_assoc()) {

    ?>
        <tr class="text-center">
            <td><?php echo $no ?></td>
            <td><?php echo $data['nama_role_user']; ?></td>
            <td>
                <a href="?page=role-user-edit&id_role_user=<?= $data['id_role_user'] ?>">
                    <button class="btn btn-light">
                        <i class="fa-solid fa-file-pen fa-beat" style="color: #00ff11;"></i>
                    </button>
                </a>
                <a href="?page=role-user-delete&id_role_user=<?= $data['id_role_user'] ?>">
                    <button class="text-light btn btn-light">
                        <i class="fa-solid fa-eraser fa-beat" style="color: #005eff;"></i>
                    </button>
                </a>
            </td>
        </tr>
    <?php
        $no++; //increment agar no urutnya bertambah 1
    }
    ?>
</table>
<a href="?page=role-user-create">
    <button class="btn btn-primary">Tambah User</button>
</a>