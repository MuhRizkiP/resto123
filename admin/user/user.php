<?php
include('../login/login-session-cek.php');
?>
<br>
<center><h2>Data Menu User</h2></center>
<a href="?page=user-create">
     <button class="btn btn-success mb-2">Tambah User</button>
</a>
<table class="table table-striped">
     <tr>
          <th>No</th>
          <th>Kategori user</th>
          <th>nama user</th>
          <th>username</th>
          <th>password</th>
          <th>photo user</th>
        
          <th></th>
     </tr>
     <?php
     $no = 1;
     $query = $koneksi->query(" SELECT * FROM user
                                JOIN role_user
                                ON user.id_role_user = role_user.id_role_user");
     while ($hasil = $query->fetch_object()) 
     {
          ?>
          <tr>
               <td><?= $no ?></td>
               <td><?= $hasil->nama_role_user ?></td>
               <td><?= $hasil->nama_user ?></td>
               <td><?= $hasil->username ?></td>
               <td><?= $hasil->password ?></td>
               <td><img width="100" src="../../assets/image/user/<?= $hasil->photo_user ?>" alt=""></td>

               <td>
                    <a style="text-decoration:none" href="?page=user-edit&id_user=<?= $hasil->id_user?>">
                    <i class="fa-solid fa-pen-to-square fa-sm" style="color: #005eff;"></i>
                    </a>
                    |
                    <a style="text-decoration:none" href="?page=user-delete&id_user=<?= $hasil->id_user ?>">
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