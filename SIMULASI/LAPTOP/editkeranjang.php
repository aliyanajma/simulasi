<?php
require 'function.php';
$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit keranjang </title>
</head>

<body>
    <h1>edit keranjang produk</h1>
    <form action="proses_editkeranjang.php" method="post">
        <input type="hidden" name="id_barang" value="<?= $_GET["id"]; ?>">

        <label for="qty">kuantitas</label>
        <input type="number" name="qty" id="qty" value="<?= $_SESSION["cart"][$_GET["id"]]; ?>">

        <button type="submit" name="edit">edit</button>
    </form>
</body>

</html>