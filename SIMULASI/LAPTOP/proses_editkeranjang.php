<?php 

session_start();

$id = $_POST["id_barang"];
$qty = $_POST["qty"];

$_SESSION["cart"][$id] = $qty;

header('Location: keranjang.php');


?>