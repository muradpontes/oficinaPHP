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
                <?php echo form_open(route_to('services.report'), hidden: ['_method' => 'PUT']); ?>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="total">Data Inicial</label>
                        <input type="number" class="form-control" name="total"
                            id="total" aria-describedby="totalHelp"
                            placeholder="Data Inicial" >
                        <?php echo show_error_input('total'); ?>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="total">Data Final</label>
                        <input type="number" class="form-control" name="total"
                            id="total" aria-describedby="totalHelp"
                            placeholder="Data Final">
                        <?php echo show_error_input('total'); ?>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-4">Gerar Relatório</button>

                <a href="<?php echo route_to('services') ?>" class="btn btn-secondary mt-4">Voltar</a>

                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>
</div>

</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section('js'); ?>

<?php echo $this->endSection(); ?>