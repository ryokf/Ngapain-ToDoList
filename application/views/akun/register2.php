<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <style>
    p {
        font-size: 11px;
        text-align: center;
    }

    .link-register {
        position: absolute;
        right: 0;
        left: 0;
        bottom: 0;
    }

    input,
    textarea {
        background-color: #333 !important;
        color: white !important;
    }

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
        background-color: #333;
        border: none !important;
    }

    .bg-ungu-gelap {
        background-color: #4C3575;
        border: none !important;
    }

    .bg-hitam {
        background-color: black;
    }

    * {
        color: white;
        border: none !important;
    }

    p {
        font-size: 11px;
        text-align: center;
    }

    .link-register {
        position: absolute;
        right: 0;
        left: 0;
        bottom: 0;
    }

    a {
        text-decoration: none;
        color: #6A67CE;
    }
    </style>

</head>

<body class="bg-hitam">
    <div class="changeMode">
        <p id="ch" class="text-dark">Mode(light)&nbsp;&nbsp;v </p>
        <p id="ch" class="text-dark">Mode(dark)&nbsp;&nbsp; </p>
    </div>
    <h1 class="text-center mt-5 text-white">Buat password Anda</h1>

    <p class="text-center mt-3">Usahakan Password anda sulit ditebak orang lain, jangan gunakan informasi pribadi
        sebagai password</p>

    <?php
        if( $_POST == [] ){
            header('Location: ' . base_url());
        }
    ?>

    <div class="container my-5">
        <form action="<?= base_url('register/proses') ?>" method="post">
            <div class="mb-3">
                <input type="hidden" class="form-control" id="password" name="email" value="<?= $_POST['email'] ?>"
                    require>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 text-center">
                <label for="password2" class="form-label">konfirmasi password anda</label>
                <input type="password" class="form-control" id="password2" name="password2">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark text-white bg-lavender" name="submit">login sekarang</button>
            </div>
        </form>
        <p class="my-3 link-register">sudah punya akun?, silahkan masuk melalui link ini <a class="my-3"
                href="<?= base_url('login') ?>">login</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/darkmode.js"></script>
</body>

</html>