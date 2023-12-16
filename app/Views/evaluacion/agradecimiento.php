<!-- app/Views/evaluacion/thank_you.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias</title>
</head>
<body>
    <h1>Gracias por realizar el proceso de evaluación docente</h1>
    <h2>Asignaturas evaluadas con su código único de referencia:</h2>
    <ul>
        <?php foreach ($evaluatedSubjects as $subjectData): ?>
            <li>
                Asignatura: <?= $subjectData['subject'] ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
