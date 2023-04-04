<?php include 'layout/navbar.php'; ?>

<?php
if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo " 
    <script type='text/javascript'>
        alert('Keranjang Anda Masih Kosong, Silahkan Belanja Terlebih Dahulu');
        window.location= 'index.php'
    </script>
    ";
}
?>

<div class="checkout">
    <form action="" method="POST">
        <label for="tanggal_transaksi">Tanggal Transaksi</label><br>
        <input type="text" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= date('Y-m-d'); ?>"><br><br>
        
        <label for="nama_user">Nama penerima</label><br>
        <input type="text" name="nama_user" id="nama_user" value="<?= $_SESSION["nama_user"]; ?>"><br><br>

        <?php foreach ($_SESSION["cart"] as $id_produk => $kuantitas) : ?>
            <?php
            $data = query("SELECT * FROM barang WHERE id_barang = '$id_produk'")[0];
            $subTotal = $data["harga_satuan"] * $kuantitas;
            ?>
            <label for="nama_barang">Nama Produk</label><br>
            <input type="text" name="nama_barang" id="nama_barang" value="<?= $data["nama_barang"]; ?>"><br><br>

            <label for="harga_satuan">Harga Produk</label><br>
            <input type="text" name="harga_satuan" id="harga_satuan" value="<?= $data["harga_satuan"]; ?>"><br><br>

            <label for="subtotal">Sub Total Harga</label><br>
            <input type="text" name="subtotal" id="subtotal" value="<?= $subTotal; ?> ">

        <?php endforeach; ?>

        <button type="submit" name="checkout">Checkout</button>
    </form>
</div>

<!-- fungsi cekout -->
<?php
if (isset($_POST['checkout'])) {
    if (checkoutProduct($_POST) > 0) {
        echo "
        <script type = 'text/javascript'>
        alert('Yeaayyy!Barang Berhasil Di Checkout, silahkan ditunggu proses verifikasinya yaaaaaa!!');
        window.location='index.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
?>