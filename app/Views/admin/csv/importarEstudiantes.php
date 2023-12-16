<?= $this->extend('admin/template/layout');
$this->section('title') ?>Importar información de estudiantes<?= $this->endSection();
?>

<?= $this->section('content') ?>


<form action="csv/importData" method="post" enctype="multipart/form-data">
    <input type="file" name="csv_file" accept=".csv" required>
    <input type="submit" value="Import">
</form>