<?php
require 'functions.php';

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if($_SESSION["roles"] != "admin"){
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$barang = query("SELECT * FROM barang");

?>

<?php require '../layout/sidebar.php'; ?>

<div class="content">
    <h1>Data barang</h1>
    <a href="tambah_produk.php">Tambah</a>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Nama barang</th>
            <th>jenis barang</th>
            
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($barang as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["nama_barang"]; ?></td>
            <td><?= $data["jenis_barang"]; ?></td>
            
            <td>Rp. <?= number_format($data["harga_satuan"]); ?></td>
            <td><?= $data["stok_barang"]; ?></td>
            <td>
                <a href="edit_produk.php?id=<?= $data["id_barang"]; ?>">Edit</a>
                <a href="hapus_produk.php?id=<?= $data["id_barang"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
            </td>
    
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>