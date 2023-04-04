<?php 

require 'functions.php';

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if($_SESSION["roles"] != "admin"){
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


if(isset($_POST["submit"])){
    if(tambahUser($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Data berhasil ditambahkan');
            window.location = 'user.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data gagal ditambahkan');
            window.location = 'user.php'
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'; ?>

<div class="content">
    <div class="box">
        <h2>Tambah Data User</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama_user">Nama user</label><br />
            <input type="text" name="nama_user" id="nama_user"><br /> <br />

            <label for="username">Username</label><br >
            <input type="text" name="username" id="username"><br /> <br />

            <label for="password">Password</label><br />
            <input type="password" name="password" id="password"><br /> <br />

            <input type="hidden" name="roles" value="customer"> 
            <button type="submit" name="submit">Tambah Data</button> 
        </form>
    </div>
</div>