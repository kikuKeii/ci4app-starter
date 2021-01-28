<?= $this->extend('layout/template'); ?>

<?= $this->section('conten'); ?>
<h3 class="text-dark mb-4 mt-4">User</h3>
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Detail</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/img/avatars/<?= $user['img']; ?>" alt="..." style="width: 150px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name']; ?></h5>
                            <p class="card-text"><b>Position : </b> <?= $user['position']; ?></p>
                            <p class="card-text"><b>Office : </b> <?= $user['office']; ?></p>
                            <p class="card-text"><b>Age : </b> <?= $user['age']; ?></p>
                            <p class="card-text"><b>salary : </b> RP. <?= $user['salary']; ?></p>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a></a><br><br>
                            <a href="/users" class="card-text"><small class="text-muted">Kembali</small></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>