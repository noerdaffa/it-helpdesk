<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM ruangan
WHERE id_ruangan='$id'"
);

header("Location: ruangan.php");

?>