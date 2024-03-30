<?php
session_start();

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = [];
}

if (isset($_POST['submit'])) {
    $data = [
        'nis' => $_POST['nis'],
        'nama' => $_POST['nama'],
        'rayon' => $_POST['rayon'],
    ];
    array_push($_SESSION['dataSiswa'], $data);
    $_SESSION['info'] = 'Berhasil ditambahkan';
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}


?>
<!doctype html>
<html lang="en" ,>

<head>
    <title>Data Siswa</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <main class="container d-flex flex-column gap-3 pt-3">



        <!-- Form Input Data Baru -->
        <div class="add container text-center py-3">
            <h1 class="mb-3">Masukan Data siswa</h1>
            <form action="" method="post" class="row row-cols-md-2 gap-2 justify-content-evenly form-group rounded">
                <section class="d-flex flex-xl-row flex-column  gap-3">
                    <div class="form-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="number" id="nis" name="nis" class="form-control" placeholder="Masukan NIS" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="rayon" name="rayon" class="form-control" placeholder="Masukan Rayon" required>
                    </div>
                </section>
                <div class="d-flex gap-1 text-xl-center">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg> Tambah
                    </button>
                    <?php if (!empty($_SESSION['dataSiswa'])) : ?>
                        <a href="print.php" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                            </svg> Cetak
                        </a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus semua data?')" href="destroy.php" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg> Hapus
                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <hr>

        <!-- Cek perubahan -->
        <?php if (isset($_SESSION['info'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['info'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['info']); ?>
        <?php endif; ?>

        <!-- Menampilkan Data Siswa yang sudah diinput dalam bentuk tabel-->
        <div class="dataSiswa table-responsive px-3">
            <table class="table table-striped table-sm rounded text-center table-bordered">
                <thead class="table-warning">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Rayon</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php if (!empty($_SESSION['dataSiswa'])) : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($_SESSION['dataSiswa'] as $key => $value) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['nis'] ?></td>
                                <td><?= $value['rayon'] ?></td>
                                <td>
                                    <a href="edit.php?index=<?= $key ?>" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="delete.php?index=<?= $key ?>" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-person-x" viewBox="0 0 16 16">
                                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center text-danger py-3">Tidak ada data</p>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>



    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>