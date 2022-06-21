<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginStyle.css">
    <style>
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

    /* ======================================================= */
    p {
        font-size: 11px;
        text-align: center;
    }

    .changeMode {
        height: 20px;
        width: 25%;
        margin: 1% auto;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        /* border: 1px solid black; */
        font-size: 10px;
    }

    .drkmode {
        background-color: #333;
        color: white;
    }

    .btn-other {
        border: 1px solid #6A67CE !important;
        color: #6A67CE;
    }

    /* YAKIN DEK */
    .lupapass {
        position: absolute;
        top: 19.5rem;
        left: 1rem;
    }

    /* REGISTER */
    .register {
        position: absolute;
        bottom: 1rem;
        right: 0;
        left: 0;
    }

    /* KOSONG */
    .btn {
        width: 50%;
    }

    .kosong {
        position: absolute;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        width: 100%;
        position: relative;
        top: 1rem;
    }

    a {
        text-decoration: none;
        color: #6A67CE;
    }
    </style>

</head>

<body class="bg-hitam">

    <div class="changeMode bg-hitam">
        <p id="ch" class="text-dark">Mode(light)&nbsp;&nbsp;v </p>
        <p id="ch" class="text-dark">Mode(dark)&nbsp;&nbsp; </p>
    </div>
    <h1 class="text-center my-5 text-white">Ngapain!!</h1>

    <div class="container my-5">
        <form action="<?= base_url('login/proses') ?>" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="kosong">
                <button type="submit" class="btn btn-dark bg-lavender text-white" name="submit">Login</button>
                <a href="" class="btn btn-outline-light btn-other">cara lain</a>
            </div>
        </form>
        <div class="lupapass text-center">
            <p class="text-center">lupa password? <a href="#">klik link ini</a></p>
        </div>
        <div class="register">
            <p class="my-3">belum punya akun?, silahkan buat akun memlalui link ini <a class="my-3"
                    href="<?= base_url('register') ?>">register</a></p>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="js/darkmode.js"></script>
</body>

</html>