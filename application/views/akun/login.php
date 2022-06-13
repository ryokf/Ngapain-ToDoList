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
    p {
        font-size: 11px;
        text-align: center;
    }
    </style>

</head>

<body>
    <div class="changeMode">
        <p>Mode (light)&nbsp;&nbsp;∨ </p>
    </div>
    <h1 class="text-center my-5">Ngapain!!</h1>

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
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
                <a href="" class="btn btn-outline-primary">Other</a>
            </div>
        </form>
        <div class="lupapass text-center">
            <p class="text-center">lupa password? <a href="#">yakin dek!</a></p>
        </div>
        <div class="register">
            <p class="my-3">belum punya akun?, silahkan buat akun memlalui link ini <a class="my-3"
                    href="<?= base_url('register') ?>">register</a></p>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>