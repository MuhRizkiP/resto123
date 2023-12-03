<?php
include("config/koneksi.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--========== BOX ICONS ==========-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/pelanggan/assets/css/styles.css" />

    <title>Responsive website food</title>
</head>

<body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class="bx bx-chevron-up scrolltop__icon"></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo"><img src="assets/image/mcdlogo.png" alt="" width="50" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)" /></a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="" class="nav__link" disabled>About</a></li>
                    <li class="nav__item"><a href="" class="nav__link" disabled>Services</a></li>
                    <li class="nav__item"><a href="menu.php?nama_kategori_menu=" class="nav__link" disabled>Kategori Menu</a></li>
                    <li class="nav__item"><a href="" class="nav__link" disabled>Contact us</a></li>

                    <li><i class="bx bx-moon change-theme" id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="bx bx-menu"></i>
            </div>
        </nav>
    </header>

    <main class="l-main">

        <!--========== LIST Kategori MENU : Makanan,Minuman,Snack, ==========-->
        <section class="menu section bd-container" id="menu">
            <form action="" method="get">
                <h2 class="section-title">Pilihan Kategori Menu</h2>
                <center><a href="menu.php?nama_kategori_menu=" class="nav__link" style="background-color: black;">Refresh Kategori Menu</a></center>
                <div class="menu__container bd-grid">
                    <?php

                    $query_select_kategori = $koneksi->query("SELECT * FROM kategori_menu");
                    while ($result_select_kategori = $query_select_kategori->fetch_object()) {
                    ?>
                        <div class="menu__content">

                            <h3 class="menu__name"><?= $result_select_kategori->nama_kategori_menu ?></h3>

                            <a href="menu.php?nama_kategori_menu=<?= $result_select_kategori->nama_kategori_menu ?>" class="button menu__button"><i class="bx bx-cart-alt"></i></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                </div>
            </form>
        </section>

        <!-- Menu Berdasarkan Kategori Menu -->
        <section class="menu section bd-container" id="menu">

            <h2 class="section-title">Pilihan Menu</h2>
            <div class="menu__tampung bd-grid">
                <?php
                $nama_kategori_menu = $_GET['nama_kategori_menu'];

                if ($nama_kategori_menu == "") {
                    $query = $koneksi->query("SELECT * FROM menu");
                } else {
                    $nama_kategori_menu = $_GET['nama_kategori_menu'];
                    $query = $koneksi->query("SELECT * FROM menu JOIN kategori_menu ON menu.id_kategori_menu = kategori_menu.id_kategori_menu
                                              WHERE kategori_menu.nama_kategori_menu = '$nama_kategori_menu'");
                }
                while ($result = $query->fetch_object()) {
                ?>

                    <div class="menu__isi">
                        <img src="assets/image/menu/<?= $result->foto_menu ?>" alt="" class="menu__img" />
                        <h3 class="menu__name"><?= $result->nama_menu ?></h3>
                        <span class="menu__detail"><?= $result->deskripsi_menu ?></span>
                        <span class="menu__preci"><?= $result->harga_menu ?></span>
                        <a href="menu.php?nama_kategori_menu=<?= $result->nama_menu ?>" class="button menu__button"><i class="bx bx-cart-alt"></i></a>
                    </div>
                <?php
                }
                ?>



            </div>
        </section>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">MC Donald</a>
                    <span class="footer__description">Fast Food Restaurant</span>
                    <div>
                        <a href="http://www.facebook.com/McDonaldsID" class="footer__social"><i class="bx bxl-facebook"></i></a>
                        <a href="http://instagram.com/mcdonaldsid" class="footer__social"><i class="bx bxl-instagram"></i></a>
                        <a href="https://twitter.com/mcdonalds_id" class="footer__social"><i class="bx bxl-twitter"></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Delivery</a></li>
                        <li><a href="#" class="footer__link">Pricing</a></li>
                        <li><a href="#" class="footer__link">Fast food</a></li>
                        <li><a href="#" class="footer__link">Reserve your spot</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li>Lima - Peru</li>
                        <li>Jr Union #999</li>
                        <li>999 - 888 - 777</li>
                        <li>tastyfood@email.com</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; 2023 Muhamd Rizki Pratama. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/pelanggan/assets/js/main.js"></script>
</body>

</html>