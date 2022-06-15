<?php 

    $tanggal_kegiatan = [];
    foreach($data_kegiatan as $kegiatan){
        array_push($tanggal_kegiatan, $kegiatan['tanggal_deadline']);
    }
     
    $tanggal_kegiatan = array_unique($tanggal_kegiatan);
    // $i = 0;
    // foreach($tanggal_kegiatan as $kegiatan){
    //     $kegiatan = explode('-', $kegiatan);
    //     $jumlah[$i] = array_sum($kegiatan);
        
    //     // print_r($jumlah);
    //     $i++;
    //     // print_r($kegiatan);
    //     // for($i = 0; $i < count($kegiatan) - 1; $i++){
    //     //     echo $kegiatan[$i] . '+' . $kegiatan[$i+1] . '=';
    //     //     $kegiatan[$i] = $kegiatan[$i] + $kegiatan[$i+1];
    //     // }
    //     // print_r($kegiatan);
    //     // echo $kegiatan;
    //     // echo count($kegiatan) . '<br>';
    //     // foreach($kegiatan as $ubah_int){
    //     //     // $ubah_int += $ubah_int;
    //     //     print_r($ubah_int);
    //         echo '<br>';
    //     // }   
    // }

    // var_dump($jumlah);
    
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
                data-bs-target="#collapseTwo<?= $kegiatan['id'] ?>" aria-expanded="false" aria-controls="collapseTwo">
                <div class="d-flex justify-content-between">
                    <span><?= $kegiatan['kegiatan'] ?></span>
                </div>
            </button>
        </h2>
        <div id="collapseTwo<?= $kegiatan['id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <input type="hidden" class="form-control" id="email" name="email"
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
</div>
</div>

<br>
<!-- tambah kegiatan -->
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
                        <textarea class="form-control my-1" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" name="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="email" name="email"
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

</div>