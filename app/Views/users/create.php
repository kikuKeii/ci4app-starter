<?= $this->extend('layout/template'); ?>

<?= $this->section('conten'); ?>
<h3 class="text-dark mb-4 mt-4">Create</h3>
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Input Anggota</p>
    </div>
    <div class="card-body">

        <form class="user" action="/users/save" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
                <input class="form-control form-control-user <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" type="text" id="name" placeholder="Name" name="name" autofocus value="<?= old('name'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('name'); ?>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control form-control-user <?= ($validation->hasError('position')) ? 'is-invalid' : ''; ?>" type="text" id="position" placeholder="Position" name="position" value="<?= old('position'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('position'); ?>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control form-control-user <?= ($validation->hasError('office')) ? 'is-invalid' : ''; ?>" type="text" id="Office" placeholder="Office" name="office" value="<?= old('office'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('office'); ?>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control form-control-user <?= ($validation->hasError('age')) ? 'is-invalid' : ''; ?>" type="number" id="age" placeholder="Age" name="age" value="<?= old('age'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('age'); ?>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control form-control-user <?= ($validation->hasError('salary')) ? 'is-invalid' : ''; ?>" type="number" id="salary" placeholder="Salary" name="salary" value="<?= old('salary'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $validation->getError('salary'); ?>
                </div>
            </div>
            <button class="btn btn-primary btn-block text-white btn-user" type="submit" value="1">Submit Data</button>
            <hr>

            <hr>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>