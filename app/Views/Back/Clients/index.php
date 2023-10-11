<?php echo $this->extend('Back/Layout/main') ?>

<?php echo $this->section('title'); ?>

<?php echo $title ?? 'Home'; ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('css'); ?>



<?php echo $this->endSection(); ?>


<?php echo $this->section('content'); ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
            <a href="<?php echo route_to('clients.new'); ?>" class="btn btn-success btn-sm float-right">Nova</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php echo $clients; ?>

            </div>
        </div>
    </div>

</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section('js'); ?>



<?php echo $this->endSection(); ?>