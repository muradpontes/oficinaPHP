<?php echo $this->extend('Back/Layout/main') ?>

<?php echo $this->section('title'); ?>

<?php echo $title ?? 'Home'; ?>

<?php echo $this->endSection(); ?>

<?php echo $this->section('css'); ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('content'); ?>

<div class="container-fluid">
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?php echo $title; ?>
            </h6>
        </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Serviço</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dates as $date) { ?>
                    <tr>
                        <td>
                            <?php echo $date->description; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($date->created_at)); ?>
                        </td>
                        <td>
                            <?php echo $date->total; ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <th scope="row">Total</th>
                    <td></td>
                    <td>
                        <?php echo $totalValue; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
    
</div>
<a href="<?php echo route_to('services') ?>" class="btn btn-secondary btn-sm float-right">Voltar</a>
<?php echo $this->endSection(); ?>


<?php echo $this->section('js'); ?>

<script src="<?php echo base_url('back/mask/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo base_url('back/mask/app.js'); ?>"></script>

<?php echo $this->endSection(); ?>