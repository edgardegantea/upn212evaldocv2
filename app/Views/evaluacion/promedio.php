<?=
    $this->extend('admin/template/layout');
    $this->section('title') ?> Promedio <?= $this->endSection();
?>

<?= $this->section('content'); ?>
<div class="">
    <h1>Promedio por profesor</h1>
    <table>
        <tr>
            <th>Professor</th>
            <th>Question</th>
            <th>Average Score</th>
        </tr>
        <?php foreach ($averageScores as $profesorId => $questionScores): ?>
            <?php foreach ($questionScores as $questionIndex => $scoreData): ?>
                <tr>
                    <td><?= $professorNames[$profesorId] ?></td>
                    <td>Question <?= $questionIndex ?></td>
                    <td><?= number_format($scoreData['average'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
