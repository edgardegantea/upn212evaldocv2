<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANTALLA DIVIDIDA EN 2 PARTES</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap');
        body{ margin: 0; font-family: 'Roboto Condensed', sans-serif; }
        .container{
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: url("<?php echo base_url('assets/img/fondos/fondo1.jpg'); ?>") center;
            background-size: cover;
            height: 100vh;
        }
        .left{
            background: linear-gradient(red, rgba(0, 0, 255, 0.411));
            display: flex;
            place-items: center;
            justify-content: center;
            text-align: center;
        }
        .left h1{ color:  white; font-size: 50px;}
        .left p{ color: white; font-size: 20px; }
        .left a{ border-radius: 25px; border: 1px solid white; text-decoration: none; padding: 10px 50px; transition: background 1s; color:white}
        .left a:hover{ background: white; color:blue}
        @media (max-width:900px){
            .container{
                grid-template-columns: 3fr 1fr;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left">
        <div>
            <h1>CODEA</h1>
            <p>Dev FullStack</p>
            <a href="">ENTER</a>
        </div>
    </div>
    <div class="right">
    </div>
</div>

</body>
</html>