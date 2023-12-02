<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resto 123</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/pelanggan/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/pelanggan/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg text-danger" style="background-color: red;">
            <div class="container px-lg-5">
                <a class="navbar-brand text-white" href="#!">Resto 123</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item "><a class="nav-link active text-white" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#!">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        
            <div class="mb-5">
                <div style="background-image: url('assets/image/mcdonalds.jpg');background-repeat:no-repeat;background-position:center"
                class="p-4 bg-light rounded-3 text-center">
                    <div class="" style="margin: 29rem;">
                        <h1 class="display-5 fw-bold"></h1>
                        <!-- <p class="fs-4">Bootstrap utility classes are used to create this jumbotron since the old component has been removed from the framework. Why create custom CSS when you can use utilities?</p> -->
                        <!-- <a class="btn btn-primary btn-lg" href="#!">Call to action</a> -->
                    </div>
                </div>
            </div>
   
        <!-- Page Content-->
        <section class="pt-4">
            <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">
                    
                    <!-- isi page -->
                    <?php
                    include("config/koneksi.php");
                    $query_select_kategori = $koneksi->query("SELECT * FROM kategori_menu");
                    while ($result_select_kategori = $query_select_kategori->fetch_object()) {
                    ?>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <a href="menu.php?nama_kategori_menu=<?= $result_select_kategori->nama_kategori_menu?>">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-success bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                                <h2 class="fs-4 fw-bold"><?= $result_select_kategori->nama_kategori_menu?></h2>
                                <!-- <p class="mb-0">With Bootstrap 5, we've created a fresh new layout for this template!</p> -->
                                <img class="img-fluid rounded-3" src="assets/image/kategori_menu/<?= $result_select_kategori->foto_kategori_menu?>" alt="">
                            </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-success">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Muhamad Jovi Jauhar Chaniago 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/pelanggan/js/scripts.js"></script>
    </body>
</html>