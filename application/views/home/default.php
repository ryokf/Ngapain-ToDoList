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
    <div class="my-3"></div>
    <span class="mt-3 wadah-tanggal text-white"><?= $tanggal ?></span>

    <?php foreach($data_kegiatan as $kegiatan): ?>

    <?php if( $kegiatan['tanggal_deadline'] == $tanggal ): ?>

    <div class="accordion-item gelap my-1">

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
                <img src="img/foto_kegiatan/<?= $kegiatan['foto'] ?>" alt="" class="foto-kegiatan">
                <p><b>nama kegiatan: <?= $kegiatan['kegiatan'] ?></b></p>
                <p>lokasi : <?= $kegiatan['lokasi'] ?></p>
                <p>waktu :
                    <?= $kegiatan['tanggal_deadline'] . ' | ' . $kegiatan['waktu_deadline'] ?>
                </p>
                <p>deskripsi : <?= $kegiatan['deskripsi'] ?></p>
                <span class="d-flex">
                    <!-- edit dan hapus -->
                    <a type="button" class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModalHapus<?= $kegiatan['id'] ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg></a>
                    <a href="" class="btn btn-primary btn-sm text-white" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop<?= $kegiatan['id'] ?>"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg></a>
                    <!-- Modal hapus-->
                    <div class="modal fade" id="exampleModalHapus<?= $kegiatan['id'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div> -->
                                <div class="modal-body">
                                    yakin ingin menghapus data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">batal</button>
                                    <a class="btn btn-danger"
                                        href="<?= base_url('home/hapus') . '/' . $kegiatan['id'] ?>">yakin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- visibilitas -->
                    <?php if( $kegiatan['visibilitas'] == 'public' ): ?>
                    <a class="btn btn-sm bg-success mx-1 text-white"
                        href="<?= base_url('home/visibilitas_ke_private/') ?><?= $kegiatan['id'] ?>">public</a>
                    <?php else: ?>
                    <a class="btn btn-sm bg-danger mx-1 text-white"
                        href="<?= base_url('home/visibilitas_ke_public/') ?><?= $kegiatan['id'] ?>">private</a>
                    <?php endif ?>
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
                                <label for="" class="form-label">waktu</label>
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