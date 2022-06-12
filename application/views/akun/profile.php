<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    body {
        height: 100%;
    }

    .sec-2 {
        width: 100%;
        height: 100%;
        border-bottom-right-radius: 0px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        border-bottom-left-radius: 0px;
        background-color: #efefef;
    }

    .accordion-item {
        border-radius: 10px;
        background-color: #eee;
    }

    a {
        text-decoration: none;
    }

    img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin: auto;
    }
    </style>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar bg-light">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                <a href="<?= base_url() ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-backspace" viewBox="0 0 16 16">
                        <path
                            d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                        <path
                            d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
                    </svg>
                </a>
                To Do List
            </span>
        </div>
    </nav>

    <section class="sec-1 d-flex justify-content-center flex-wrap flex-column mt-4 mb-2 container">
        <img src="<?= base_url('img/fotoDefault.jpg') ?>" alt="" class="my-2">

        <h1 class="display-2 text-center text-dark"><b><?= $_SESSION['login'] ?></b></h1>
        <p class="text-center text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa, sint!</p>
        <div class="d-flex justify-content-evenly flex-wrap">
            <h5>
                <span class="badge rounded-pill text-bg-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-telephone" viewBox="0 0 16 16">
                        <path
                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                    089647767389
                </span>
            </h5>
            <h5>
                <span class="badge rounded-pill text-bg-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg>
                    owi123@gmail.com
                </span>
            </h5>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Edit Profile
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="sec-2 alert alert-secondary container">
        <h1 class="text-center py-3 display-5">Daftar Kegiatan</h1>
        <?php 

    $tanggal_kegiatan = [];
    foreach($data_kegiatan as $kegiatan){
        array_push($tanggal_kegiatan, $kegiatan['tanggal_deadline']);
    }
     
    $tanggal_kegiatan = array_unique($tanggal_kegiatan);
    
    ?>
        <div class="accordion" id="accordionExample">
            <?php foreach($tanggal_kegiatan as $tanggal): ?>

            <h5 class="mt-3"><?= $tanggal ?></h5>
            <?php foreach($data_kegiatan as $kegiatan): ?>

            <?php if( $kegiatan['tanggal_deadline'] == $tanggal ): ?>

            <div class="accordion-item gelap">

                <h2 class="accordion-header" id="headingTwo">
                    <?php if( $kegiatan['sudah'] == 'true' ): ?>
                    <?php $bg = 'alert-success'; ?>
                    <?php else: ?>
                    <?php $bg = 'alert-warning'; ?>
                    <?php endif ?>
                    <button class="accordion-button collapsed alert <?= $bg ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo<?= $kegiatan['id'] ?>" aria-expanded="false"
                        aria-controls="collapseTwo">
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
                        <p>waktu :
                            <?= $kegiatan['tanggal_deadline'] . ' | ' . $kegiatan['waktu_deadline'] ?>
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

                <!-- edit kegiatan-->
                <div class="modal fade" id="staticBackdrop<?= $kegiatan['id'] ?>" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <input type="date" class="form-control" id="deadline" name="tanggal_deadline"
                                            value="<?= $kegiatan['tanggal_deadline'] ?>">
                                        <input type="time" class="form-control" id="deadline" name="waktu_deadline"
                                            value="<?= $kegiatan['waktu_deadline'] ?>">
                                    </div>
                                    <label for="floatingTextarea2">deskripsi kegiatan</label>
                                    <div class="form-floating">
                                        <textarea class="form-control my-1" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px"
                                            name="deskripsi"><?= $kegiatan['deskripsi'] ?></textarea>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php endforeach ?>
            <?php endforeach; ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>