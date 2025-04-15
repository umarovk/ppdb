<?php

session_start();

// jika sudah login / mempunyai var session dengan key login, maka lempar ke login.php
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


require 'functions.php';

// cek apakah tombol login sudah di klik
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // kemudian cek 1 per 1, apakah user ada? apakah password dan user cocok?
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username, apakah ada nama sesuai di database 
    // mysqli_num_rows, jika nilainya 1 berarti ada, jika 0 berarti tidak ada
    if (mysqli_num_rows($result) === 1) {

        // jika ada, cek passwordnya : 1. ambil datanya
        $row = mysqli_fetch_assoc($result);
        // kembalikan password yang sudah di encripsi
        // ada 2 parameter, 1. pass yang sudah di encript. 2. pass sudah di encript sesuai database
        if (password_verify($password, $row["password"])) {

            // set session, buat var session dan key nya 'login'
            $_SESSION["login"] = true;

            header("Location:index.php");
            exit;
        }
    }

    // jika user salah, dan jika password tidak sama, tampilkan var error
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <script src="bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js"></script>

    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col text-center" style="margin-top: 100px;">

                    <?php if (isset($error)) : ?>
                        <p style="color:red; font-style:italic;">Username atau password salah</p>

                    <?php endif; ?>

                </div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-center">
                    <img src="img/logo smk cokro.png" alt="" style="width: 200px;">
                    <h1>Login</h1>

                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-3">
                </div>
                <div class="col"></div>
                <div class="col"></div>

            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col"></div>

                <div class="col text-center">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col"></div>
                <div class="col"></div>

            </div>

            <div class="row">
                <div class="col text-center">
                    <br>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>

                </div>
            </div>
        </form>

    </div>
</body>

</html>