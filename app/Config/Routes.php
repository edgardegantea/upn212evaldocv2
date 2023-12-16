<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();


$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);


// $routes->get('evaluacion', 'Admin\PreguntasEvalController::index');
// $routes->get('evaluacion/pp', 'Admin\PreguntasEvalController::index');
// $routes->post('evaluacion/enviar', 'Admin\PreguntasEvalController::enviar');
// $routes->get('evaluacion/agradecimiento', 'Admin\PreguntasEvalController::agradecimiento');


$routes->get('instrucciones', 'Usuario\FrontendController::instrucciones');
$routes->get('acercade', 'Usuario\FrontendController::acercade');
$routes->get('contacto', 'Usuario\FrontendController::contacto');
// $routes->get('login', 'UserController::login');


$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');


    $routes->get('evaluacion/tde', 'Admin\EvaluacionController::tde');

    $routes->get('usuarios/edit_password/(:num)', 'Admin\UsuarioController::editPassword/$1'); // Mostrar formulario para editar la contraseña
    $routes->post('usuarios/update_password/(:num)', 'Admin\UsuarioController::updatePassword/$1'); // Actualizar la contraseña del usuario

    $routes->get('evaluacion/rpp/(:num)', 'Admin\EvaluacionController::resultadosPorProfesor/$1');


    $routes->get('evaluacion/rev', 'Admin\EvaluacionController::rev');
    $routes->get('evaluacion/rev/(:num)', 'Admin\EvaluacionController::rev/$1');

    $routes->get('evaluacion/gracias', 'Admin\EvaluacionController::gracias');
    $routes->get('evaluacion/gracias3/(:num)', 'Admin\EvaluacionController::agradecimiento/$1');
    $routes->get('evaluacion/gracias2/(:num)', 'Admin\EvaluacionController::gracias2/$1');


    $routes->get('evaluacion/otropdf', 'Admin\EvaluacionController::otropdf');


    // Ruta para generar reporte de evaluación
    $routes->get('evaluacion/reporte/(:num)', 'Admin\EvaluacionController::generateTeacherReport/$1');

    $routes->get('evaluacion/reporte/download/(:num)', 'Admin\EvaluacionController::downloadTeacherReport/$1');


    // Ruta de promedio por dimensiones
    // $routes->get('evaluacion/ppd', 'Admin\EvaluacionController::promedioPorDimensiones');
    $routes->get('evaluacion/ppd/(:num)', 'Admin\EvaluacionController::promedioPorDimensiones/$1');

    // $routes->get('evaluacion/ppe', 'Admin\EvaluacionController::ppe');
    $routes->get('evaluacion/ppe/(:num)', 'Admin\EvaluacionController::ppe/$1');

    $routes->get('evaluacion/ppdim/(:num)', 'Admin\EvaluacionController::promedioPorD/$1');
    $routes->get('evaluacion/average/(:num)', 'Admin\EvaluacionController::average/$1');
    $routes->get('evaluacion/asp/(:num)', 'Admin\EvaluacionController::asp/$1');

    // $routes->get('evaluacion/rpp', 'Admin\EvaluacionController::resultadosPorProfesor');
    $routes->get('evaluacion/promedio', 'Admin\EvaluacionController::promedio');

    $routes->get('evaluacion/cp/(:num)', 'Admin\EvaluacionController::comentariosProfesor/$1');

    $routes->get('evaluacion/pl', 'Admin\EvaluacionController::listaProfesores');

    $routes->get('evaluacion/gpp/(:num)', 'Admin\EvaluacionController::graficaPorProfesor/$1');

    // Promedio de calificación en respuestas por docente
    // $routes->get('evaluacion/rpp/(:num)', 'Admin\ResultadosController::respuestasPorProfesor/$1');


    $routes->get('evaluacion/cpd', 'Admin\EvaluacionController::comentariosPorDocente');

    $routes->get('usuarios/pdfUsuario', 'Admin\UsuarioController::pdfUsuario');
    $routes->get('usuarios/bu', 'Admin\UsuarioController::bu');

    $routes->get('evaluacion/resultados', 'Admin\EvaluacionController::resultados');

    $routes->get('evaluacion/resultados2', 'Admin\EvaluacionController::resultados2');
    $routes->get('evaluacion/', 'Admin\EvaluacionController::index');
    $routes->get('evaluacion2/', 'Admin\EvaluacionController::index2');
    $routes->get('evaluacion/formulario', 'Admin\EvaluacionController::mostrarFormulario');
    $routes->post('evaluacion/enviar', 'Admin\EvaluacionController::enviar');

    // importar datos de estudiantes con CSV
    $routes->get('csv/sdue', 'Admin\UsuarioController::sdue');
    $routes->post('csv/idue', 'Admin\UsuarioController::idue');

    // importar datos de profesores con CSV
    $routes->get('csv/sdp', 'Admin\ProfesorController::sdp');
    $routes->post('csv/idp', 'Admin\ProfesorController::idp');


    $routes->get('asignaturas/prueba2', 'Admin\AsignaturaController::prueba2');
    $routes->get('asignaturas/prueba', 'Admin\AsignaturaController::prueba');

    $routes->get('ea', 'Admin\PreguntasEvalController::cargarAsignaturasPorEstudiante');
    $routes->get('asignacionAE', 'Admin\EstudianteAsignaturaController::index');
    $routes->post('guardarAsignacionAE', 'Admin\EstudianteAsignaturaController::guardarAsignacion');

    $routes->get('asignacion', 'Admin\ProfesorAsignaturaController::index');
    $routes->post('guardarAsignacion', 'Admin\ProfesorAsignaturaController::guardarAsignacion');


    // $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->resource('asignaturas', ['controller' => 'Admin\AsignaturaController']);
    $routes->resource('sedes', ['controller' => 'Admin\SedeController']);
    $routes->resource('grupos', ['controller' => 'Admin\GrupoController']);
    $routes->resource('estudiantes', ['controller' => 'Admin\EstudianteController']);
    $routes->resource('modalidades', ['controller' => 'Admin\ModalidadController']);
    $routes->resource('periodosescolares', ['controller' => 'Admin\PeriodoEscolarController']);
    $routes->resource('preguntas', ['controller' => 'Admin\PreguntaController']);
    $routes->resource('dimensiones', ['controller' => 'Admin\DimensionController']);
    $routes->resource('carreras', ['controller' => 'Admin\CarreraController']);
    $routes->resource('profesores', ['controller' => 'Admin\ProfesorController']);
    $routes->resource('evaluacion', ['controller' => 'EvaluacionController']);
    $routes->resource('areas', ['controller' => 'Admin\AreaController']);
});

$routes->group('docente', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Docente\DocenteController::index');
    $routes->resource('asignaturas', ['controller' => 'Docente\AsignaturaController'], ['only' => ['index', 'show']]);
});

$routes->group('estudiante', ['filter' => 'auth'], function ($routes) {
    $routes->get('evaluacion/', 'Admin\EvaluacionController::index2');
    $routes->get('evaluacion/formularioE', 'Admin\EvaluacionController::mostrarFormularioE');
    $routes->post('evaluacion/enviarE', 'Admin\EvaluacionController::enviarE');

    // $routes->get('evaluacion', 'Estudiante\PreguntasEvalController::index');
    $routes->get('/', 'Estudiante\EstudianteController::index');
    // $routes->resource('evaluacion', ['controller' => 'EvaluacionController']);


    $routes->get('evaluacion/CED', 'Estudiante\EvaluacionController::generarConstanciaED');

});

$routes->get('logout', 'UserController::logout');

$routes->get('evaluacion', 'EvaluacionController::index');

// Ruta de prueba
$routes->get('login2', 'UserController::login2');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
