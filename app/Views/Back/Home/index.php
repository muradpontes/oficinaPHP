<?php echo $this->extend('Back/Layout/main') ?>

<?php echo $this->section('title'); ?>

<?php echo $title ?? 'Home'; ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('css'); ?>



<?php echo $this->endSection(); ?>


<?php echo $this->section('content'); ?>

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?php echo $title ?? 'Home';?></h1>

</div>

<?php echo $this->endSection(); ?>


<?php echo $this->section('js'); ?>



<?php echo $this->endSection(); ?>