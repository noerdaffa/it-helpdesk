<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_ruangan'];
    $pj = $_POST['penanggung_jawab'];

    mysqli_query($conn,"
        INSERT INTO ruangan
        (nama_ruangan,penanggung_jawab)
        VALUES
        ('$nama','$pj')
    ");

    header("Location: ruangan.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Tambah Ruangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="style.css">

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="card card-custom p-4">

        <h2>Tambah Ruangan</h2>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Nama Ruangan
                </label>

                <input
                    type="text"
                    name="nama_ruangan"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Penanggung Jawab
                </label>

                <input
                    type="text"
                    name="penanggung_jawab"
                    class="form-control"
                    required>

            </div>

            <button
                type="submit"
                name="simpan"
                class="btn btn-pink">

                Simpan

            </button>

            <a href="ruangan.php"
            class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>