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

    .no-border {
        border: none !important;
    }

    .bg-hitam {
        background-color: #111;
    }

    .bg-krem {
        background-color: #ECC488;
    }

    .bg-merah {
        background-color: #ED6663;
    }

    .bg-lavender {
        background-color: #6A67CE;
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

    .kartu-beranda {
        box-shadow: 4px 4px 4px 1px black;
    }

    img {
        object-fit: cover;
    }

    .komen-border {
        border-bottom: 1px solid black !important;
    }

    .width-100 {
        display: block;
        width: 100%;
        margin: 5px;
    }

    a {
        text-decoration: none;
    }
    </style>
</head>

<body class="bg-hitam">

    <div class="mx-3 my-3">
        <a href="<?= base_url() ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace"
                viewBox="0 0 16 16">
                <path
                    d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                <path
                    d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
            </svg>
            <span class="mx-1">kembali</span>
        </a>
    </div>

    <div class="container d-flex justify-content-center flex-wrap">

        <?php foreach($data_beranda as $beranda ): ?>
        <div class="card my-2 kartu-beranda bg-abu" style="width: 100%;">
            <div class="my-2 mx-3">
                <?php foreach($data_cocok as $cocok ): ?>
                <?php if( $beranda['email'] == $cocok['email'] ): ?>
                <?php $foto_cocok = $cocok['foto'] ?>
                <img src="<?= base_url('img/pp_user/') . $foto_cocok ?>" alt=""
                    style="border-radius: 50%; width: 30px; height: 30px">
                <?php $username_cocok = $cocok['username'] ?>
                <span><?= $username_cocok ?></span>
                <?php endif ?>
                <?php endforeach; ?>
            </div>
            <img src="<?= base_url('img/foto_kegiatan/') . $beranda['foto'] ?>" class="card-img-top" alt="..."
                style="border-radius: 0;">
            <span class="mt-2 mx-3 d-flex justify-content-between">
                <span>
                    <a href="<?= base_url('komen/index/') . $beranda['id'] . '/' . $beranda['kegiatan']  ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chat-left-text" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path
                                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                        </svg></a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-people-fill mx-2" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                    </svg>
                </span>
                <p class="card-text"><?= $beranda['tanggal_deadline'] ?></p>
            </span>
            <div class="card-body">
                <h5 class="card-title"><?= $beranda['kegiatan'] ?></h5>
                <p class="card-text"><?= $beranda['deskripsi'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <form action="<?= base_url('komen/tambah_komen') ?>" method="post">
        <div class="mb-3 d-flex container">
            <input type="hidden" name="pengirim" value="<?= $_SESSION['login'] ?>">
            <input type="hidden" name="id_kegiatan" value="<?= $id_kegiatan ?>">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="isi komentar anda"
                name="isi_komen">
            <button type="submit" class="btn btn-dark bg-lavender">kirim</button>
        </div>

    </form>

    <div class="container d-flex justify-content-center flex-wrap">


        <div class="card my-2 kartu-beranda bg-abu" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title text-center py-3">komentar</h5>
                <div class="d-flex">
                    <?php foreach( $daftar_komen as $komen ): ?>
                    <div class="">
                        <div class="d-flex">
                            <?php foreach($data_cocok as $cocok ): ?>
                            <?php if( $komen['peng_komen'] == $cocok['email'] ): ?>
                            <?php $foto_cocok = $cocok['foto'] ?>
                            <img src="<?= base_url('img/pp_user/') . $foto_cocok ?>" alt=""
                                style="border-radius: 50%; width: 20px; height: 20px">

                            <?php $username_cocok = $cocok['username'] ?>
                            <h6 class="mx-2"><?= $username_cocok ?></h6>
                            <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                        <p class="mx-3"><?= $komen['isi'] ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>