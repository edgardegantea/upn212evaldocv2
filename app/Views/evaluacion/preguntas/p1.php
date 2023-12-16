<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta Likert</title>
</head>
<body>
<h1>Encuesta Likert</h1>
<form method="post" action="<?= site_url('evaluacion/enviar') ?>">
    <p>Pregunta 1: ¿Cómo te sientes acerca de este producto?</p>
    <input type="radio" name="p1" value="1"> Muy mal
    <input type="radio" name="p1" value="2"> Mal
    <input type="radio" name="p1" value="3"> Neutral
    <input type="radio" name="p1" value="4"> Bien
    <input type="radio" name="p1" value="5"> Muy bien

    <p>Pregunta 2: ¿Recomendarías este producto a otros?</p>
    <input type="radio" name="p2" value="1"> Definitivamente no
    <input type="radio" name="p2" value="2"> Probablemente no
    <input type="radio" name="p2" value="3"> No estoy seguro
    <input type="radio" name="p2" value="4"> Probablemente sí
    <input type="radio" name="p2" value="5"> Definitivamente sí

    <input type="submit" value="Enviar encuesta">
</form>
</body>
</html>
