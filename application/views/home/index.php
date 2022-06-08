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

    /* .putar: {
        transform: rotate(180deg) !important;
    } */

    .text-align-right {
        text-align: right;
        font-size: 11px;
    }
    </style>

</head>

<body>
    <!-- NAVBAR -->

    <nav class="navbar bg-light">
        <div class="container d-flex justify-content-between">
            <span class="navbar-brand mb-0 h1">To Do List</span>

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg></button>

            <div class="offcanvas-sm offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Profil perngguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="container">
                        <span>username : <?= $_SESSION['login']; ?></span>
                        <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm d-block">logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>



    <!-- AKHIR NAVBAR -->

    <!-- INTI APLIKASI -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-touch="true" data-bs-interval="false">

        <!-- DAFATR KEGIATAN -->

        <div class="carousel-item active">

            <!-- INTI DAFTAR KEGIATAN -->

            <div class="container my-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <?php foreach($data_kegiatan as $kegiatan): ?>
                        <h2 class="accordion-header" id="headingTwo">
                            <?php if( $kegiatan['sudah'] == 'true' ): ?>
                            <?php $bg = 'alert-success'; ?>
                            <?php else: ?>
                            <?php $bg = 'alert-warning'; ?>
                            <?php endif ?>
                            <button class="accordion-button collapsed alert <?= $bg ?>" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo<?= $kegiatan['id'] ?>"
                                aria-expanded="false" aria-controls="collapseTwo">
                                <div class="d-flex justify-content-between">
                                    <span><?= $kegiatan['kegiatan'] ?></span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapseTwo<?= $kegiatan['id'] ?>" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><b>nama kegiatan: <?= $kegiatan['kegiatan'] ?></b></p>
                                <p>lokasi : <?= $kegiatan['lokasi'] ?></p>
                                <p>deadline : <?= $kegiatan['tanggal_deadline'] . '|' . $kegiatan['waktu_deadline'] ?>
                                </p>
                                <p>deskripsi : <?= $kegiatan['deskripsi'] ?></p>
                                <span class="d-flex">
                                    <!-- edit dan hapus -->
                                    <a href="<?= base_url('home/hapus') . '/' . $kegiatan['id'] ?>"
                                        class="btn btn-danger btn-sm mx-1">hapus</a>
                                    <a href="" class="btn btn-primary btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop<?= $kegiatan['id'] ?>">edit</a>
                                    <!-- status  -->
                                    <?php if( $kegiatan['sudah'] == 'true' ): ?>
                                    <a class="btn btn-sm bg-success mx-1 text-white"
                                        href="<?= base_url('home/belum_selesai/') ?><?= $kegiatan['id'] ?>">selesai</a>
                                    <?php else: ?>
                                    <a class="btn btn-sm bg-danger mx-1 text-white"
                                        href="<?= base_url('home/selesai/') ?><?= $kegiatan['id'] ?>">belum
                                        dikerjakan</a>
                                    <?php endif ?>
                                </span>
                            </div>
                        </div>

                        <!-- Modal edit-->
                        <div class="modal fade" id="staticBackdrop<?= $kegiatan['id'] ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">edit kegiatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <?php 
                                    $kegiatan['tanggal_deadline'] = explode('-', $kegiatan['tanggal_deadline']);
                                    $kegiatan['tanggal_deadline'] = array_reverse($kegiatan['tanggal_deadline']);
                                    $kegiatan['tanggal_deadline'] = join('-', $kegiatan['tanggal_deadline']);
                                    ?>

                                    <div class="modal-body">
                                        <form action="<?= base_url('home/ubah/') ?>" method="post">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Kegiatan</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="<?= $kegiatan['kegiatan'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="lokasi" class="form-label">lokasi</label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                    value="<?= $kegiatan['lokasi'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">deadline</label>
                                                <input type="date" class="form-control" id="deadline"
                                                    name="tanggal_deadline"
                                                    value="<?= $kegiatan['tanggal_deadline'] ?>">
                                                <input type="time" class="form-control" id="deadline"
                                                    name="waktu_deadline" value="<?= $kegiatan['waktu_deadline'] ?>">
                                            </div>
                                            <label for="floatingTextarea2">deskripsi kegiatan</label>
                                            <div class="form-floating">
                                                <textarea class="form-control my-1" placeholder="Leave a comment here"
                                                    id="floatingTextarea2" style="height: 100px" name="deskripsi"
                                                    value="<?= $kegiatan['deskripsi'] ?>"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="username" name="username"
                                                    value="<?= $_SESSION['login']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="<?= $kegiatan['id'] ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>




            <!-- AKHIR INTI DAFTAR KEGIATAN -->

            <!-- TAMBAH KEGIATAN -->

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
                            <form action="<?= base_url('home/tambah/') ?>" method="post">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Kegiatan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" maxlength="20">
                                    <div id="emailHelp" class="form-text">max 20 karakter</div>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">deadline</label>
                                    <input type="date" class="form-control" id="deadline" name="tanggal_deadline">
                                    <input type="time" class="form-control" id="deadline" name="waktu_deadline">
                                </div>
                                <label for="floatingTextarea2">deskripsi kegiatan</label>
                                <div class="form-floating">
                                    <textarea class="form-control my-1" placeholder="Leave a comment here"
                                        id="floatingTextarea2" style="height: 100px" name="deskripsi"></textarea>
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

            <!-- AKHIR TAMBAH KEGIATAN -->

        </div>

        <!-- AKHIR DAFATR KEGIATAN -->

        <!-- PENCARIAN -->

        <div class="carousel-item">
            <div class="container">
                <h1 class="my-3 text-center">cari kegiatan</h1>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">cari</span>
                </div>
            </div>
        </div>

    </div>

    <nav class="navbar fixed-bottom bg-light">
        <div class="container d-flex justify-content-around">
            <a class="" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                data-bs-slide-to="0">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path
                        d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                    <path
                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                </svg>
            </a>
            <a class="" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"
                data-bs-slide-to="1">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </a>
        </div>
    </nav>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script>
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel)
    </script>

</body>

</html>

<!-- <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="https://akcdn.detik.net.id/community/media/visual/2019/10/16/54cc653c-4b13-4008-9823-7465ca5d4c04.jpeg?w=750&q=90"
            class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="https://cdn0-production-images-kly.akamaized.net/Ja9uA3RnIVYicjGXzUK84Gm2I1Y=/640x853/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2833449/original/006374100_1561027516-foto_diambil_dalam_waktu_yang_pas.jpg"
            class="d-block w-100" alt="...">
    </div>
</div> -->

<!-- <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path
                        d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                    <path
                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                </svg></a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </a> -->