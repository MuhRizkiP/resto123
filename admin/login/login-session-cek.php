<?php
if (empty($_SESSION['login'])) {
     ?>
          <script>
               // window.alert('Anda belum login ! !');
               window.location.href='login.php';
          </script>
     <?php
}
?>