<?php

include 'layout/navbar.php';
if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "
    <script type='text/javascript'>
        alert('keranjang anda masih kosong , silah kan belanja terlebuh dahulu');
        window.location = 'index.php';
    </script>
    ";
}

?>

<div class="keranjang-belanja">
    <h2>keranjang belanja</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
           
            <th>nama barang</th>
            <th>jenis barang</th>
            <th>harga</th>
            <th>qty</th>
            <th>total harga</th>
            <th>aksi</th>
        </tr>

        <?php $grandTotal = 0; ?>
        <?php foreach ($_SESSION["cart"] as $id_barang => $kuantitas) : ?>
            <?php $data = query("SELECT * FROM barang WHERE $id_barang = '$id_barang'")[0]; ?>
            <?php $totalHarga = $data["harga_satuan"] * $kuantitas;
            $grandTotal += $totalHarga;
            ?>
            <tr>
                

                <td><?= $data["nama_barang"]; ?></td>
                <td><?= $data["jenis_barang"]; ?></td>
                <td>Rp. <?= number_format($data["harga_satuan"]);  ?></td>
                <td><?= $kuantitas; ?></td>
                <td>Rp. <?= number_format($totalHarga); ?>
                <td><a href="hapuskeranjang.php?id=<?= $data['id_barang']; ?>" onclick="return confirm('apakah anda yakin ingin menghapus barang di keranjang ini')">hapus</a>
                    <a href="editkeranjang.php?id=<?= $data["id_barang"]; ?>">edit</a>
                </td>
            </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="6">
                total harga yang harus di bayar
                Rp. <?= number_format($grandTotal); ?>
            </td>
        </tr>
        <tr>
            <td><a href="checkout.php">checkout</a></td>
        </tr>
    </table>
</div>