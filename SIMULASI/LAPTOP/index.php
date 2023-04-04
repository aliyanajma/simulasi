<?php

include 'layout/navbar.php';
$barang = query("SELECT * FROM barang");
?>

<div class="nav">
    
    <h2>data barang yang tersedia</h2>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered ">
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
            <td><a href="detail.php?id=<?= $data['id_barang'];?>">detail</a></td></td>
        <tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
