<?php

namespace App\Controllers\Estudiante;

use App\Controllers\BaseController;

class EvaluacionController extends BaseController
{
    public function index()
    {
        //
    }


    public function generarConstancia()
    {
        $this->session = \Config\Services::session();
        $evaluacionModel = new EvaluacionModel();

        // Realiza una consulta SQL que une las tablas evaluacion y asignatura
        $sql = "SELECT asignaturas.nombre AS subjectName, evaluacion.codigo_referencia AS evaluationCode FROM evaluacion
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




    ////////////////////////////////////////////
    // GENERAR CONSTANCIA DE EVALUACIÓN DOCENTE
    ////////////////////////////////////////////
    public function generarConstanciaED()
    {
        $db = \Config\Database::connect();
        $session = session();
        $sql = "SELECT asignaturas.nombre AS subjectName, evaluacion.codigo_referencia AS evaluationCode FROM evaluacion JOIN asignaturas ON evaluacion.asignatura_id = asignaturas.id WHERE evaluacion.evaluador = " . $session->id;

        $query = $db->query($sql);

        require_once APPPATH . 'ThirdParty/TCPDF/tcpdf.php';
        $pdf = new \TCPDF();

        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 12);

        $html = '<table border="1">
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Código Fuente</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($query->getResultArray() as $row) {
            $html .= '<tr>
                        <td>' . $row['subjectName'] . '</td>
                        <td>' . $row['evaluationCode'] . '</td>
                    </tr>';
        }

        $html .= '</tbody></table>';

        // Escribir la tabla en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->Output('constancia_evaluacion.pdf', 'I');
        exit();
    }


}
