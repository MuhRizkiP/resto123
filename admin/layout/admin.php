<?php
include("../../config/koneksi.php");
session_start();
include('../login/login-session-cek.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>TOKO 123</title>

     <!-- bootstrap -->
     <link rel="stylesheet" href="../../assets/css/bootstrap.css">

     <!-- fontawesome -->
     <link href="../../assets/fontawesome/css/fontawesome.css" rel="stylesheet">
     <link href="../../assets/fontawesome/css/brands.css" rel="stylesheet">
     <link href="../../assets/fontawesome/css/solid.css" rel="stylesheet">
</head>
<style>
     body {}

     .header {
          background-color: #586994;
          color: white;
     }

     .navbar {
          background-color: #E5E8B6;
     }
</style>

<body>
     <div class="container">
          <div class="header">
               <div class="row">
                    <div class="col">
                         <br>
                         <center>
                              <h1>Resto 123</h1>
                         </center>
                         <br>
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <nav class="navbar navbar-expand-lg">
                         <div class="container-fluid">
                              <a class="navbar-brand" href="#">Navbar</a>
                              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                   <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
                                   <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                                        <li class="nav-item">
                                             <a class="nav-link <?= $_GET['page'] == 'home' ? 'link-success' : '' ?>" href="?page=home">Home</a>
                                        </li>
                                        <?php
                                        if ($_SESSION['role'] == 'admin') {
                                        ?>
                                             <li class="nav-item">
                                                  <a class="nav-link <?= $_GET['page'] == 'kategori_menu' ? 'link-warning' : '' ?>" href="?page=kategori_menu">Kategori Menu</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link <?= $_GET['page'] == 'menu' ? 'link-danger' : '' ?>" href="?page=menu">Menu</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link <?= $_GET['page'] == 'user' ? 'link-success' : '' ?>" href="?page=user">User</a>
                                             </li>
                                             <li class="nav-item">
                                                  <a class="nav-link <?= $_GET['page'] == 'role-user' ? 'link-success' : '' ?>" href="?page=role-user">Role User</a>
                                             </li>
                                        <?php

                                        }
                                        ?>
                                        <li class="nav-item">
                                             <a class="nav-link <?= $_GET['page'] == 'transaksi' ? 'link-success' : '' ?>" href="?page=transaksi">Transaksi</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link <?= $_GET['page'] == 'laporan' ? 'link-success' : '' ?>" href="?page=laporan">Laporan</a>
                                        </li>
                                   </ul>
                                   <form class="d-flex" role="search">
                                        <a href="?page=logout">
                                             <i class="fa-solid fa-right-from-bracket fa-xl" style="color: black;"></i>
                                        </a>
                                   </form>
                              </div>
                         </div>
                    </nav>
               </div>
          </div>

          <div class="row">
               <div class="col">
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                         if ($_GET) {
                              $page = $_GET['page'];
                              switch ($page) {
                                   case 'home':
                                        include('../home/home.php');
                                        break;
                                   case 'kategori_menu':
                                        include('../kategori_menu/kategori_menu.php');
                                        break;
                                   case 'kategori_menu-create':
                                        include('../kategori_menu/kategori_menu-create.php');
                                        break;
                                   case 'kategori_menu-store':
                                        include('../kategori_menu/kategori_menu-store.php');
                                        break;
                                   case 'kategori_menu-edit':
                                        include('../kategori_menu/kategori_menu-edit.php');
                                        break;
                                   case 'kategori_menu-update':
                                        include('../kategori_menu/kategori_menu-update.php');
                                        break;
                                   case 'kategori_menu-delete':
                                        include('../kategori_menu/kategori_menu-delete.php');
                                        break;
                                   case 'menu':
                                        include('../menu/menu.php');
                                        break;
                                   case 'menu-create':
                                        include('../menu/menu-create.php');
                                        break;
                                   case 'menu-store':
                                        include('../menu/menu-store.php');
                                        break;
                                   case 'menu-edit':
                                        include('../menu/menu-edit.php');
                                        break;
                                   case 'menu-update':
                                        include('../menu/menu-update.php');
                                        break;
                                   case 'menu-delete':
                                        include('../menu/menu-delete.php');
                                        break;
                                   case 'transaksi':
                                        include('../transaksi/transaksi.php');
                                        break;
                                   case 'transaksi-create':
                                        include('../transaksi/transaksi-create.php');
                                        break;
                                   case 'transaksi-final':
                                        include('../transaksi/transaksi-final.php');
                                        break;
                                   case 'transaksi-detail-store':
                                        include('../transaksi/transaksi-detail-store.php');
                                        break;
                                   case 'transaksi-store':
                                        include('../transaksi/transaksi-store.php');
                                        break;
                                   case 'transaksi-detail-create':
                                        include('../transaksi/transaksi-detail-create.php');
                                        break;
                                   case 'transaksi_detail-update':
                                        include('../transaksi/transaksi_detail-update.php');
                                        break;
                                   case 'transaksi-detail-delete':
                                        include('../transaksi/transaksi_detail-delete.php');
                                        break;
                                   case 'laporan':
                                        include('../laporan/laporan.php');
                                        break;
                                   case 'laporan-cari':
                                        include('../laporan/laporan-cari.php');
                                        break;
                                   case 'laporan-print':
                                        include('../laporan/laporan-print.php');
                                        break;
                                   case 'logout':
                                        include('../login/logout.php');
                                        break;

                                   case 'user_detail-create':
                                        include('../user/user_detail-create.php');
                                        break;
                                   case 'user':
                                        include('../user/user.php');
                                        break;
                                   case 'user-create':
                                        include('../user/user-create.php');
                                        break;
                                   case 'user-store':
                                        include('../user/user-store.php');
                                        break;
                                   case 'user-delete':
                                        include('../user/user-delete.php');
                                        break;
                                   case 'user-edit':
                                        include('../user/user-edit.php');
                                        break;
                                   case 'user-update':
                                        include('../user/user-update.php');
                                        break;
                                   
                                   case 'role-user':
                                        include('../role_user/role-user.php');
                                        break;
                                   case 'role-user-create':
                                        include('../role_user/role-user-create.php');
                                        break;
                                   case 'role-user-store':
                                        include('../role_user/role-user-store.php');
                                        break;
                                   case 'role-user-delete':
                                        include('../role_user/role-user-delete.php');
                                        break;
                                   case 'role-user-edit':
                                        include('../role_user/role-user-edit.php');
                                        break;
                                   case 'role-user-update':
                                        include('../role_user/role-user-update.php');
                                        break;
                                   default:
                                        echo '<center>Halaman Tidak Ada !</center>';
                                        break;
                              }
                         }
                    } else {
                         if ($_GET) {
                              $page = $_GET['page'];
                              switch ($page) {
                                   case 'home':
                                        include('home.php');
                                        break;
                                   case 'transaksi':
                                        include('transaksi.php');
                                        break;
                                   case 'transaksi-create':
                                        include('transaksi-create.php');
                                        break;
                                   case 'transaksi-store':
                                        include('transaksi-store.php');
                                        break;
                                   case 'logout':
                                        include('logout.php');
                                        break;
                                   default:
                                        echo '<center>Halaman Tidak Ada !</center>';
                                        break;
                              }
                         }
                    }

                    ?>
               </div>
          </div>
          <div class="row">
               <div class="col fixed-bottom">
                    <center>Copyright &copy; Fiqri Noor Hadi</center>
               </div>
          </div>
     </div>
     <!-- bootstrap css -->
     <script src="../../assets/js/bootstrap.bundle.js"></script>
</body>

</html>