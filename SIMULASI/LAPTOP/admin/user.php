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


$user = query("SELECT * FROM user");

?>

<?php require '../layout/sidebar.php'; ?>

<div class="content">
    <h1>Data User</h1>
    <a href="tambah_user.php">Tambah</a>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Roles</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($user as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["nama_user"]; ?></td>
            <td><?= $data["username"]; ?></td>
            <td><?= $data["roles"]; ?></td>
            <td>
                <a href="edit_user.php?id=<?= $data["id_user"]; ?>">Edit</a>
                <a href="hapus_user.php?id=<?= $data["id_user"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>