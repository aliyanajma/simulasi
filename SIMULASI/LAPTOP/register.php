<?php
session_start();
require '../functions.php';

if(isset($_POST["submit"])){
    if(tambahUser($_POST) > 0){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($login);
        
        if($cek > 0){
            $_SESSION['username']=$username;
            $_SESSION['roles']='login';
            while($data=mysqli_fetch_array($login)){
                echo "
    <script type = 'text/javascript'>
        alert('Register Akun Berhasil!');
        window.location = 'customer/index.php';
    </script>
    ";
            }
        }else{
            echo "
    <script type = 'text/javascript'>
        alert('Register Akun Gagal!');
        window.location = 'register.php';
    </script>
    ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Register</h1>
    <h3>Silahkan Isi Data!</h3>
    <table>
        <form action="" method="post" enctype="multipart/form-data">
            <tr>
                <td>
                    <label for="nama_user">Nama Lengkap</label>
                </td>
                <td>
                    <input type="text" name="nama_user" id="nama_user">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>
                    <input type="text" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
                <!-- INPUT ROLES -->
                <input type="hidden" name="roles" value="customer">
                <!-- INPUT ROLES -->
            <tr>
                <td>
                <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
            </form>
        </table>
</body>
</html>