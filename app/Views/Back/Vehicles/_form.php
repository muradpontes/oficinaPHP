<div class="row">
    <div class="form-group col-md-4">
        <label for="brand">Marca</label>
        <input type="text" class="form-control" name="brand" value="<?php echo old('brand', $vehicle->brand); ?>" id="brand"
            aria-describedby="brandHelp" placeholder="Marca">
        <?php echo show_error_input('brand'); ?>
    </div>

    <div class="form-group col-md-4">
        <label for="model">Modelo</label>
        <input type="text" class="form-control" name="model" value="<?php echo old('model', $vehicle->model); ?>" id="model"
            aria-describedby="modelHelp" placeholder="Modelo">
        <?php echo show_error_input('model'); ?>
    </div>

    <div class="form-group col-md-4">
        <label for="year">Ano</label>
        <input type="text" class="form-control" name="year" value="<?php echo old('year', $vehicle->year); ?>" id="year"
            aria-describedby="yearHelp" placeholder="Ano">
        <?php echo show_error_input('year'); ?>
    </div>

    <div class="form-group col-md-4">
        <label for="license_plate">Placa</label>
        <input type="text" class="form-control" name="license_plate" value="<?php echo old('license_plate', $vehicle->license_plate); ?>"
            id="license_plate" aria-describedby="licensePlateHelp" placeholder="Placa">
        <?php echo show_error_input('license_plate'); ?>
    </div>

    <div class="form-group col-md-4">
        <label for="client_id">Cliente Associado</label>
        <select class="form-control" name="client_id" id="client_id" required>
            <?php
            $db = \Config\Database::connect();

            $query = $db->table('clients')->select('id, name')->get();
            $clients = $query->getResult();

            foreach ($clients as $client) {
                echo '<option value="' . $client->id . '">' . $client->name . '</option>';
            }
            ?>
        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary mt-4">Salvar</button>
<a href="<?php echo route_to('vehicles') ?>" class="btn btn-secondary mt-4">Voltar</a>
