<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$ids = $_GET["ids"];
$id = $_GET["id"]; {

    // cek apakah tambah datanya berhasil
    if (hapusbiaya($id) > 0) {
        echo "
        <script>
        // alert ('data berhasil dihapus!');
        document.location.href = 'biaya.php?id=$ids'; // bagaimana cara mengirimkan 2 get bedbeda
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
