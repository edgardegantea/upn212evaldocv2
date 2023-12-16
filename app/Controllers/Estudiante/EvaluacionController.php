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
                WHERE evaluacion.evaluador = " . $this->session->id . " AND evaluacion.created_at BETWEEN '2023-11-01' AND '2024-02-01"; // Reemplaza con el ID de usuario adecuado

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
        $sql = "SELECT asignaturas.nombre AS subjectName, evaluacion.codigo_referencia AS evaluationCode FROM evaluacion JOIN asignaturas ON evaluacion.asignatura_id = asignaturas.id WHERE evaluacion.evaluador = " . $session->id . " AND evaluacion.created_at BETWEEN '2023/11/01' AND '2024/02/01'";

        $query = $db->query($sql);



        $fechaActual = strftime('%d de %B de %Y', time());

        require_once APPPATH . 'ThirdParty/TCPDF/tcpdf.php';
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


        $pdf->SetCreator('Edgar DeganteA');
        $pdf->SetAuthor('Edgar DeganteA');
        $pdf->SetTitle('Reporte de Evaluación Docente UPN212');
        $pdf->SetSubject('Reporte de Evaluación Docente');
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
        date_default_timezone_set('America/Mexico_City');

        $pdf->AddPage();


        $pdf->Image('assets/img/logo/upnlogotezpdf.jpg', 20, 15, 22, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // $pdf->Image('assets/img/logo/upnlogotezpdf.jpg', 20, 10, 22, 22, '', '', 'T', false, 300, '', false, false, 0, false, false, false);





        $pdf->SetFont('helvetica', '', 10);


        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'UNIVERSIDAD PEDAGÓGICA NACIONAL', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'UNIDAD 212 TEZIUTLÁN', 0, 1, 'C');
        $pdf->Ln(0);
        $pdf->Cell(0, 0, 'Zaragoza 19, Barrio de Maxtaco, 73800 Teziutlán, Pue.', 0, 1, 'C');
        $pdf->Ln(20);


        $pdf->SetFont('helvetica', '', 8);
        $pdf->Cell(0, 3, 'FECHA DE EMISIÓN: ' . $fechaActual, 0, 1, 'R');
        $pdf->Ln(20);


        $pdf->SetFont('helvetica', 'B', 14);


        $pdf->Cell(0, 0, 'SISTEMA DE EVALUACIÓN DOCENTE', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 0, 'Periodo evaluado: 2023-2 (Del 17 de agosto de 2023 al 24 de noviembre de 2023) ', 0, 1, 'C');
        $pdf->Ln(10);

        $estudiante = strtoupper($session->get('nombre') . ' ' . $session->get('apaterno') . ' ' . $session->get('amaterno'));
        $pdf->Cell(0, 0, 'ESTUDIANTE: ' . $estudiante, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 0, 'Lista de Asignaturas Evaluadas', 0, 1, 'C');
        $pdf->Ln(5);


        $html = '<table border="1">
                    <thead>
                        <tr>
                            <th style="height: 20px">ASIGNATURA</th>
                            <th style="height: 20px">CÓDIGO ÚNICO DE REFERENCIA</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($query->getResultArray() as $row) {
            $html .= '<tr>
                        <td style="height: 20px">' . $row['subjectName'] . '</td>
                        <td style="height: 20px">' . $row['evaluationCode'] . '</td>
                    </tr>';
        }

        $html .= '</tbody></table>';


        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->Output('constancia_evaluacion_'.$session->get('nombre') . ' ' . $session->get('apaterno') . ' ' . $session->get('amaterno').'.pdf', 'I');
        exit();
    }


}
