<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>

    <title>Form Ruang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="style.css">

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="card card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h2>Form Ruang</h2>

            <a href="tambah_ruangan.php"
            class="btn btn-pink">

                + Tambah Ruangan

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Penanggung Jawab</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;

            $data = mysqli_query($conn,
            "SELECT * FROM ruangan");

            while($d = mysqli_fetch_array($data)){
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td>
                    <?= $d['nama_ruangan']; ?>
                </td>

                <td>
                    <?= $d['penanggung_jawab']; ?>
                </td>

                <td>

                    <a href=
                    "edit_ruangan.php?id=<?= $d['id_ruangan']; ?>"
                    class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a href=
                    "hapus_ruangan.php?id=<?= $d['id_ruangan']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick=
                    "return confirm('Yakin ingin menghapus data?')">

                        Hapus

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