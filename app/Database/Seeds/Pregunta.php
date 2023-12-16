<?php

namespace App\Database\Seeds;

use App\Models\PreguntaModel;
use CodeIgniter\Database\Seeder;

class Pregunta extends Seeder
{
    public function run()
    {
        $preguntas = new PreguntaModel();

        $preguntas->insertBatch([
            [
                'pregunta'  => '1.	¿Presentó y entrego al grupo el encuadre de actividades a desarrollar durante el semestre o módulo?',
                'dimension' => 5,
            ],
            [
                'pregunta'  => 'a) Los objetivos por unidad, módulo o bloque de aprendizaje',
                'dimension' => 5,
            ],
            [
                'pregunta'  => 'b) Los temas o contenidos',
                'dimension' => 5,
            ],
            [
                'pregunta'  => 'c) Las técnicas y/o estrategias de aprendizaje',
                'dimension' => 5,
            ],
            [
                'pregunta'  => 'd) Las formas de evaluación del aprendizaje ',
                'dimension' => 5,
            ],
            [
                'pregunta'  => 'e) los criterios de acreditación',
                'dimension' => 5,
            ],
            [
                'pregunta'  => 'f) La bibliografía o fuentes de información',
                'dimension' => 5,
            ],
            [
                'pregunta'  => '3.	¿Estableció acuerdos grupales a partir del encuadre?',
                'dimension' => 5,
            ],
            [
                'pregunta'  => '4.	¿Respetó la planeación, formas y criterios de trabajo planteados al inicio del semestre o módulo’?',
                'dimension' => 5,
            ],
            [
                'pregunta'  => '5.	¿Proporcionó la bibliografía o antología oportunamente para el desarrollo del curso?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '6.	¿Promovió la indagación, reflexión, y la participación en el abordaje de los contenidos?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '7.	¿Relacionó la teoría con problemas, experiencias o desafíos del contexto?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '8.	¿Empleó materiales didácticos pertinentes, incluidos las tecnologías de la información y comunicación para el desarrollo de las sesiones?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '9.	¿Realizó aclaraciones oportunas en torno a las dudas surgidas, en el abordaje de los contenidos?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '10.	¿Propició la curiosidad y el deseo de aprender de los estudiantes?',
                'dimension' => 2,
            ],
            [
                'pregunta'  => '11.	¿Escuchó y tomó en cuenta las ideas y opiniones de los estudiantes respecto al tratamiento del contenido de aprendizaje?',
                'dimension' => 2,
            ],
            [
                'pregunta'  => '12.	¿Desarrollo los contenidos planteados en el encuadre?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '13.	¿Promovió el desarrollo socioemocional, el pensamiento crítico, la lectura y escritura, la igualdad de género y una cultura de paz?',
                'dimension' => 4,
            ],
            [
                'pregunta'  => '14.	¿Mostró disposición para establecer un diálogo profesional, al compartir conocimientos y experien¬cias cotidianas, así como hallazgos de la literatura e investigación educativa que aportan al trabajo pedagógico?',
                'dimension' => 3,
            ],
            [
                'pregunta'  => '15.	¿Promovió el respeto, la solidaridad, la empatía y el apoyo en el aula?',
                'dimension' => 4,
            ],
            [
                'pregunta'  => '16.	¿Propició la participación de los estudiantes en eventos académicos como parte de su formación profesional?',
                'dimension' => 4,
            ],
            [
                'pregunta'  => '17.	¿realizó evaluaciones de su desempeño como estudiante y dialogó sobre los resultados obtenidos para hacerlos participes de la forma de fortalecerlos?',
                'dimension' => 6,
            ],
            [
                'pregunta'  => '18.	¿Empleo estrategias de evaluación diversificadas, permanentes y coherentes con los contenidos abordados?',
                'dimension' => 6,
            ],

            // Pregunta 19
            [
                'pregunta'  => 'a) Examen oral ',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'b) Examen escrito por preguntas abiertas ',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'c) Examen escrito de opción múltiple',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'd) Trabajo escrito',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'e) Examen práctico ',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'f) Trabajo de investigación de campo',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'g) Experimento',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'h) Exposiciones en clase',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'i) Proyecto',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'j) Elaboración de materiales o modelos',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'k) Cuaderno de ejercicios',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'l) Tareas',
                'dimension' => 6,
            ],
            [
                'pregunta'  => 'n) Otros',
                'dimension' => 6,
            ],

            // Pregunta 20
            [
                'pregunta'  => '20.	Al finalizar el curso ¿realizó una evaluación final clarificando los criterios e indicadores utilizados para evaluar?',
                'dimension' => 6,
            ],
            [
                'pregunta'  => '21.	¿Tomó en cuenta los criterios establecidos en el encuadre para la calificación y acreditación de la asignatura o módulo?',
                'dimension' => 7,
            ],
            [
                'pregunta'  => '22.	Dio a conocer las calificaciones en el plazo establecido.',
                'dimension' => 7,
            ],
            [
                'pregunta'  => '23.	¿Mostró apertura para la corrección de errores de apreciación y evaluación?',
                'dimension' => 7,
            ],
            [
                'pregunta'  => '24.	 ¿Mostró una actitud de disposición y compromiso por tu aprendizaje?',
                'dimension' => 2,
            ],
            [
                'pregunta'  => '25.	¿Cumplió con el horario establecido de la sesión para favorecer el aprendizaje y la participación?',
                'dimension' => 8,
            ],
            [
                'pregunta'  => '26.	¿Se observó preparación y dominio de los contenidos del módulo o curso?',
                'dimension' => 1,
            ],
            [
                'pregunta'  => '27.	¿Está satisfecho del nivel de desempeño y aprendizaje logrado gracias a la labor del docente?',
                'dimension' => 1,
            ],
            [
                'pregunta'  => '28.	¿Consideras adecuado el desempeño del docente en el curso o módulo desarrollado?',
                'dimension' => 1,
            ],
            [
                'pregunta'  => '29.	¿Concluyo sus sesiones en el tiempo establecido del semestre? ¿terminó antes?',
                'dimension' => 8,
            ],

        ]);
    }
}
