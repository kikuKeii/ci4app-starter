<?= $this->extend('layout/template'); ?>

<?= $this->section('conten'); ?>
<a href="/users/create" class="btn btn-primary">Tambahkan Data</a>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<h3 class="text-dark mb-4 mt-4">Team</h3>
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">Employee Info</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>&nbsp;</label></div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
            </div>
        </div>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <!-- <th>Salary</th> -->
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <td><img class="rounded-circle mr-2" width="30" height="30" src="/assets/img/avatars/<?= $u['img']; ?>"><?= $u['name']; ?></td>
                            <td><?= $u['position']; ?></td>
                            <td><?= $u['office']; ?></td>
                            <td><?= $u['age']; ?></td>
                            <!-- <td>Rp. <?= $u['salary']; ?></td> -->
                            <td><a href="/dashboard/users/<?= $u['slug']; ?>" class="btn btn-primary">Detail</a></td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>Position</strong></td>
                        <td><strong>Office</strong></td>
                        <td><strong>Age</strong></td>
                        <!-- <td><strong>Salary</strong></td> -->
                        <td><strong>Options</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>