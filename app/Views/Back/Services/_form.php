<div class="row">

    <div class="form-group col-md-4">
        <label for="description">Descrição</label>
        <input type="text" class="form-control" name="description"
            value="<?php echo old('description', $service->description); ?>" id="description"
            aria-describedby="descriptionHelp" placeholder="Descrição">
        <?php echo show_error_input('description'); ?>
    </div>

    <div class="form-group col-md-4">
    <label for="associated_vehicle">Veículo Associado</label>
        <select class="form-control" name="associated_vehicle" id="associated_vehicle" required>
            <?php
            $db = \Config\Database::connect();

            $query = $db->table('vehicles')->select('id, brand, model')->get();
            $vehicles = $query->getResult();

            foreach ($vehicles as $vehicle) {
                echo '<option value="' . $vehicle->id . '">' . $vehicle->brand . ' ' . $vehicle->model . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="total">Total</label>
        <input type="number" class="form-control" name="total" value="<?php echo old('total', $service->total); ?>"
            id="total" aria-describedby="totalHelp" placeholder="Total">
        <?php echo show_error_input('total'); ?>
    </div>

</div>


<button type="submit" class="btn btn-primary mt-4">Salvar</button>

<a href="<?php echo route_to('services') ?>" class="btn btn-secondary mt-4">Voltar</a>