<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ith_daffa"
);

if(!$conn){
    die("Koneksi gagal : "
    . mysqli_connect_error());
}

?>