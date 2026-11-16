<?php
include 'koneksi.php';

$query = mysqli_query($conn,"
    SELECT *
    FROM pengaduan
    JOIN ruangan
    ON pengaduan.id_ruangan = ruangan.id_ruangan
");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Pengaduan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="card card-custom p-4">

        <h2>Data Pengaduan</h2>

        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Ruangan</th>
                    <th>Masalah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;

            while($d = mysqli_fetch_array($query)){
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td>
                    <?= $d['tanggal_lapor']; ?>
                </td>

                <td>
                    <?= $d['nama_ruangan']; ?>
                </td>

                <td>
                    <?= $d['deskripsi_masalah']; ?>
                </td>

                <td>

                    <?php
                    if($d['status_perbaikan']=="Menunggu"){
                        echo "<span class='badge bg-warning'>
                                Menunggu
                              </span>";
                    }
                    elseif($d['status_perbaikan']=="Sedang Diperbaiki"){
                        echo "<span class='badge bg-primary'>
                                Sedang Diperbaiki
                              </span>";
                    }
                    else{
                        echo "<span class='badge bg-success'>
                                Selesai
                              </span>";
                    }
                    ?>

                </td>

                <td>

                    <a href=
                    "update_status.php?id=<?= $d['id_pengaduan']; ?>"

                    class="btn btn-pink btn-sm">

                        Update Status

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