<!-- app/Views/evaluacion/evaluation_summary.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Summary</title>
</head>
<body>
    <h1>Evaluation Summary</h1>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Reference Code</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaluatedSubjects as $subjectInfo): ?>
                <tr>
                    <td><?= $subjectInfo['subject'] ?></td>
                    <td><?= $subjectInfo['referenceCode'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
