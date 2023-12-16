<!-- app/Views/evaluacion/average_scores_by_professor.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Scores by Professor</title>
</head>
<body>
    <h1>Average Scores for Professor <?= $professorName ?></h1>
    <table>
        <tr>
            <th>Question</th>
            <th>Question Text</th>
            <th>Average Score</th>
        </tr>
        <?php foreach ($averageScores as $questionIndex => $scoreData): ?>
            <tr>
                <td>Question <?= $questionIndex ?></td>
                <td><?= $scoreData['questionText'] ?></td>
                <td><?= number_format($scoreData['average'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>Average of Questions 10, 11, 12: <?= number_format($averageOfSpecifiedQuestions, 2) ?></p>
</body>
</html>
