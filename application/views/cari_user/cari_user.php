<div class="container d-flex justify-content-evenly flex-wrap my-3">
    <?php foreach($data_user as $user): ?>
    <div class="card my-2" style="width: 45%; height: 45%;">
        <div class=" d-flex justify-content-center mt-2">
            <img src="img/pp_user/<?= $user['foto'] ?>" class="card-img-top img-card" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $user['username'] ?></h5>
            <p class="card-text card-text-profile"><?= $user['bio'] ?></p>
            <a href="<?= base_url('cari_pengguna/detail/') . $user['id'] ?>" class="btn btn-primary btn-sm">Kunjungi</a>
        </div>
    </div>
    <?php endforeach ?>
</div>