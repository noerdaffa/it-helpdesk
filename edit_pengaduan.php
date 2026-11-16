<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM pengaduan
WHERE id_pengaduan='$id'
");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $tanggal = $_POST['tanggal'];
    $ruangan = $_POST['id_ruangan'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    mysqli_query($conn,"
        UPDATE pengaduan
        SET
        tanggal_lapor='$tanggal',
        id_ruangan='$ruangan',
        deskripsi_masalah='$deskripsi',
        status_perbaikan='$status'
        WHERE id_pengaduan='$id'
    ");

    header("Location: pengaduan.php");
    exit;
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Edit Pengaduan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

```
<div class="card card-custom p-4">

    <h2> Edit Pengaduan</h2>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">
                Tanggal Lapor
            </label>

            <input
            type="date"
            name="tanggal"
            class="form-control"
            value="<?= $d['tanggal_lapor']; ?>"
            required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Ruangan
            </label>

            <select
            name="id_ruangan"
            class="form-select"
            required>

            <?php

            $r = mysqli_query($conn,
            "SELECT * FROM ruangan");

            while($ruang = mysqli_fetch_array($r)){

            ?>

            <option
            value="<?= $ruang['id_ruangan']; ?>"
            <?= $ruang['id_ruangan']==$d['id_ruangan']
            ? 'selected' : ''; ?>>

            <?= $ruang['nama_ruangan']; ?>

            </option>

            <?php } ?>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Deskripsi Masalah
            </label>

            <textarea
            name="deskripsi"
            class="form-control"
            rows="4"
            required><?= $d['deskripsi_masalah']; ?></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Status Perbaikan
            </label>

            <select
            name="status"
            class="form-select"
            required>

                <option value="Menunggu"
                <?= $d['status_perbaikan']=='Menunggu'
                ? 'selected' : ''; ?>>

                    Menunggu

                </option>

                <option value="Sedang Diperbaiki"
                <?= $d['status_perbaikan']=='Sedang Diperbaiki'
                ? 'selected' : ''; ?>>

                    Sedang Diperbaiki

                </option>

                <option value="Selesai"
                <?= $d['status_perbaikan']=='Selesai'
                ? 'selected' : ''; ?>>

                    Selesai

                </option>

            </select>

        </div>

        <button
        type="submit"
        name="update"
        class="btn btn-warning">

            Update Data

        </button>

        <a href="pengaduan.php"
        class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>
```

</div>

</body>
</html>
