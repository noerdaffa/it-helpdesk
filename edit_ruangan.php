<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM ruangan
WHERE id_ruangan='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_ruangan'];
    $pj = $_POST['penanggung_jawab'];

    mysqli_query($conn,"
        UPDATE ruangan
        SET
        nama_ruangan='$nama',
        penanggung_jawab='$pj'
        WHERE id_ruangan='$id'
    ");

    header("Location: ruangan.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Ruangan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="style.css">

</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-4">

    <div class="card card-custom p-4">

        <h2> Edit Ruangan</h2>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Nama Ruangan
                </label>

                <input
                    type="text"
                    name="nama_ruangan"
                    class="form-control"
                    value="<?= $d['nama_ruangan']; ?>"
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
                    value="<?= $d['penanggung_jawab']; ?>"
                    required>

            </div>

            <button
                type="submit"
                name="update"
                class="btn btn-pink">

                Update

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