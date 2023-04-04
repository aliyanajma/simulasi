<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if(isset($_POST["kirim"])){
    if(tambahProduk($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data barang berhasil ditambahkan');
                window.location = 'produk.php';
            </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data barang gagal ditambahkan');
            window.location = 'produk.php';
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'?>

<div class="main">
   <div class="box">

    <h3>Tambah Data barang</h3>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_barang">Nama barang</label><br />
        <input type="text" name="nama_barang" id="nama_barang" class="form-control"><br /> <br />

        <label for="jenis_barang">jenis barang</label><br />
        <input type="text" name="jenis_barang" id="jenis_barang" class="form-control"><br /> <br />

        

        <label for="harga_satuan">Harga</label><br />
        <input type="text" name="harga_satuan" id="harga_satuan" class="form-control"><br /> <br />


        <label for="stok">Stok</label><br />
        <input type="text" name="stok_barang" id="stok_barang" class="form-control"><br /> <br />
        
        <button type="submit" name="kirim">Tambah</button>
    </form>
    
   </div>
</div>