<?php
include('../../config/koneksi.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = $koneksi->query("SELECT * FROM user 
                         INNER JOIN role_user 
                         ON user.id_role_user = role_user.id_role_user
                         WHERE username = '$username'");

if (mysqli_num_rows($query) > 0)
{
     $result = $query->fetch_object();
     if (password_verify($password,$result->password)) {
          $_SESSION['login']       = 'sukses';
          $_SESSION['id_user']     = $result->id_user;
          $_SESSION['nama_user']   = $result->nama_user;
          $_SESSION['role']        = $result->nama_role_user;
          ?>
          <script>
               window.alert('Login BERHASIL !');
               window.location.href='../layout/admin.php?page=home';
          </script>
          <?php
     }
     else
     {
          ?>
          <script>
               window.alert('Akun salah, silahkan login kembali!');
               window.location.href='login.php';
          </script>
          <?php
     }
}
else
{
     ?>
     <script>
          window.alert('Akun salah, silahkan login kembali!');
          window.location.href='login.php';
     </script>
     <?php
}


?>