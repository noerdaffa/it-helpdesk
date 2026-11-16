<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $tanggal = $_POST['tanggal'];
    $ruangan = $_POST['id_ruangan'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn, "
    INSERT INTO pengaduan
    (
        tanggal_lapor,
        id_ruangan,
        deskripsi_masalah,
        status_perbaikan
    )
    VALUES
    (
        '$tanggal',
        '$ruangan',
        '$deskripsi',
        'Menunggu'
    )
    ");

    header("Location: pengaduan.php");
    exit;
}

$query = mysqli_query($conn, "
SELECT *
FROM pengaduan
JOIN ruangan
ON pengaduan.id_ruangan = ruangan.id_ruangan
ORDER BY id_pengaduan DESC
");
?>

<!DOCTYPE html>
<html>

<head>

    <title>Form Pengaduan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container mt-4">

        <div class="card card-custom p-4 mb-4">

            <h2> Tambah Pengaduan</h2>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Tanggal Lapor
                    </label>

                    <input type="date" name="tanggal" class="form-control" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Pilih Ruangan
                    </label>

                    <select name="id_ruangan" class="form-select" required>

                        <option value="">
                            -- Pilih Ruangan --
                        </option>

                        <?php
                        $ruangan = mysqli_query(
                            $conn,
                            "SELECT * FROM ruangan"
                        );

                        while ($r = mysqli_fetch_array($ruangan)) {
                            ?>

                            <option value="<?= $r['id_ruangan']; ?>">
                                <?= $r['nama_ruangan']; ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi Masalah
                    </label>

                    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>

                </div>

                <button type="submit" name="simpan" class="btn btn-success">

                    Kirim Pengaduan

                </button>

            </form>

        </div>

        <div class="card card-custom p-4">

            <h2>Daftar Pengaduan</h2>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>Tanggal</th>
                        <th>Ruangan</th>
                        <th>Masalah</th>
                        <th>Status</th>
                        <th width="250">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    <?php while ($d = mysqli_fetch_array($query)) { ?>

                        <tr>

                            <td><?= $d['tanggal_lapor']; ?></td>

                            <td><?= $d['nama_ruangan']; ?></td>

                            <td><?= $d['deskripsi_masalah']; ?></td>

                            <td>

                                <?php

                                if ($d['status_perbaikan'] == "Menunggu") {

                                    echo "<span class='badge bg-warning'>
                    Menunggu
                    </span>";

                                } elseif ($d['status_perbaikan'] == "Sedang Diperbaiki") {

                                    echo "<span class='badge bg-primary'>
                    Sedang Diperbaiki
                    </span>";

                                } else {

                                    echo "<span class='badge bg-success'>
                    Selesai
                    </span>";

                                }

                                ?>

                            </td>

                            <td>

                                <a href="edit_pengaduan.php?id=<?= $d['id_pengaduan']; ?>" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <a href="hapus_pengaduan.php?id=<?= $d['id_pengaduan']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    Hapus

                                </a>

                                <a href="update_status.php?id=<?= $d['id_pengaduan']; ?>" class="btn btn-success btn-sm">

                                    Status

                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>