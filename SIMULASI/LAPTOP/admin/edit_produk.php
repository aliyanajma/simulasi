<?php
session_start();
require 'functions.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if (isset($_POST["kirim"])) {
    if (editProduk($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data produk berhasil diubah');
                window.location = 'produk.php';
            </script>
        ";
    } else {
        echo "
        <script type='text/javascript'>
            alert('Data produk gagal diubah');
            window.location = 'produk.php';
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php' ?>

<div class="main">
    <div class="box">
        <h3>Edit Data Produk</h3>
        <form action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_barang" class="form-control" value="<?= $produk["id_barang"]; ?>">

            <label for="nama_barang">Nama Produk</label><br />
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $produk["nama_barang"]; ?>"><br /> <br />

            <label for="jenis_barang">jenis Produk</label><br />
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?= $produk["jenis_barang"]; ?>"><br /> <br />

            

            <label for="harga_satuan">harga</label><br />
            <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" value="<?= $produk["harga_satuan"] ?>"><br /> <br />


            <label for="stok">Stok</label><br />
            <input type="text" name="stok" id="stok" class="form-control" value="<?= $produk["stok"] ?>"><br /> <br />

            <button type="submit" name="kirim">Edit</button>
        </form>

    </div>
</div>