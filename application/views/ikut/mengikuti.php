<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    .no-border {
        border: none !important;
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
        background-color: #333 !important;
        border: none !important;
    }

    .bg-ungu-gelap {
        background-color: #4C3575;
        border: none !important;
    }

    .bg-hitam {
        background-color: black;
    }

    .wadah-border {
        border-radius: 10px;
    }

    /* * {
        color: white;
        border: none !important; */
    /* } */
    </style>
</head>

<body class="bg-hitam">

    <?php foreach($daftar_mengikuti_diri as $mengikuti): ?>
    <div class="text-white p-3 m-4 bg-abu wadah-border">
        <div class="toast-header">
            <?php foreach($data_cocok as $cocok ): ?>
            <?php if( $mengikuti['mengikuti'] == $cocok['email'] ): ?>
            <?php $foto_cocok = $cocok['foto'] ?>
            <img src="<?= base_url('img/pp_user/') . $foto_cocok ?>" alt=""
                style="border-radius: 50%; width: 30px; height: 30px">
            <?php $username_cocok = $cocok['username'] ?>
            <span class="mx-2"><?= $username_cocok ?></span>
            <strong class="me-auto text-dark"></strong>
            <a href="<?= base_url('cari_pengguna/detail/') . $cocok['id'] ?>"
                class="btn btn-dark btn-sm bg-lavender">detail</a>
        </div>
        <div class="toast-body">
        </div>
        <?php endif ?>
        <?php endforeach; ?>
    </div>
    <?php endforeach ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>