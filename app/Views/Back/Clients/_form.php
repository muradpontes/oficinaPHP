<div class="row">

    <div class="form-group col-md-4">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" value="<?php echo old('name', $client->name); ?>" id="name" aria-describedby="nameHelp" placeholder="Nome">
        <?php echo show_error_input('name'); ?>
    </div>


    <div class="form-group col-md-4">
        <label for="phone">Telefone</label>
        <input type="tel" class="form-control phone_with_ddd" name="phone" value="<?php echo old('phone', $client->phone); ?>" id="phone" aria-describedby="phoneHelp" placeholder="Telefone">
        <?php echo show_error_input('phone'); ?>
    </div>


    <div class="form-group col-md-4">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" value="<?php echo old('email', $client->email); ?>" id="email" aria-describedby="emailHelp" placeholder="E-mail">
        <?php echo show_error_input('email'); ?>
    </div>


    <div class="form-group col-md-4">
        <label for="address">Endereço</label>
        <input type="text" class="form-control" name="address" value="<?php echo old('address', $client->address); ?>" id="address" aria-describedby="addressHelp" placeholder="Endereço">
        <?php echo show_error_input('address'); ?>
    </div>


</div>


<button type="submit" class="btn btn-primary mt-4">Salvar</button>

<a href="<?php echo route_to('clients') ?>" class="btn btn-secondary mt-4">Voltar</a>