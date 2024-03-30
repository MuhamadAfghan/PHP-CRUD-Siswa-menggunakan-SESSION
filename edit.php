<?php
session_start();

if (!isset($_SESSION['dataSiswa'][$_GET['index']])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $data = [
        'nis' => $_POST['nis'],
        'nama' => $_POST['nama'],
        'rayon' => $_POST['rayon'],
    ];
    if ($_SESSION['dataSiswa'][$_GET['index']] != $data) {
        $_SESSION['info'] = 'Berhasil di ubah';
    } else {
        $_SESSION['dataSiswa'][$_GET['index']] = $data;
    }
    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container d-flex flex-column gap-3 pt-3">
        <div class="add container text-center py-3">
            <h1>Edit Data siswa</h1>
            <form action="" method="post" class="row row-cols-md-2 gap-2 justify-content-evenly form-group p-3 rounded">
                <section class="d-flex flex-xl-row flex-column  gap-3">
                    <div class="form-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama"
                            required value="<?= $_SESSION['dataSiswa'][$_GET['index']]['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" id="nis" name="nis" class="form-control" placeholder="Masukan NIS" required
                            value="<?= $_SESSION['dataSiswa'][$_GET['index']]['nis'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" id="rayon" name="rayon" class="form-control" placeholder="Masukan Rayon"
                            required value="<?= $_SESSION['dataSiswa'][$_GET['index']]['rayon'] ?>">
                    </div>
                </section>
                <div class="text-start text-xl-center">
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    <?php if (!empty($_SESSION['dataSiswa'])) : ?>
                    <a onclick="return confirm('Apakah anda yakin ingin membatalkan perubahan?')" href="index.php"
                        class="btn btn-danger">Batal</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>