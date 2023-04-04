<?php

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

function tambahUser($data){
    global $conn;
    
    $nama_user = htmlspecialchars($data["nama_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $roles = htmlspecialchars($data["roles"]);
    $created_at = htmlspecialchars($data["created_at"]);
    $update_at = htmlspecialchars($data["update_at"]);

    $query = "INSERT INTO user VALUES(NULL, '$nama_user', '$username', '$password', '$roles','$created_at','$update_at')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusUser($id){
    global $conn;
    
    $query = "DELETE FROM user WHERE id_user = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateUser($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_user"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    
    $roles = htmlspecialchars($data["roles"]);

    if(empty($foto)){
        $query = "UPDATE user SET
        nama_user = '$nama_user',
        username = '$username',
        password = '$password',
        roles = '$roles' WHERE id_user = '$id'";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE user SET
        nama_user = '$nama_user',
        username = '$username',
        password = '$password',
        
        roles = '$roles' WHERE id_user = '$id'";
        
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }

}

function tambahProduk($data){
    global $conn;

    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $jenis_barang = htmlspecialchars($data["jenis_barang"]);
    
    $harga_satuan = htmlspecialchars($data["harga_satuan"]);
    $stok = htmlspecialchars($data["stok_barang"]);

    $query = "INSERT INTO barang VALUES(NULL, '$nama_barang','$jenis_barang', '$harga_satuan', '$stok')";

   
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusProduk($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM barang WHERE id_barang = '$id'");
    return mysqli_affected_rows($conn);
}

function tolakProduk($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'ditolak' WHERE id_transaksi = '$id' ");
}

function terimaProduk($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'terverifikasi' WHERE id_transaksi = '$id' ");
}


function editProduk($data){
    global $conn;

    $id = htmlspecialchars($data["id_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $jenis_barang = htmlspecialchars($data["jenis_barang"]);
    
    $harga = htmlspecialchars($data["harga_satuan"]);
    $stok = htmlspecialchars($data["stok"]);
   


    if(empty($foto)){
        $query = "UPDATE barang SET
        nama_barang = '$nama_barang',
        jenis_barang = '$jenis_barang',
        harga_satuan = '$harga',
        stok = '$stok' WHERE id_barang = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE barang SET
        nama_barang = '$nama_barang',
        jenis_barang = '$jenis_barang',
        
        harga_satuan = '$harga',
        stok = '$stok' WHERE id_barang = '$id'";

        

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

}


?>