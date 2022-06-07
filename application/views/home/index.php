<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    a {
        text-decoration: none;
    }
    </style>

</head>

<body>
    <!-- As a heading -->
    <nav class="navbar bg-light">
        <div class="container d-flex justify-content-between">
            <span class="navbar-brand mb-0 h1">To Do List</span>
            <span><a href="http://localhost/ToDoList/Logout" class="btn btn-danger">logout</a></span>
        </div>
    </nav>

    <div class="container my-4">
        <ul class="list-group">
            <?php foreach($data_kegiatan as $kegiatan): ?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?= $kegiatan['kegiatan'] ?></span>
                <?php if( $kegiatan['sudah'] == 'true' ): ?>
                <a class="badge bg-success rounded-pill"
                    href="http://localhost/ToDoList/home/belum_selesai/<?= $kegiatan['id'] ?>">sudah
                    dikerjakan</a>
                <?php else: ?>
                <a class="badge bg-danger rounded-pill"
                    href="http://localhost/ToDoList/home/selesai/<?= $kegiatan['id'] ?>">belum
                    dikerjakan</a>
                <?php endif ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            tambah kegiatan
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah daftar kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/ToDoList/home/tambah" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Kegiatan</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="username" name="username"
                                value="<?= $_SESSION['login']; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                    <button type="submit" class="btn btn-primary">Tambah kegiatan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>