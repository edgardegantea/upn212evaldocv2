<?=
$this->extend('admin/template/layout');
$this->section('title') ?> Profesores evaluados <?= $this->endSection();
?>

<?= $this->section('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="">
        <?php foreach ($averageScores as $questionIndex => $scoreData): ?>
            <?php $promedio[] = number_format($scoreData['average'], 2) ?>


        <?php endforeach; ?>


        <?php
        // DIMENSIÓN: Dominio de la temática
        // $dimension1 = 43, 44 y 45
        $dimension1 = [
            $promedio[42],
            $promedio[43],
            $promedio[44]
        ];
        $promedioDimension1 = array_sum($dimension1) / count($dimension1);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>

        <?php
        // DIMENSIÓN: Actitud de atención hacia el estudiante
        // $dimension2 = 15, 16, 41
        $dimension2 = [
            $promedio[14],
            $promedio[15],
            $promedio[40]
        ];
        $promedioDimension2 = array_sum($dimension2) / count($dimension2);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>

        <?php
        // DIMENSIÓN: Promoción de la participación y el aprendizaje
        // $dimension3 = 10, 11, 12, 13, 14, 17, 19
        $dimension3 = [
            $promedio[9],
            $promedio[10],
            $promedio[11],
            $promedio[12],
            $promedio[13],
            $promedio[16],
            $promedio[18]
        ];
        $promedioDimension3 = array_sum($dimension3) / count($dimension3);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>


        <?php
        // DIMENSIÓN: Formación integral
        // preguntas: 18, 18, 21
        $dimension4 = [
            $promedio[17],
            $promedio[19],
            $promedio[20]
        ];
        $promedioDimension4 = array_sum($dimension4) / count($dimension4);
        //echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>


        <?php
        // DIMENSIÓN: Planeación y organización
        // $dimension5 = 1 a 9
        $dimension5 = [
            $promedio[0],
            $promedio[1],
            $promedio[2],
            $promedio[3],
            $promedio[4],
            $promedio[5],
            $promedio[6],
            $promedio[7],
            $promedio[8]
        ];
        $promedioDimension5 = array_sum($dimension5) / count($dimension5);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>


        <?php
        // DIMENSIÓN: Evaluación del aprendizaje
        // $dimension6 = 22 a 37
        $dimension6 = [
            $promedio[21],
            $promedio[22],
            $promedio[23],
            $promedio[24],
            $promedio[25],
            $promedio[26],
            $promedio[27],
            $promedio[28],
            $promedio[29],
            $promedio[30],
            $promedio[31],
            $promedio[32],
            $promedio[33],
            $promedio[34],
            $promedio[35],
            $promedio[36]
        ];
        $promedioDimension6 = array_sum($dimension6) / count($dimension6);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>

        <?php
        // DIMENSIÓN: Acreditación del aprendizaje
        // $dimension7 = 38, 39, 40
        $dimension7 = [
            $promedio[37],
            $promedio[38],
            $promedio[39]
        ];
        $promedioDimension7 = array_sum($dimension7) / count($dimension7);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>

        <?php
        // DIMENSIÓN: Asistencia y puntualidad
        // $dimension8 = 41 y 45
        $dimension8 = [
            $promedio[41],
            $promedio[45]
        ];
        $promedioDimension8 = array_sum($dimension8) / count($dimension8);
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>

        <?php
        // DIMENSIÓN: Comentarios
        // $dimension9 = $pregunta[37] + $promedio[38] + $promedio[39];
        $dimension9 = [
            // $promedio[50] = 'Revisar comentarios de la evaluación docente'
        ];
        // $promedioDimension9 = array_sum($dimension9) / count($dimension9);
        $promedioDimension9 = 0.001;
        // echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);
        ?>

        <?php

        $nombreDimensiones = [];

        $promedioDimensiones = [
            $promedioDimension1,
            $promedioDimension2,
            $promedioDimension3,
            $promedioDimension4,
            $promedioDimension5,
            $promedioDimension6,
            $promedioDimension7,
            $promedioDimension8,
            $promedioDimension9
        ];

        foreach ($dimensiones as $d): ?>
            <?php $nombreDimensiones[] = $d['nombre']; ?>
        <?php endforeach; ?>


        <?php
        $promDimensiones = ($promedioDimension1 + $promedioDimension2 + $promedioDimension3 + $promedioDimension4 + $promedioDimension5 + $promedioDimension6 + $promedioDimension7 + $promedioDimension8) / 8;
        ?>


        <div class="card mb-5">
            <div class="card-header">
                <h3>Promedios por dimensión</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h4 class="">Promedio general de la evaluación
                        docente: <?= number_format($promDimensiones, 2) ?></h4>
                </li>

                <li class="list-group-item">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>DIMENSIÓN</th>
                        <th>PROMEDIO</th>
                        <th>NIVEL</th>
                        </thead>

                        <tbody>

                            <?php
                            if (count($nombreDimensiones) === count($promedioDimensiones)) {
                                $longitud = count($nombreDimensiones);

                                for ($i = 0; $i < $longitud - 1; $i++) {
                                    $valor1 = $nombreDimensiones[$i];
                                    $valor2 = $promedioDimensiones[$i];
                                    echo '</tr>';
                                    echo '<td>' . $valor1 . '</td>';
                                    echo '<td>' . number_format($valor2, 2) . '</td>';
                                    if ($valor2 <= 4) {
                                        echo '<td>Regular</td>';
                                    } else if ($valor2 <= 5) {
                                        echo '<td>Muy bueno</td>';
                                    }
                                }
                            } else {
                                echo "Los arrays no tienen la misma longitud.";
                            }
                            echo '</tr>';
                            ?>

                            <tr>
                                <td>
                                    <?php
                                    echo $nombreDimensiones[8];
                                    ?>
                                </td>
                                <td class="text-center" colspan="2">-- No evaluable numéricamente --</td>
                            </tr>
                        </tbody>

                    </table>
                </li>
            </ul>
        </div>




        <?php

        $pregunta = [];
        $promedio = [];

        foreach ($preguntas as $p): ?>
            <?php $pregunta[] = $p['pregunta']; ?>
        <?php endforeach; ?>

        <?php foreach ($averageScores as $questionIndex => $scoreData): ?>
            <?php $promedio[] = number_format($scoreData['average'], 2) ?>

        <?php endforeach; ?>

        <?php
        if ($promedio <= 3) {
            $mensaje = 'Suficiente';
        } else if ($promedio <= 5) {
            $mensaje = 'Bueno';
        }
        ?>


        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/evaluacion/pl') ?>" class="btn btn-default float-right mr-2"><i
                            class="fa fa-arrow-left"></i> Regresar</a>
                <h3>Resultados generales de <?= $professorName ?></h3>
            </div>

            <div class="card-body">
                <div class="card-text">
                    <p class="mt-3 mb-3 text-muted">Cada una de las preguntas listadas contiene el promedio de todas
                        las respuestas enviadas por los esudiantes evaluadores</p>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>PREGUNTA DE EVALUACIÓN</th>
                        <th>PROMEDIO</th>
                        <th>NIVEL</th>


                        <?php

                        if (count($pregunta) === count($promedio)) {
                            $longitud = count($pregunta);

                            for ($i = 0; $i < $longitud; $i++) {
                                $valor1 = $pregunta[$i];
                                $valor2 = $promedio[$i];
                                echo '</tr>';
                                echo '<td>' . $valor1 . '</td>';
                                echo '<td>' . $valor2 . '</td>';


                                if ($valor2 <= 4) {
                                    echo '<td>Regular</td>';
                                } else if ($valor2 <= 5) {
                                    echo '<td>Muy bueno</td>';
                                }

                            }
                        } else {
                            echo "Los arrays no tienen la misma longitud.";
                        }
                        echo '</tr>';
                        ?>
                </table>
            </div>
        </div>


        </div>
        <?= $this->endSection(); ?>


        <?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>