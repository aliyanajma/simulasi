<?php 
// panggil koneksi
require 'koneksi.php';

// deklrasiin data-data apa aja yang mau kita input
$nama_user = $_POST["nama_user"];
$password = $_POST["password"];
$username = $_POST["username"];
$roles = $_POST["roles"];

// bikin sql/query-nya
$query = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$nama_user', '$username', '$password', '$roles')");

// bikin kondisi kalo misalkan berhasil
if($query){
    echo "
        <script type='text/javascript'>
            alert('Data berhasil ditambahkan');
            window.location = 'index.php'
        </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Data gagal ditambahkan');
        window.location = 'index.php'
    </script>
";
}


?>