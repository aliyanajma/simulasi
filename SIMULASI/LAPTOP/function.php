<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'penjualan_laptop');

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}
function checkoutProduct($data){
    global $conn;

    foreach ($_SESSION['cart'] as $id => $result):
        ?>
        <?php
        $barang = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];
        
        $totalHarga = $result*$barang["harga_satuan"];
        $tanggal = $data["tanggal_transaksi"];
        $user = $data["user"];
        $barang = $data["barang"];
        $jmlh_barang = $data["jmlh_barang"];
        $harga_satuan = $data["harga_satuan"];
        $price = $totalHarga;
        $st = 'proses';

        // masukan ke data base
        $queryCheckout = "INSERT INTO transaksi VALUES(
            NULL,
            '$tanggal',
            '$user',    
            '$barang',  
            '$jmlh_barang',
            '$harga_satuan',    
            '$price',
            '$st')";
        // masukan ke database

        mysqli_query($conn, $queryCheckout);
        ?>
        <?php endforeach;

        return mysqli_affected_rows($conn);
    }
?>