<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
    $( document ).ready(function() {
        console.log( "document loaded" );
    });
 
    $( window ).on( "load", function() {
        console.log( "window loaded" );
    });
    </script>

<div class="container">
    <div class="mr-5 ml-5">

        <h1>Evaluación Docente</h1>
        <form action="<?= base_url('estudiante/evaluacion/enviar') ?>" method="post">

        <input type="hidden" name="periodo" value='1'>    

        <div class="row">
                    <select class="js-example-basic-single form-control" name="asignatura" required>
                        <option value="">Seleccione la asignatura</option>
                        <?php foreach ($asignaturas as $asignatura): ?>
                        <option value="<?= $asignatura['id'] ?>"><?= $asignatura['clave'] ?>
                            <?= $asignatura['nombre'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="row mt-3">
                    <select class="js-example-basic-single form-control" name="profesor" required>
                        <option value="">Seleccione al/la docente</option>
                        <?php foreach ($profesores as $profesor): ?>
                        <option value="<?= $profesor['id'] ?>"><?= $profesor['nombre'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>



            <div class="mt-5">
                <h2>Preguntas de Evaluación</h2>
            </div>
            <?php foreach ($preguntas as $index => $pregunta): ?>
            <div class="card mt-5">
                <div class="card-header text-white" style="background-color: #0a53be">
                    <?= $pregunta['pregunta'] ?>
                </div>
                <div class="card-body">
                    <input type="radio" name="pregunta<?= $index + 1 ?>" value="1"> Totalmente en desacuerdo
                    <br><input type="radio" name="pregunta<?= $index + 1 ?>" value="2"> En desacuerdo
                    <br><input type="radio" name="pregunta<?= $index + 1 ?>" value="3"> Neutral
                    <br><input type="radio" name="pregunta<?= $index + 1 ?>" value="4"> De acuerdo
                    <br><input type="radio" name="pregunta<?= $index + 1 ?>" value="5"> Totalmente de acuerdo
                </div>
            </div>


            <?php endforeach; ?>



            <div class="card bg-secondary mt-5">
                <div class="card-header text-light">
                    Comentarios Adicionales
                </div>
                <div class="card-body">
                    <textarea class="form-control" name="comentario" id="comentario"></textarea>
                </div>
            </div>


            <div class="mt-5 mb-5 d-flex flex-row-reverse">
                <a class="btn btn-secondary" href="<?php base_url('estudiante/evaluacion/agradecimiento'); ?>">Salir de
                    la evaluación</a>
                <button class="btn btn-primary p2" type="submit">Enviar evaluación</button>
            </div>

        </form>



        

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2({});
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single2').select2({});
        });
        </script>



        <!-- seleccionar asignatura -->
        <script>
        const searchInput = document.getElementById('searchInput');
        const asignaturaDropdown = document.getElementById('asignaturaDropdown');
        const options = asignaturaDropdown.options;

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                const text = option.text.toLowerCase();
                const contains = text.includes(searchTerm);
                option.style.display = contains ? 'block' : 'none';
            }
        });
        </script>


        <!-- seleccionar docente -->
        <script>
        const searchInput2 = document.getElementById('searchInput2');
        const profesorDropdown = document.getElementById('profesorDropdown');
        const options2 = profesorDropdown.options;

        searchInput2.addEventListener('input', function() {
            const searchTerm = searchInput2.value.toLowerCase();
            for (let i = 0; i < options2.length; i++) {
                const option = options2[i];
                const text = option.text.toLowerCase();
                const contains = text.includes(searchTerm);
                option.style.display = contains ? 'block' : 'none';
            }
        });
        </script>

    </div>
</div>