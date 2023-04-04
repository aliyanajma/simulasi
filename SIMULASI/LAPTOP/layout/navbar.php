<?php 
require 'function.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Penjualan Laptop</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="sub-navbar">
          
                

                <div>
                <ul class="nav nav-tabs">
                        <li><a class="nav-link" href="index.php">Beranda</a></li>
                        <li><a class="nav-link" href="admin/produk.php">Produk</a></li>
                        <li><a class="nav-link" href="admin/transaksi.php">Data Transaksi</a></li>
                        <li><a class="nav-link" href="keranjang.php">Keranjang Belanja</a></li>
                </ul>
                </div>
                <?php if(isset($_SESSION["username"])): ?>
                <div class="auth">
                    <a href="#"><?= $_SESSION["nama_user"];?></a>
                    <a href="logout.php">Logout</a>
                </div>
                <?php endif; ?>

                <?php  if(!isset($_SESSION["username"])) : ?>
                <div class="auth">
                    <a href="login/index.php">Login</a>
                    <a href="register.php">Register</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
</body>
</html>