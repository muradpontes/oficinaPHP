<?php echo $this->extend('Back/Layout/main') ?>

<?php echo $this->section('title'); ?>

<?php echo $title ?? 'Home'; ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('css'); ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('content'); ?>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?php echo $title ?? 'Home'; ?>
    </h1>

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo $title ?? 'Home'; ?>
                </h6>

            </div>
            <div class="card-body">
                <?php echo form_open(route_to('services.discounted', $service->id), hidden: ['_method' => 'PUT']); ?>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" name="total"
                            value="<?php echo old('total', $service->total); ?>" id="total" aria-describedby="totalHelp"
                            placeholder="Total" readonly>
                        <?php echo show_error_input('total'); ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="discount">Desconto (%)</label>
                        <input type="number" class="form-control" name="discount" id="discount" min="5" max="50"
                            step="5" value="0">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Salvar</button>

                <a href="<?php echo route_to('services') ?>" class="btn btn-secondary mt-4">Voltar</a>

                <?php echo form_close(); ?>
            </div>
        </div>

        <?php echo $this->endSection(); ?>


        <?php echo $this->section('js'); ?>

        <script src="<?php echo base_url('back/js/discount.js'); ?>"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <?php echo $this->endSection(); ?>