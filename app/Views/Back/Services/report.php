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
            <h6 class="m-0 font-weight-bold text-primary">
                <?php echo $title; ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php echo form_open(route_to('services.showReport'), hidden: ['_method' => 'POST']); ?>

                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="dataInicial">Data inicial</label>
                                <input type="date" class="form-control" id="dataInicial" name="dataInicial">
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-group">
                                <label for="dataFinal">Data Final</label>
                                <input type="date" class="form-control" id="dataFinal" name="dataFinal">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                <a href="<?php echo route_to('services') ?>" class="btn btn-secondary mt-2 mb-2">Voltar</a>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



<?php echo $this->endSection(); ?>


<?php echo $this->section('js'); ?>

<?php echo $this->endSection(); ?>