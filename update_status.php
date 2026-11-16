<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "
SELECT * FROM pengaduan
WHERE id_pengaduan='$id'
");

$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {

    $status = $_POST['status'];

    mysqli_query($conn, "
UPDATE pengaduan
SET status_perbaikan='$status'
WHERE id_pengaduan='$id'
");

    header("Location: pengaduan.php");
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Update Perbaikan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card p-4">

            <h3>Update Status Perbaikan</h3>

            <form method="POST">

                <select name="status" class="form-select mb-3">

                    <option value="Menunggu" <?= $d['status_perbaikan'] == "Menunggu" ? "selected" : ""; ?>>
                        Menunggu
                    </option>

                    <option value="Sedang Diperbaiki" <?= $d['status_perbaikan'] == "Sedang Diperbaiki" ? "selected" : ""; ?>>
                        Sedang Diperbaiki
                    </option>

                    <option value="Selesai" <?= $d['status_perbaikan'] == "Selesai" ? "selected" : ""; ?>>
                        Selesai
                    </option>

                </select>

                <button type="submit" name="update" class="btn btn-success">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</body>

</html>