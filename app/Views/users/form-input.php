<?= $this->extend('layout/template'); ?>

<?= $this->section('conten'); ?>
<div class="form-floating mb-3">
    <label for="floatingInput">Email address</label>
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">

</div>
<div class="form-floating">
    <label for="floatingPassword">Password</label>
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
</div>
<?= $this->endSection(); ?>