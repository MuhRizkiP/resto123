<?php
include("../../config/koneksi.php");
session_start();
include('../login/login-session-cek.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../admin-style/plugins/fontawesome-free/css/all.min.css" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../admin-style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin-style/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <script>
    window.onload = function() {
      generateRandomNumber1();
      generateRandomNumber2();
    };

    function generateRandomNumber() {
      var randomNumber = Math.floor(Math.random() * 100);
      document.getElementById("randomNumber").innerHTML = randomNumber + " %";
    }

    function generateRandomNumber1() {
      const randomNumber1 = Math.floor(Math.random() * 10000);
      document.getElementById("randomNumber1").innerText = randomNumber1;
    }

    function generateRandomNumber2() {
      const randomNumber2 = Math.floor(Math.random() * 1000);
      document.getElementById("randomNumber2").innerText = randomNumber2;
    }

    function generateRandomNumber3() {
      const randomNumber3 = Math.floor(Math.random() * 1000);
      document.getElementById("randomNumber3").innerText = randomNumber3;
    }

    setInterval(generateRandomNumber, 700); // 5000 milliseconds = .5 seconds
  </script>
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../admin-style/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index.php" class="nav-link">Landing Page</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../admin-style/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->

      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../assets/image/user/<?= $_SESSION['photo_user'] ?>" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['nama_user'] ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <?php
        if ($_SESSION['role'] == 'admin') {
        ?>
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a class="nav-link <?= $_GET['page'] == 'home' ? 'link-success' : '' ?>" href="?page=home">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Home</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= $_GET['page'] == 'user' ?>" href="?page=user">
                  <i class="nav-icon fas fa-user"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-hamburger"></i>
                  <p>
                    Menu
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"><?php
                                                          $query_select_menu = $koneksi->query("SELECT * FROM menu");
                                                          $jumlahmenu = mysqli_num_rows($query_select_menu);
                                                          echo $jumlahmenu; ?></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link <?= $_GET['page'] == 'menu' ? 'link-danger' : '' ?>" href="?page=menu">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Menu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?= $_GET['page'] == 'kategori_menu' ? 'link-warning' : '' ?>" href="?page=kategori_menu">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Kategori Menu</p>
                    </a>
                  </li>

                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    Tambah Role User

                  </p>
                </a>
              </li>
            <?php
          } elseif ($_SESSION['role'] == 'kasir'); {

            ?>
              <li class="nav-header">Transaksi</li>
              <li class="nav-item">
                <a class="nav-link <?= $_GET['page'] == 'transaksi' ? 'link-success' : '' ?>" href="?page=transaksi">
                  <i class="nav-icon fas fa-money-bill-alt"></i>
                  <p>
                    Transaksi
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $_GET['page'] == 'laporan' ? 'link-success' : '' ?>" href="?page=laporan">
                  <i class="nav-icon far fa-address-book"></i>
                  <p>Laporan</p>
                </a>
              </li>
            </ul>
          </nav>
        <?php
          }
        ?>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard v2</h1>
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">
                    <p id="randomNumber"></p>

                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-eye"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Views</span>
                  <span class="info-box-number">
                    <p id="randomNumber1"></p>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">
                    <p id="randomNumber2"></p>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>


                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col">


                    <div class="tampilan-admin">
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
                      }
                      ?>

                    </div>

                  </div>
                  <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021
        <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../admin-style/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../admin-style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../admin-style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../admin-style/dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../admin-style/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../admin-style/plugins/raphael/raphael.min.js"></script>
  <script src="../admin-style/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../admin-style/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../admin-style/plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="../admin-style/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../admin-style/dist/js/pages/dashboard2.js"></script>
</body>

</html>