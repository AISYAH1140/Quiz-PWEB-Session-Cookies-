<?php

require 'koneksi.php';

if(isset($_POST["register"])) {

    $username = strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

    //cek username
    $data = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($data)) {
        echo "<script>
                alert('username sudah TERSIMPAN!');
            </script>";
        echo "<script> setTimeout(function() { window.open('tambahData.php','_self') }, 100) </script>";
        return false;
    }

    if ($password !== $password2) {

        echo "<script>
                alert('password salah!');
            </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
    <title>QUIZ PWEB A</title>
</head>
<body>
    <?php
        include "nav.php";
    ?>

<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                    <h2 class="text-center">Form Registrasi</h2>
                    <p class="text-center">QUIZ PWEB A</p>
                    <form action="" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="username" placeholder="username">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="password">
    </div>
    <div class="form-group">
        <input class="form-control button" type="submit" value="Simpan" name="login">
    </div>
    </form>


<?php

include "koneksi.php";

if(isset($_POST['login'])){
mysqli_query($koneksi, "insert into login set  
username = '$_POST[username]',
password = '$_POST[password]'");

echo "Data barang baru telah tersimpan";

}

?>