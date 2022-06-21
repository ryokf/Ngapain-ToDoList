<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    input,
    textarea {
        background-color: #333 !important;
        color: white !important;
    }

    .bg-oren {
        background-color: #FFA500;
    }

    .bg-ijo {
        background-color: #5FD068;
    }

    .bg-abu {
        background-color: #333;
        border: none !important;
    }

    .bg-ungu-gelap {
        background-color: #4C3575;
        border: none !important;
    }

    * {
        color: white;
        border: none !important;
    }

    .navbar,
    .sec-1 {
        background-color: rgb(0, 0, 0) !important;
    }

    .sec-2 {
        background-color: rgb(0, 0, 20) !important;
    }

    .navbar {
        border: 1px solid black !important;
    }

    body {
        height: 100%;
        background-color: #4C3575;
    }

    .sec-1 {
        border-bottom-right-radius: 30px;
        border-bottom-left-radius: 30px;
        border-bottom: 1px solid black;
        box-shadow: 1px 0px 30px 1px rgba(0, 0, 0, 100%);
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
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        margin: auto;
    }

    a {
        color: black;
    }

    .kontak {
        width: 40%;
        text-align: center;
        padding: 10px !important;
    }

    hr {
        width: 1px;
        height: 35px;
        border: 1px solid #000 !important;
    }

    h5 {
        font-size: 20px !important;
    }

    .tombol-edit {
        display: block;
        width: 100%;
        margin: auto;
        padding: 6px;
    }
    </style>
</head>

<body class="bg-abu">
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

    <section class="sec-1 d-flex justify-content-center flex-wrap flex-column pt-4 mb-2 container">
        <?php foreach($detail as $user): ?>

        <img src="<?= base_url('img/pp_user/') . $user['foto'] ?>" alt="" class="my-2">

        <h1 class="display-2 text-center text-dark"><b><?= $user['username'] ?></b></h1>
        <p class="text-center text-secondary"><?= $user['bio'] ?></p>

        <div class="container d-flex justify-content-around my-3 mb-3">
            <div class="d-flex flex-column text-secondary">
                <h5>pengikut</h5>
                <div class="text-center"><b><a href="" class="text-white"><?= $jumlah_pengikut ?></a></b></div>
            </div>
            <div class="d-flex flex-column text-secondary">
                <h5>mengikuti</h5>
                <div class="text-center"><b><a href="" class="text-white"><?= $jumlah_mengikuti ?></a></b></div>
            </div>
            <div class="d-flex flex-column text-secondary">
                <h5>kegiatan</h5>
                <div class="text-center"><b><a href="" class="text-white"><?= $jumlah_kegiatan ?></a></b></div>
            </div>
        </div>

        <div class="d-flex justify-content-evenly flex-wrap">

            <div class="alert alert-secondary d-flex flex-column kontak mx-1 bg-oren">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-telephone mx-auto mb-1" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
                <span style="font-size: 90%; overflow: scroll;">
                    <?= $user['telp'] ?>
                </span>
            </div>
            <span class="alert alert-secondary d-flex flex-column kontak mx-1 bg-ijo">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-envelope mx-auto mb-1" viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                </svg>
                <span style="font-size: 90%; overflow: scroll;">
                    <?= $user['email'] ?>
                </span>
            </span>
        </div>

        <div class="d-flex justify-content-center d-block">
            <form action="<?= base_url('cari_pengguna/mengikuti/') . $user['id'] ?>" method="post">
                <input type="hidden" value="<?= $user['email'] ?>" name="pengguna_lain">
                <input type="hidden" value="<?=  $_SESSION['login'] ?>" name="diri_sendiri">
                <?php
                foreach( $cek_ikut as $cek ){
                    if( $cek['email'] == $_SESSION['login'] && $cek['mengikuti'] == $user['email'] ){
                        $tombol = 'btn-secondary';
                        $ikuti = 'sudah mengikuti';
                    }else{
                        $tombol = 'btn-outline-primary';
                        $ikuti = 'ikuti';
                    }
                }
                ?>
                <button type="submit"
                    class="btn btn-sm mb-3 tombol-edit text-white <?= $tombol ?>"><?= $ikuti ?></button>
            </form>
        </div>

        <?php endforeach ?>
    </section>

    <section class="container d-flex flex-wrap mt-4 justify-content-center">
        <?php foreach($data_kegiatan as $kegiatan): ?>
        <div class="card bg-dark m-2" style="width: 45%; border-radius: 10px; overflow: hidden;">
            <img src="<?= base_url('img/foto_kegiatan/') . $kegiatan['foto'] ?>" class="card-img-top" alt="..."
                style="border-radius: 0;">
            <div class="card-body">
                <h6 class="card-title"><?= $kegiatan['kegiatan'] ?></h6>
                <a href="<?= base_url('komen/index/') . $kegiatan['id'] . '/' . $kegiatan['kegiatan'] ?>"
                    class="btn btn-primary btn-sm">detail</a>
            </div>
        </div>
        <?php endforeach; ?>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>