<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\AsignaturaModel;
use App\Models\DimensionModel;
use App\Models\PreguntaModel;
use App\Models\EvaluacionModel;
use App\Models\ProfesorModel;
use App\Models\PreguntasEvalModel;
use CodeIgniter\HTTP\DownloadResponse;

// use App\Libraries\fpdf186\FPDF;
// use App\ThirdParty\jpgraph\JpGraph;
// use App\ThirdParty\jpgraph\JpGraph\Graph;
// use App\ThirdParty\jpgraph\JpGraph\Plot;

// use TCPDF;

class EvaluacionController extends BaseController
{

    public function index()
    {
        return view('evaluacion/index');
    }


    public function index2()
    {
        return view('evaluacion/index2');
    }


    public function mostrarFormulario()
    {
        $asignaturaModel = new AsignaturaModel();
        $preguntaModel = new PreguntaModel();
        $profesorModel = new ProfesorModel();

        $data['asignaturas'] = $asignaturaModel->findAll();
        $data['preguntas'] = $preguntaModel->findAll();
        $data['profesores'] = $profesorModel->findAll();

        return view('evaluacion/formulario', $data);
    }


    public function mostrarFormularioE()
    {
        $asignaturaModel = new AsignaturaModel();
        $preguntaModel = new PreguntaModel();
        $profesorModel = new ProfesorModel();

        $data['asignaturas'] = $asignaturaModel->findAll();
        $data['preguntas'] = $preguntaModel->findAll();
        $data['profesores'] = $profesorModel->findAll();

        return view('evaluacion/formulario', $data);
    }


    public function enviarE()
    {
        $this->session = \Config\Services::session();

        $periodo = $this->request->getPost('periodo');
        $asignaturaId = $this->request->getPost('asignatura');
        $profesorId = $this->request->getPost('profesor');
        $respuestas = [];

        // Recoge las respuestas de las preguntas
        foreach ($this->request->getPost() as $key => $value) {
            if (strpos($key, 'pregunta') !== false) {
                $respuestas[$key] = $value;
            }
        }

        $comentario = $this->request->getPost('comentario');

        // Guardar en la base de datos
        $evaluacionModel = new EvaluacionModel();
        $evaluacionModel->save([
            'periodo' => $periodo,
            'evaluador' => $this->session->id,
            'asignatura_id' => $asignaturaId,
            'profesor_id' => $profesorId,
            'respuestas' => json_encode($respuestas),
            'comentario' => $comentario,
            'codigo_referencia' => uniqid()
        ]);

        // Redirigir o mostrar mensaje de éxito
        return redirect()->to('/estudiante/evaluacion/index2');
    }


    public function enviar()
    {

        $this->session = \Config\Services::session();

        $periodo = $this->request->getPost('periodo');
        $asignaturaId = $this->request->getPost('asignatura');
        $profesorId = $this->request->getPost('profesor');
        $respuestas = [];

        // Recoge las respuestas de las preguntas
        foreach ($this->request->getPost() as $key => $value) {
            if (strpos($key, 'pregunta') !== false) {
                $respuestas[$key] = $value;
            }
        }

        $comentario = $this->request->getPost('comentario');

        // Guardar en la base de datos
        $evaluacionModel = new EvaluacionModel();
        $evaluacionModel->save([
            'periodo' => $periodo,
            'evaluador' => $this->session->id,
            'asignatura_id' => $asignaturaId,
            'profesor_id' => $profesorId,
            'respuestas' => json_encode($respuestas),
            'comentario' => $comentario,
            'codigo_referencia' => uniqid()
        ]);

        // Redirigir o mostrar mensaje de éxito
        return redirect()->to('/admin/evaluacion2/');
    }


// public function resultados()
// {
// $resultados = new EvaluacionModel();

// $resultadosJSON = $resultados->find($resultados->getInsertID());

// $db      = \Config\Database::connect();
// $query = $db->query('SELECT respuestas FROM evaluacion;')->getResult();

    /*
    foreach ($query->getResult('User') as $user) {
    echo $user->name; // access attributes
    echo $user->reverseName(); // or methods defined on the 'User' class
    }
    */

    /*
    $resultadosDecodificados = [];
    foreach ($resultadosJSON as $resultadoJSON) {
        $resultadosDecodificados[] = json_decode($resultadoJSON['respuestas'], true);
    }
    */

// return view('evaluacion/resultados', ['resultados' => json_decode($resultadosJSON['respuestas'], true)]);
// dd(json_decode($query, true));
// }


    public function mostrarResumenPorDocente($docenteId)
    {
        $docenteModel = new DocenteModel();
        $evaluacionModel = new EvaluacionModel();

        $docente = $docenteModel->find($docenteId);

        if (!$docente) {
            // Manejar el caso si el docente no se encuentra
            // Puede ser una redirección o un mensaje de error
        }

        $evaluaciones = $evaluacionModel->obtenerEvaluacionesPorDocente($docenteId); // Implementa este método en el modelo

        $data['docente'] = $docente;
        $data['evaluaciones'] = $evaluaciones;

        return view('resumen_docente', $data);
    }


    public function resultados2()
    {
        $respuesta = new EvaluacionModel();
        $id = 1000;

        $datosJson = $respuesta->obtenerDatosJson($id);

        if ($datosJson) {
            $datosDecodificados = json_decode($datosJson['respuestas'], true);
            dd($datosDecodificados);
        } else {
            echo "Registro no encontrado";
        }
    }


    public function comentariosPorDocente()
    {


        $db = \Config\Database::connect();

        $date = '2023-11-01 00:00:00';

        $builder = $db->table('evaluacion');
        $builder->select('evaluacion.*, profesores.nombre');
        $builder->join('profesores', 'evaluacion.profesor_id = profesores.id');
        $builder->where('evaluacion.comentario !=', '');
        $builder->where('evaluacion.created_at >', $date);
        // $builder->groupBy('evaluacion.profesor_id');
        $builder->orderBy('evaluacion.profesor_id', 'ASC');
        $query = $builder->get()->getResult();

        // dd($query);

        $data = ['cpd' => $query];

        return view('evaluacion/cpd', $data);
    }


// función para buscar comentarios por docente
    public function bcpd()
    {
        $evaluacion = new EvaluacionModel();

        $searchTerm = $this->request->getGet('search'); // Obtener el término de búsqueda
        $data['searchTerm'] = $searchTerm;

        if ($searchTerm) {
            // Filtrar registros según el término de búsqueda
            $data['comentarios'] = $evaluacion->like('profesor_id', $searchTerm)
                ->orLike('comentario', $searchTerm)
                ->findAll();
        } else {
            // Sin filtro, obtener todos los registros
            $data['comentarios'] = $evaluacion->findAll();
        }

        return view('evaluacion/bcpd', $data);
    }


    public function resultados()
    {
        // Create an instance of the EvaluacionModel
        $evaluacionModel = new EvaluacionModel();

        // Retrieve all records from the 'evaluaciones' table
        $data['evaluaciones'] = $evaluacionModel->where('created_at >', '2023-11-01 00:00:00')->orderBy('profesor_id', 'asc')->findAll();

        // Load the view and pass data to it
        return view('evaluacion/resultados', $data);

    }


    public function listaProfesores()
    {
        // Create an instance of the ProfesorModel
        $profesorModel = new ProfesorModel();

        // Retrieve a list of professors
        $data['professors'] = $profesorModel->findAll();

        return view('evaluacion/listaProfesores', $data);
    }


    public function comentariosProfesor($profesorId)
    {
        // Create instances of the necessary models
        $profesorModel = new ProfesorModel();
        $evaluacionModel = new EvaluacionModel();

        // Retrieve the selected professor's information
        $profesor = $profesorModel->find($profesorId);

        if (!$profesor) {
            // Handle professor not found error
            // You can redirect or display an error message here
            return redirect()->to('/professor-list');
        }

        // Retrieve comments for the selected professor
        $comments = $evaluacionModel
            ->select('comentario')
            ->where('profesor_id', $profesorId)
            ->where('comentario !=', '')
            ->findAll();

        // Pass the professor's information and comments data to the view
        $data['profesor'] = $profesor;
        $data['comments'] = $comments;

        return view('evaluacion/comentariosProfesor', $data);
    }




    /*
        public function promedio()
        {
            // Create an instance of the EvaluacionModel
            $evaluacionModel = new EvaluacionModel();

            // Create an instance of the QuestionModel or your Question model
            $questionModel = new PreguntasEvalModel(); // Replace with your actual Question model class

            // Retrieve all evaluations
            $evaluations = $evaluacionModel->findAll();

            // Fetch question texts
            $questions = $questionModel->findAll();

            // Create an associative array to map question IDs to question texts
            $questionTexts = [];
            foreach ($questions as $question) {
                $questionTexts[$question['id']] = $question['pregunta'];
            }

            // Initialize an array to store average scores by question and professor
            $averageScores = [];

            foreach ($evaluations as $evaluation) {
                $respuestas = json_decode($evaluation['respuestas'], true);
                $profesorId = $evaluation['profesor_id'];

                // Calculate the average score for each question
                foreach ($respuestas as $questionId => $score) {
                    $questionText = $questionTexts[$questionId] ?? 'Question not found'; // Handle if question text is not found

                    if (!isset($averageScores[$profesorId][$questionId])) {
                        $averageScores[$profesorId][$questionId] = [
                            'questionText' => $questionText,
                            'totalScore' => 0,
                            'totalCount' => 0,
                        ];
                    }

                    $averageScores[$profesorId][$questionId]['totalScore'] += $score;
                    $averageScores[$profesorId][$questionId]['totalCount'] += 1;
                }
            }

            // Calculate the final average scores for each question by professor
            foreach ($averageScores as $profesorId => &$professorScores) {
                foreach ($professorScores as $questionId => &$scoreData) {
                    $scoreData['average'] = $scoreData['totalCount'] > 0
                        ? $scoreData['totalScore'] / $scoreData['totalCount']
                        : 0;
                }
            }

            // Pass the average scores by professor to the view
            $data['averageScores'] = $averageScores;

            return view('evaluacion/promedio', $data);
        }
    */


    /*
        public function promedio()
        {
            // Create an instance of the EvaluacionModel
            $evaluacionModel = new EvaluacionModel();
            $profesorModel = new ProfesorModel();

            // Retrieve all evaluations with question text and professor name
            $evaluations = $evaluacionModel
                ->select('evaluacion.*, preguntas.pregunta as question_text, profesores.nombre as professor_name')
                ->join('preguntas', 'preguntas.id = evaluacion.respuestas')
                ->join('profesores', 'profesores.id = evaluacion.profesor_id')
                ->findAll();

            // Initialize an array to store average scores by question and professor
            $averageScores = [];

            foreach ($evaluations as $evaluation) {
                $score = $evaluation['score'];
                $profesorId = $evaluation['profesor_id'];
                $questionText = $evaluation['question_text'];
                $professorName = $evaluation['professor_name'];

                if (!isset($averageScores[$profesorId])) {
                    $averageScores[$profesorId] = [
                        'professor_name' => $professorName,
                        'questions' => [],
                    ];
                }

                $averageScores[$profesorId]['questions'][] = [
                    'question_text' => $questionText,
                    'average_score' => $score,
                ];
            }

            // Pass the average scores by professor to the view
            $data['averageScores'] = $averageScores;

            return view('evaluacion/promedio', $data);
        }
    */


    public function promedio()
    {
        // Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();

        // Retrieve all evaluations
        $evaluations = $evaluacionModel->findAll();

        // Retrieve professor names and create a mapping of professor IDs to names
        $professors = $profesorModel->findAll();
        $professorNames = [];
        foreach ($professors as $profesor) {
            $professorNames[$profesor['id']] = $profesor['nombre'];
        }

        // Initialize an array to store average scores by question and professor
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);
            $profesorId = $evaluation['profesor_id'];

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (!isset($averageScores[$profesorId][$questionIndex])) {
                    $averageScores[$profesorId][$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$profesorId][$questionIndex]['totalScore'] += $score;
                $averageScores[$profesorId][$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average scores for each question by professor
        foreach ($averageScores as $profesorId => $questionScores) {
            foreach ($questionScores as $questionIndex => $scoreData) {
                $averageScores[$profesorId][$questionIndex]['average'] =
                    $scoreData['totalCount'] > 0
                        ? $scoreData['totalScore'] / $scoreData['totalCount']
                        : 0;
            }
        }

        // Pass the average scores by professor and professor names to the view
        $data['averageScores'] = $averageScores;
        $data['professorNames'] = $professorNames;

        return view('evaluacion/promedio', $data);
    }


    public function resultadosPorProfesor($profesorId)
    {
        // Create an instance of the EvaluacionModel
        $evaluacionModel = new EvaluacionModel();

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->where('created_at >', '2023-11-01')
            ->findAll();

        // Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Pass the average scores to the view
        $data['averageScores'] = $averageScores;

        return view('evaluacion/resultadosPorProfesor', $data);
    }


    /*
    public function resultadosPorProfesor($profesorId)
    {
        // Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();

        // Retrieve the professor's name
        $professorName = $profesorModel->find($profesorId)['nombre'];

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        // Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Pass the professor's name and average scores to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;

        return view('evaluacion/resultadosPorProfesor', $data);
    }
    */


    public function graficaPorProfesor($profesorId)
    {

        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();

        $professorName = $profesorModel->find($profesorId)['nombre'];

        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        $questionLabels = [];
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            foreach ($respuestas as $questionIndex => $score) {
                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        foreach ($averageScores as $questionIndex => $scoreData) {
            $questionLabels[] = ($questionIndex);
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Pass the professor's name, question labels, and average scores to the view
        $data['professorName'] = $professorName;
        $data['questionLabels'] = json_encode($questionLabels);
        $data['averageScores'] = json_encode(array_column($averageScores, 'average'));

        return view('evaluacion/graficaPorProfesor', $data);
    }


// Promedio por dimensiones
    public function promedioPorDimensiones($profesorId)
    {
        // Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();

        // Retrieve the professor's name
        $professorName = $profesorModel->find($profesorId)['nombre'];

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        // Specify the question indices for which you want to calculate averages
        $specifiedQuestionIndices = [10, 11, 12, 13, 14, 17, 19];

        // Initialize variables to store the specified question averages and count
        $specifiedQuestionAveragesTotal = 0;
        $specifiedQuestionCount = 0;

        // Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (in_array($questionIndex, $specifiedQuestionIndices)) {
                    $specifiedQuestionAveragesTotal += $score;
                    $specifiedQuestionCount++;
                }

                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the average of the specified question averages
        $averageOfSpecifiedQuestionAverages = $specifiedQuestionCount > 0
            ? $specifiedQuestionAveragesTotal / $specifiedQuestionCount
            : 0;

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Pass the professor's name, average scores, and the average of specified question averages to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;
        $data['averageOfSpecifiedQuestionAverages'] = $averageOfSpecifiedQuestionAverages;

        return view('evaluacion/promedioPorDimensiones', $data);
    }


    public function ppe($profesorId)
    {
        // Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();

        // Retrieve the professor's name
        $professorName = $profesorModel->find($profesorId)['nombre'];

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        // Specify the question indices for which you want to calculate averages
        $specifiedQuestionIndices = [10, 11, 12, 13, 14, 17, 19];

        // Initialize variables to store the specified question averages and count
        $specifiedQuestionTotal = 0;
        $specifiedQuestionCount = 0;

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (in_array($questionIndex, $specifiedQuestionIndices)) {
                    $specifiedQuestionTotal += $score;
                    $specifiedQuestionCount++;
                }

                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average of the specified questions' responses
        $averageOfSpecifiedQuestions = $specifiedQuestionCount > 0
            ? $specifiedQuestionTotal / $specifiedQuestionCount
            : 0;

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Pass the professor's name, average scores, and the average of specified questions' responses to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;
        $data['averageOfSpecifiedQuestions'] = $averageOfSpecifiedQuestions;

        return view('evaluacion/ppe', $data);
    }


    public function promedioPorD($profesorId)
    {
        // Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();

        // Retrieve the professor's name
        $professorName = $profesorModel->find($profesorId)['nombre'];

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        // Specify the question indices for which you want to calculate averages
        $specifiedQuestionIndices = [10, 11, 12];

        // Initialize variables to store the specified question averages and count
        $specifiedQuestionTotal = 0;
        $specifiedQuestionCount = 0;

        // Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (in_array($questionIndex, $specifiedQuestionIndices)) {
                    $specifiedQuestionTotal += $score;
                    $specifiedQuestionCount++;
                }

                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average of the specified questions' responses
        $averageOfSpecifiedQuestions = $specifiedQuestionCount > 0
            ? $specifiedQuestionTotal / $specifiedQuestionCount
            : 0;

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Pass the professor's name, average scores, and the average of specified questions' responses to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;
        $data['averageOfSpecifiedQuestions'] = $averageOfSpecifiedQuestions;

        return view('evaluacion/promedioPorD', $data);
    }


    public function average($profesorId)
    {
        // Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();
        $preguntaModel = new PreguntaModel();
        $dimensionModel = new DimensionModel();

        // Retrieve the professor's name
        $professorName = $profesorModel->find($profesorId)['nombre'];
        $preguntas = $preguntaModel->findAll();
        $dimensiones = $dimensionModel->findAll();

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        // Specify the question indices for which you want to calculate averages
        $specifiedQuestionIndices = [10, 11, 12, 13, 14, 17, 19];

        // Initialize variables to store the specified question averages and count
        $specifiedQuestionTotal = 0;
        $specifiedQuestionCount = 0;

        // Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (in_array($questionIndex, $specifiedQuestionIndices)) {
                    $specifiedQuestionTotal += $score;
                    $specifiedQuestionCount++;
                }

                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average of the specified questions' responses
        $averageOfSpecifiedQuestions = $specifiedQuestionCount > 0
            ? $specifiedQuestionTotal / $specifiedQuestionCount
            : 0;

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Calculate the average of the average scores
        $averageOfAverageScores = count($averageScores) > 0
            ? array_sum(array_column($averageScores, 'average')) / count($averageScores)
            : 0;

        // Pass the professor's name, average scores, and averages to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;
        $data['averageOfSpecifiedQuestions'] = $averageOfSpecifiedQuestions;
        $data['averageOfAverageScores'] = $averageOfAverageScores;
        $data['preguntas'] = $preguntas;
        $data['dimensiones'] = $dimensiones;

        return view('evaluacion/average', $data);
    }


    public function asp($profesorId)
    {
        // Create instances of the EvaluacionModel, ProfesorModel, and QuestionModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();
        $questionModel = new PreguntaModel();

        // Retrieve the professor's name
        $professorName = $profesorModel->find($profesorId)['nombre'];

        // Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $profesorId)
            ->findAll();

        // Retrieve question texts
        $questions = $questionModel->findAll();

        // Map question texts by question ID
        $questionTexts = [];
        foreach ($questions as $question) {
            $questionTexts[$question['id']] = $question['pregunta'];
        }

        // Specify the question indices for which you want to calculate averages
        $specifiedQuestionIndices = [1, 10, 11, 12, 13, 14, 17, 19];

        // Initialize variables to store the specified question averages and count
        $specifiedQuestionTotal = 0;
        $specifiedQuestionCount = 0;

        // Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionId => $score) {
                $questionIndex = array_search($questionId, array_keys($questionTexts));
                $questionText = $questionTexts[$questionId];

                if (in_array($questionIndex, $specifiedQuestionIndices)) {
                    $specifiedQuestionTotal += $score;
                    $specifiedQuestionCount++;
                }

                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                        'questionText' => $questionText,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

        // Calculate the final average of the specified questions' responses
        $averageOfSpecifiedQuestions = $specifiedQuestionCount > 0
            ? $specifiedQuestionTotal / $specifiedQuestionCount
            : 0;

        // Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

        // Calculate the average of the average scores
        $averageOfAverageScores = count($averageScores) > 0
            ? array_sum(array_column($averageScores, 'average')) / count($averageScores)
            : 0;

        // Pass the professor's name, average scores, and averages to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;
        $data['averageOfSpecifiedQuestions'] = $averageOfSpecifiedQuestions;
        $data['averageOfAverageScores'] = $averageOfAverageScores;

        return view('evaluacion/asp', $data);
    }


    public function rev($userId = null)
    {
        $asignaturaModel = new AsignaturaModel();
        $profesorModel = new ProfesorModel();
        $evaluacionModel = new EvaluacionModel();

        // Retrieve subjects and professors
        $subjects = $asignaturaModel->findAll();
        $professors = $profesorModel->findAll();

        // Retrieve unique evaluation codes for all students or a specific student
        $evaluationCodesQuery = $evaluacionModel
            ->distinct()
            ->select('codigo_referencia')
            ->where('evaluador', $userId);

        $evaluationCodes = $evaluationCodesQuery->findAll();

        // Pass the filter options to the view
        $data = [
            'subjects' => $subjects,
            'professors' => $professors,
            'evaluationCodes' => $evaluationCodes,
            'selectedUserId' => $userId, // Pass the selected user ID for filtering
        ];

        return view('evaluacion/rev', $data);
    }


    public function gracias()
    {
        $this->session = \Config\Services::session();
        $evaluacionModel = new EvaluacionModel();

        // Realiza una consulta SQL que une las tablas evaluacion y asignatura
        $sql = "SELECT asignaturas.nombre AS subjectName, evaluacion.codigo_referencia AS evaluationCode
                FROM evaluacion
                JOIN asignaturas ON evaluacion.asignatura_id = asignaturas.id
                WHERE evaluacion.evaluador = " . $this->session->id; // Reemplaza con el ID de usuario adecuado

        // Ejecuta la consulta
        $query = $evaluacionModel->query($sql, [1]); // Reemplaza 1 con el ID de usuario adecuado

        // Obtiene los resultados de la consulta
        $evaluatedSubjectsAndReferenceCodes = $query->getResult();

        // Carga la vista y pasa los datos a la vista
        return view('evaluacion/gracias', [
            'evaluatedSubjectsAndReferenceCodes' => $evaluatedSubjectsAndReferenceCodes,
        ]);
    }


    public function gracias2($userId)
    {
        $userId = $this->session = \Config\Services::session();
        $asignaturaModel = new AsignaturaModel();
        $evaluacionModel = new EvaluacionModel();

        // Retrieve evaluated subjects and their reference codes for the given user
        $evaluations = $evaluacionModel
            ->distinct()
            ->select('asignatura_id, codigo_referencia')
            ->where($this->session->id, $userId)
            ->findAll();

        // Create an array to store subject names and reference codes
        $evaluatedSubjects = [];

        // Retrieve the subject names for the evaluated subjects
        foreach ($evaluations as $evaluation) {
            $subjectId = $evaluation['asignatura_id'];
            $subjectName = $asignaturaModel->find($subjectId)['nombre'];
            $referenceCode = $evaluation['codigo_referencia'];

            $evaluatedSubjects[] = [
                'subject' => $subjectName,
                'referenceCode' => $referenceCode,
            ];
        }

        // Pass data to the view
        $data = [
            'evaluatedSubjects' => $evaluatedSubjects,
        ];

        return view('evaluacion/agradecimiento', $data);
    }












// Generación de reporte en PDF


    /* REPORTE CON FPDF */

    public function downloadTeacherReport($teacherId)
    {
        $db = \Config\Database::connect();
        require_once APPPATH . 'ThirdParty/TCPDF/tcpdf.php';

        $pdf = new \TCPDF('P', 'mm', 'LETTER');
        $fecha_actual = date('d-m-Y');

        $evaluacionModel = new EvaluacionModel();


// Create an instance of the EvaluacionModel and ProfesorModel
        $evaluacionModel = new EvaluacionModel();
        $profesorModel = new ProfesorModel();
        $preguntaModel = new PreguntaModel();
        $dimensionModel = new DimensionModel();

// Retrieve the professor's name
        $professorName = $profesorModel->find($teacherId)['nombre'];
        $preguntas = $preguntaModel->findAll();
        $dimensiones = $dimensionModel->findAll();

// Retrieve evaluations for the specific professor
        $evaluations = $evaluacionModel
            ->where('profesor_id', $teacherId)
            ->findAll();

// Specify the question indices for which you want to calculate averages
        $specifiedQuestionIndices = [10, 11, 12, 13, 14, 17, 19];

// Initialize variables to store the specified question averages and count
        $specifiedQuestionTotal = 0;
        $specifiedQuestionCount = 0;

// Initialize an array to store average scores by question
        $averageScores = [];

        foreach ($evaluations as $evaluation) {
            $respuestas = json_decode($evaluation['respuestas'], true);

            // Calculate the average score for each question
            foreach ($respuestas as $questionIndex => $score) {
                if (in_array($questionIndex, $specifiedQuestionIndices)) {
                    $specifiedQuestionTotal += $score;
                    $specifiedQuestionCount++;
                }

                if (!isset($averageScores[$questionIndex])) {
                    $averageScores[$questionIndex] = [
                        'totalScore' => 0,
                        'totalCount' => 0,
                    ];
                }

                $averageScores[$questionIndex]['totalScore'] += $score;
                $averageScores[$questionIndex]['totalCount'] += 1;
            }
        }

// Calculate the final average of the specified questions' responses
        $averageOfSpecifiedQuestions = $specifiedQuestionCount > 0
            ? $specifiedQuestionTotal / $specifiedQuestionCount
            : 0;

// Calculate the final average scores for each question
        foreach ($averageScores as $questionIndex => $scoreData) {
            $averageScores[$questionIndex]['average'] =
                $scoreData['totalCount'] > 0
                    ? $scoreData['totalScore'] / $scoreData['totalCount']
                    : 0;
        }

// Calculate the average of the average scores
        $averageOfAverageScores = count($averageScores) > 0
            ? array_sum(array_column($averageScores, 'average')) / count($averageScores)
            : 0;

// Pass the professor's name, average scores, and averages to the view
        $data['professorName'] = $professorName;
        $data['averageScores'] = $averageScores;
        $data['averageOfSpecifiedQuestions'] = $averageOfSpecifiedQuestions;
        $data['averageOfAverageScores'] = $averageOfAverageScores;


        $evaluaciones = $evaluacionModel->where('profesor_id', $teacherId)->findAll();

        if (empty($evaluaciones)) {
            die('No hay evaluaciones disponibles para este profesor.');
        }

        $allResponses = [];

        foreach ($evaluaciones as $evaluacion) {
            $responses = json_decode($evaluacion['respuestas'], true);

            if (!empty($responses)) {
                $allResponses = array_merge($allResponses, $responses);
            }
        }

        $totalResponses = count($allResponses);
        $totalScore = array_sum($allResponses);
        $average = $totalResponses > 0 ? $totalScore / $totalResponses : 0;


        $evaluacionModel = new EvaluacionModel();
        $profesorId = $teacherId; // Replace with the actual teacher's ID
        $comments = $evaluacionModel->select('comentario')->where('profesor_id', $profesorId)->where('comentario !=', '')->findAll();

        $evaluaciones = $db->table('evaluacion')->where('profesor_id', $teacherId)->get()->getResultArray();


        foreach ($averageScores as $questionIndex => $scoreData) {
            $promedio[] = number_format($scoreData['average'], 2);
            // $promedio[] = $scoreData['average'];
        }


// DIMENSIÓN: Dominio de la temática
// $dimension1 = 43, 44 y 45
        $dimension1 = [
            $promedio[42],
            $promedio[43],
            $promedio[44]
        ];
        $promedioDimension1 = array_sum($dimension1) / count($dimension1);
        // $promedioDimension1 = ($promedio[42] + $promedio[43] + $promedio[44]) / 3;
// echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);


// DIMENSIÓN: Actitud de atención hacia el estudiante
// $dimension2 = 15, 16, 41
        $dimension2 = [
            $promedio[14],
            $promedio[15],
            $promedio[40]
        ];
        $promedioDimension2 = array_sum($dimension2) / count($dimension2);
// echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);


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


// DIMENSIÓN: Formación integral
// preguntas: 18, 18, 21
        $dimension4 = [
            $promedio[17],
            $promedio[19],
            $promedio[20]
        ];
        $promedioDimension4 = array_sum($dimension4) / count($dimension4);
//echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);


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


// DIMENSIÓN: Acreditación del aprendizaje
// $dimension7 = 38, 39, 40
        $dimension7 = [
            $promedio[37],
            $promedio[38],
            $promedio[39]
        ];
        $promedioDimension7 = array_sum($dimension7) / count($dimension7);
// echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);


// DIMENSIÓN: Asistencia y puntualidad
// $dimension8 = 41 y 45
        $dimension8 = [
            $promedio[41],
            $promedio[45]
        ];
        $promedioDimension8 = array_sum($dimension8) / count($dimension8);
// echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);


// DIMENSIÓN: Comentarios
// $dimension9 = $pregunta[37] + $promedio[38] + $promedio[39];
        $dimension9 = [
            // $promedio[50] = 'Revisar comentarios de la evaluación docente'
        ];
// $promedioDimension9 = array_sum($dimension9) / count($dimension9);
        $promedioDimension9 = 0.001;
// echo 'Acreditación del aprendizaje: ' . number_format($promedioDimension1, 2);


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

        foreach ($dimensiones as $d) {
            $nombreDimensiones[] = $d['nombre'];
        }


        $promDimensiones = ($promedioDimension1 + $promedioDimension2 + $promedioDimension3 + $promedioDimension4 + $promedioDimension5 + $promedioDimension6 + $promedioDimension7 + $promedioDimension8) / 8;


        $numDimension = [
            'DIM01',
            'DIM02',
            'DIM03',
            'DIM04',
            'DIM05',
            'DIM06',
            'DIM07',
            'DIM08'
        ];

        // $promDimensiones = array_sum($promedioDimensiones) / count($promedioDimensiones);

        if ($promDimensiones < 3) {
            $nd = 'INSUFICIENTE';
        } else if ($promDimensiones < 3.5) {
            $nd = 'SUFICIENTE';
        } else if ($promDimensiones < 4) {
            $nd = 'REGULAR';
        } else if ($promDimensiones < 4.5) {
            $nd = 'BUENO';
        } else if ($promDimensiones <= 5) {
            $nd = 'EXCELENTE';
        } else {
            $nd = 'Favor de revisar el resultado numérico del promedio';
        }


        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // INICIA ESTRUCTURA DEL REPORTE ////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $pdf->SetCreator('Edgar DeganteA');
        $pdf->SetAuthor('Edgar DeganteA');
        $pdf->SetTitle('Reporte de Evaluación Docente UPN212');
        $pdf->SetSubject('Reporte de Evaluación Docente');
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
        date_default_timezone_set('America/Mexico_City');


        $pdf->AddPage();


        $pdf->Image('assets/img/logo/upnlogotezpdf.jpg', 20, 15, 22, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // $pdf->Image('assets/img/logo/upnlogotezpdf.jpg', 20, 10, 22, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $pdf->SetFont('helvetica', '', 6);
        // $pdf->Cell(20, 10, $fecha_actual, 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $pdf->Cell(20, 10, 'UPN 212 TEZIUTLÁN', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $pdf->Cell(0, 9, 'CONSTANCIA DE EVALUACIÓN DOCENTE', 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $pdf->Ln(8);


        $pdf->SetFont('helvetica', '', 10);

        $profesorModel = new ProfesorModel();


        $teacher = $profesorModel->find($teacherId);
        $pdf->Cell(0, 0, 'UNIVERSIDAD PEDAGÓGICA NACIONAL', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'UNIDAD 212 TEZIUTLÁN', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'Zaragoza 19, Barrio de Maxtaco, 73800 Teziutlán, Pue.', 0, 1, 'C');
        $pdf->Ln(3);


        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, $teacher['nombre'], 1, 1, 'C');
        $pdf->Ln(3);

        $fechaActual = strftime('%d de %B de %Y', time());

        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(0, 3, 'ASUNTO: Constancia de Evaluación Docente', 0, 1, 'R');
        $pdf->Ln(3);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 3, 'Teziutlán, Puebla; a ' . $fechaActual, 0, 1, 'R');
        $pdf->Ln(3);


        $pdf->Ln(0);


        $pdf->setFont('helvetica', '', '10');
        // Crear una tabla simple
        $columnas = ['Promedio de evaluación Docente: ' . number_format($promDimensiones, 2), ''];
        $datos = [
            ['Nivel de Desempeño: ' . $nd, ''],
            ['Periodo de evaluación: 2023-1', '']
        ];


        foreach ($columnas as $columna) {
            $pdf->MultiCell(100, 0, $columna, 0, 'L', 0, 0);
        }

        foreach ($datos as $fila) {
            $pdf->Ln();
            foreach ($fila as $celda) {
                $pdf->MultiCell(100, 0, $celda, 0, 'L', 0, 0);
            }
        }


        $pdf->Ln(10);


        // Crear la tabla con los datos obtenidos de la base de datos

        $html = '<table border="1" width="100%">
                    <tr scope="row" style="text-align:center; vertical-align: middle; background-color: #dddddd;">
                        <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="10%">ID</th>
                        <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="60%">DIMENSIÓN</th>
                        <th style="vertical-align: middle; text-align:center; font-weight: bold" height="25" width="13%">RESULTADO</th>
                        <th style="vertical-align: middle; text-align: center; font-weight: bold" height="25" width="*">NIVEL</th>
                    </tr>';


        // set color for background


        // $html .= '<table border="1">';

        if (count($nombreDimensiones) === count($promedioDimensiones)) {
            $longitud = count($nombreDimensiones);

            for ($i = 0; $i < $longitud - 1; $i++) {
                $valor1 = $nombreDimensiones[$i];
                $valor2 = $promedioDimensiones[$i];
                $valor3 = $numDimension[$i];


                if ($promedioDimensiones[$i] < 3) {
                    $nivel = 'INSUFICIENTE';
                } else if ($promedioDimensiones[$i] < 3.5) {
                    $nivel = 'SUFICIENTE';
                } else if ($promedioDimensiones[$i] < 4) {
                    $nivel = 'REGULAR';
                } else if ($promedioDimensiones[$i] < 4.5) {
                    $nivel = 'BUENO';
                } else if ($promedioDimensiones[$i] <= 5) {
                    $nivel = 'EXCELENTE';
                } else {
                    $nivel = 'Favor de revisar el resultado numérico del promedio';
                }

                $html .= '<tr><td align="center" height="15" width="10%">' . ' ' . $valor3 . '</td>';
                $html .= '<td height="15" width="60%">' . ' ' . $valor1 . '</td>';
                $html .= '<td align="center" height="14" width="13%">' . ' ' . number_format($valor2, 2) . '</td>';
                $html .= '<td height="15" width="*" align="center">' . ' ' . $nivel . '</td></tr>';
            }
        } else {
            echo "Los arrays no tienen la misma longitud.";
        }

        $html .= '</table>';

        $pdf->writeHTML($html, true, false, true, false, 'M');

        $pdf->Ln(0);


        /////////////////////////////////////////////////////////////////////////
        ///////////////////////////////// GRÁFICA ///////////////////////////////
        /////////////////////////////////////////////////////////////////////////

        $data = [
            $promedioDimension1,
            $promedioDimension2,
            $promedioDimension3,
            $promedioDimension4,
            $promedioDimension5,
            $promedioDimension6,
            $promedioDimension7,
            $promedioDimension8,
        ];


        // $pdf->Rect(20, 40, 20, 60, 'DF', '', array(0,0,0)); // Dibuja los ejes de la gráfica

        $maxValue = max($data);
        $minValue = 0;
        $barWidth = 10;
        $scaleFactor = 5;

        $x = 50;
        $y = 180;


        // $pdf->Line($x - 10, $y, $x - 10, $y - ($maxValue - $minValue) * $scaleFactor + 10);


        foreach ($data as $value) {
            $barHeight = ($value - $minValue) * $scaleFactor;
            $pdf->Text($x + $barWidth / 2 - 5, $y - $barHeight - 5, number_format($value, 2));
            $pdf->Rect($x, $y - $barHeight, $barWidth, $barHeight, 'DF', '', array(192, 192, 192));
            $x += $barWidth + 5;
        }

        $pdf->Ln(0);
        $x2 = 49;
        $y2 = 210;
        foreach ($numDimension as $dim) {
            $pdf->Text($x2 + $barWidth / 2 - 5, $y2 - $barHeight - 5, $dim);
            $x2 += $barWidth + 5;
        }


        // $pdf->Image('barchart', $x, $y, 100, 50);


        $pdf->Ln(10);
        $pdf->SetFont('helvetica', '', 8);
        // $pdf->Cell(10, 10, 'Gráfica de Desempeño Docente por Dimensiones', 0, 0, 'C', 0, '', 0, false, 'C', 'M');
        $pdf->Cell(0, 2, 'Gráfica de Desempeño Docente por Dimensiones', 0, 1, 'C');


        $pdf->Ln(30);


        // Crear una tabla simple
        $pdf->setFont('helvetica', 'B', 8);
        $columnas = ["LIC. YUNERI CALIXTO PÉREZ", "MSC. EDGAR DEGANTE AGUILAR", $teacher['nombre']];
        $pdf->setFont('helvetica', '', 8);
        $datos = [
            ["Encargada del Despacho de la Dirección
de la Universidad Pedagógica Nacional
Unidad 212 Teziutlán", "Responsable de Evaluación\nCED. PROF.: 12513903 \n Folio RENAP: 12630720 - EC0772", "Docente"],
        ];

        foreach ($columnas as $columna) {
            $pdf->setFont('helvetica', 'B', 8);
            $pdf->MultiCell(63, 0, $columna, 0, 'C', 0, 0);
        }

        foreach ($datos as $fila) {
            $pdf->Ln();
            foreach ($fila as $celda) {
                $pdf->setFont('helvetica', '', 7);
                $pdf->MultiCell(63, 0, $celda, 0, 'C', 0, 0);
            }
        }


        // Agregar un texto para la firma
        $pdf->SetFont('helvetica', '', 6);
        $pdf->Text(15, 254, 'Original: ' . $teacher['nombre']);
        $pdf->Text(15, 256, 'Copia: Archivo');


        $pdf->addPage();
        $pdf->SetFont('helvetica', '', 8);

        $html2 = '<h2>Comentarios de los estudiantes con respecto al desempeño del(la) profesor(a):</h2>';
        $pdf->writeHTML($html2, false, false, false, false, '');
        $pdf->Ln(3);

        foreach ($comments as $comment) {
            $pdf->MultiCell(0, 0, '- ' . $comment['comentario'], 0, 'L');
            $pdf->Ln(0);
        }


        // Configura los encabezados HTTP para mostrar el PDF en el navegador
        header('Content-Type: application/pdf');
        // header('Content-Disposition: download'); // Cambia el nombre del archivo si es necesario

        // Genera el PDF y envíalo al navegador
        // $pdf->Output();
        $pdf->Output('UPN212TEZ-RED-' . $teacher['nombre'] . '-' . $fecha_actual . '.pdf', 'D');
        // $pdf->Output();
    }


    public function otropdf()
    {
        $db = \Config\Database::connect();
        require_once APPPATH . 'ThirdParty/TCPDF/tcpdf.php';

        // Crear una instancia de TCPDF
        $pdf = new \TCPDF('P', 'mm', 'LETTER');
        // Configurar el encabezado y pie de página
        $pdf->SetHeaderData('', 0, 'Documento PDF generado con TCPDF', '');

        // Establecer el título del documento
        $pdf->SetTitle('Mi Documento PDF');

        // Establecer el autor del documento
        $pdf->SetAuthor('Mi Nombre');

        // Establecer el margen izquierdo
        $pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

        // Agregar una página
        $pdf->AddPage();

        // Generar el contenido del PDF aquí
        $pdf->SetFont('times', 'N', 12);
        $pdf->Cell(0, 10, 'Contenido del documento PDF', 0, 1);

        // ...

        // Salida del PDF (descargar o mostrar en el navegador)
        if ($_GET['action'] == 'download') {
            // Descargar el PDF
            $pdf->Output('mi_documento.pdf', 'D');
        } else {
            // Mostrar el PDF en el navegador
            $pdf->Output('mi_documento.pdf', 'I');
        }

    }


    public function tde()
    {
        require_once APPPATH . 'ThirdParty/TCPDF/tcpdf.php';
        $pdf = new \TCPDF();


        $pdf->SetAutoPageBreak(true, 30);
        $pdf->AddPage();

        $pdf->Image('assets/img/logo/upnlogotezpdf.jpg', 20, 15, 22, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $pdf->SetFont('helvetica', '', 10);
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'UNIVERSIDAD PEDAGÓGICA NACIONAL', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'UNIDAD 212 TEZIUTLÁN', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'Zaragoza 19, Barrio de Maxtaco, 73800 Teziutlán, Pue.', 0, 1, 'C');
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'SISTEMA DE EVALUACIÓN DOCENTE', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'Periodo evaluado: 2023-1', 0, 1, 'C');
        $pdf->Ln(10);


        // Configura el título y los márgenes
        $pdf->SetTitle('Lista de docentes evaluados');
        $pdf->SetMargins(20, 20, 20);

        // Consulta para obtener la lista de profesores evaluados
        $db = \Config\Database::connect();
        $builder = $db->table('evaluacion');
        $builder->select('DISTINCT(profesores.nombre)');
        $builder->join('profesores', 'profesores.id = evaluacion.profesor_id');
        $builder->orderBy('profesores.nombre', 'ASC');
        $query = $builder->get();
        $profesoresEvaluados = $query->getResult();

        $pdf->setFont('helvetica', '', 8);
        // Crea la tabla
        $html = '<h1 align="center">Lista de profesores evaluados</h1>';
        $html .= '<style>table.print-friendly tr td, table.print-friendly tr th {
        page-break-inside: avoid;
    }</style>';
        $html .= '<table border="1">';
        $html .= '<thead>';
        $html .= '<tr nobr="true">';
        $html .= '<th height="25px" align="center" width="70%">Docente</th>';
        $html .= '<th height="25px" align="center" width="*">Firma</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($profesoresEvaluados as $profesor) {
            $html .= '<tr nobr="true">';
            $html .= '<td valign="middle" height="30px" width="70%">  ' . $profesor->nombre . '</td>';
            $html .= '<td height="30px" width="*"></td>'; // Columna para la firma
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';

        // Agrega el contenido al PDF
        $pdf->writeHTML($html, 20, false, true, false, '');

        $pdf->addPage();
        $pdf->Ln(30);

        // Crear una tabla simple
        $pdf->setFont('helvetica', 'B', 8);
        $columnas = ["LIC. YUNERI CALIXTO PÉREZ", "MSC. EDGAR DEGANTE AGUILAR"];
        $pdf->setFont('helvetica', '', 8);
        $datos = [
            ["Encargada del Despacho de la Dirección
de la Universidad Pedagógica Nacional
Unidad 212 Teziutlán", "Responsable de Evaluación\nCED. PROF.: 12513903 \n Folio RENAP: 12630720 - EC0772"],
        ];

        foreach ($columnas as $columna) {
            $pdf->setFont('helvetica', 'B', 8);
            $pdf->MultiCell(90, 0, $columna, 0, 'C', 0, 0);
        }

        foreach ($datos as $fila) {
            $pdf->Ln();
            foreach ($fila as $celda) {
                $pdf->setFont('helvetica', '', 7);
                $pdf->MultiCell(90, 0, $celda, 0, 'C', 0, 0);
            }
        }

        // Genera y muestra el PDF
        $pdf->Output('Lista de docentes evaluados.pdf', 'D');


        /*
        require_once APPPATH . 'ThirdParty/TCPDF/tcpdf.php';


        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Edgar Degante Aguilar');
        $pdf->SetTitle('Lista de Docentes Evaluados');
        $pdf->SetSubject('Evaluación Docente');

        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 048', PDF_HEADER_STRING);

        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->SetFont('helvetica', 'B', 20);

        $pdf->AddPage();

        $pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 8);

        $tbl = <<<EOD
        <table border="1" cellpadding="2" cellspacing="2" align="center">
         <tr nobr="true">
          <th colspan="3">NON-BREAKING ROWS</th>
         </tr>
         <tr nobr="true">
          <td>ROW 1<br />COLUMN 1</td>
          <td>ROW 1<br />COLUMN 2</td>
          <td>ROW 1<br />COLUMN 3</td>
         </tr>
         <tr nobr="true">
          <td>ROW 2<br />COLUMN 1</td>
          <td>ROW 2<br />COLUMN 2</td>
          <td>ROW 2<br />COLUMN 3</td>
         </tr>
         <tr nobr="true">
          <td>ROW 3<br />COLUMN 1</td>
          <td>ROW 3<br />COLUMN 2</td>
          <td>ROW 3<br />COLUMN 3</td>
         </tr>
        </table>
        EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $pdf->Output('example_048.pdf', 'D');
        */

    }

}