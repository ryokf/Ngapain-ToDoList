<div class="container d-flex justify-content-evenly flex-wrap my-3">
    <?php foreach($data_user as $user): ?>
    <div class="card my-2" style="width: 45%; height: 45%;">
        <div class=" d-flex justify-content-center mt-2">
            <img src="https://assets.digitalocean.com/articles/alligator/css/object-fit/example-object-fit.jpg"
                class="card-img-top img-card" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $user['username'] ?></h5>
            <p class="card-text card-text-profile">Some quick example text to build on the card title
                and
                make up the bulk</p>
            <a href="#" class="btn btn-primary btn-sm">Kunjungi</a>
        </div>
    </div>
    <?php endforeach ?>
</div>