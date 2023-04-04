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


$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE id_user = '$id'")[0];

if(isset($_POST["submit"])){
    if(updateUser($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Data berhasil diedit');
            window.location = 'user.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data gagal diedit');
            window.location = 'user.php'
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'; ?>


<div class="content">
    <div class="box">
        <h2>Edit Data User</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
            <label for="nama_user">Nama user</label><br />
            <input type="text" name="nama_user" id="nama_user" 
            value="<?= $user['nama_user']; ?>"><br /> <br />

            

            <label for="password">password</label><br >
            <input type="password" name="password" id="password" value="<?= $user["password"]; ?>"><br /> <br />

            <label for="username">Username</label><br >
            <input type="text" name="username" id="username" value="<?= $user
            ["username"]; ?>"><br /> <br />

            <input type="hidden" name="roles" value="<?= $user["roles"]; ?>"> 
            <button type="submit" name="submit">Edit Data</button> 
        </form>
    </div>
</div>