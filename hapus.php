<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"]; {

    // cek apakah tambah datanya berhasil
    if (hapus($id) > 0) {
        echo "
        <script>
        alert ('data berhasil dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('data gagal dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
