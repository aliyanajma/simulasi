<?php
include 'layout/navbar.php';
$id = $_GET["id"];
$produk = query("SELECT * FROM barang WHERE id_barang =  '$id'")[0];
// require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail produk</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0" >
        <form action="" method="post">
            <tr class="judul">
                <th colspan="4">DETAIL PRODUK</th>
            </tr>
            
            <tr>
                <td>nama produk</td>
                <td><?= $produk["nama_barang"]; ?></td>
            </tr>
            <tr>
                <td>harga produk</td>
                <td><?= $produk["harga_satuan"]; ?></td>
            </tr>
            <tr>
                <td>jenis barang</td>
                <td><?= $produk["jenis_barang"]; ?></td>
            </tr>
            <tr>
                <td colspan="2">masukan jumlah produk yang ingin di beli <br /><input type="number" name="qty" id="qty"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="beli">add to chart</button></td>
            </tr>
        </form>
    </table>
</body>

</html>
<?php
if (isset($_POST["beli"])) {
    $qty = $_POST["qty"];
    $_SESSION["cart"][$id] = $qty;

    echo "
    <script type='text/javascript'>
        alert('produk berhasil ditambahkan ke keranjang belanja');
        window.location = 'keranjang.php';
    </script>
    ";
}
?>