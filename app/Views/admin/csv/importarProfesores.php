<?= $this->extend('admin/template/layout');
$this->section('title') ?>Importar información de estudiantes<?= $this->endSection();
?>

<?= $this->section('content') ?>

<div class="text-center">
<form class="mt-5" action="<?php echo base_url('admin/csv/idp'); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="csv_file" accept=".csv" required>
    <input class="btn btn-primary" type="submit" value="Importar datos">
</form>
</div>

<?= $this->endSection(); ?>