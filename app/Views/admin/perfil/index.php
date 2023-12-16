<?= $this->extend('admin/template/layout');

$this->section('title') ?>Mi perfil<?= $this->endSection();

$this->section('encabezado') ?><p class="text-uppercase">Información del estudiante seleccionado</p><?= $this->endSection();

?>

<?= $this->section('content'); ?>
    <div class="">
        <div class="row py-4">
            <div class="text-end">
            </div>
        </div>

        <div class="card">
            <?= session()->get('nombre') ?> <?= session()->get('apaterno'); ?> <?= session()->get('amaterno') ?>
        </div>

    </div>

<?= $this->endSection() ?>