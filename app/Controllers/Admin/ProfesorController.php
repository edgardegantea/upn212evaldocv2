<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProfesorModel;

class ProfesorController extends ResourceController
{
    private $profesor;
    private $db;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->db = db_connect();
        $this->session = \Config\Services::session();
        $this->profesor = new ProfesorModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $this->db->table('profesores as p');
        $builder->select('p.*, a.nombre as nombreArea');
        $builder->join('areas as a', 'p.area = a.id');
        $profesores = $builder->get()->getResult();

        $data = [
            'profesores'   => $profesores
        ];

        return view('admin/profesores/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/profesores/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'nombre'    => 'required|is_unique[profesores.nombre]'
        ]);

        if (!$inputs) {
            return view('admin/profesores/create', [
                'validation' => $this->validator
            ]);
        }

        $this->profesor->save([
            'nombre'    => $this->request->getVar('nombre'),
            'foto'      => $this->request->getVar('foto'),
            'area'      => 4
        ]);

        return redirect()->to(site_url('/admin/profesores'));
        session()->setFlashdata("success", "Profesor registrado con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $profesor = $this->profesor->find($id);
        if ($profesor) {
            return view('admin/profesores/edit', compact('profesor'));
        } else {
            session()->setFlashdata('failed', 'Profesor no encontrado.');
            return redirect()->to('/admin/profesores');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $profesorModel = new ProfesorModel();
        $profesor = $profesorModel->find($id);

        if (!$profesor) {
            return redirect()->to('/admin/profesores')->with('error', 'Profesor no encontrado en la base de datos');
        }

        $data = [
            'id'        => $id,
            'nombre'    => $this->request->getVar('nombre'),
            'foto'      => $this->request->getVar('foto'),
            'area'      => 4
        ];

        $profesorModel->update($id, $data);
        return redirect()->to('/admin/profesores')->with('success', 'Profesor actualizado exitosamente.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->profesor->delete($id);
        return redirect()->to(site_url('/admin/profesores'));
    }


    // Para subir datos de profesores en CSV
    public function sdp()
    {
        return view('admin/csv/importarProfesores');
    }

    // para insertar datos de profesores por CSV
    public function idp()
    {
        $csvFile = $this->request->getFile('csv_file');

        // Check if a file was uploaded
        if (!$csvFile) {
            return 'Archivo CSV no seleccionado.';
        }

        // Check if the file is a CSV
        if (!$csvFile->isValid() || $csvFile->getExtension() !== 'csv') {
            return 'Formato inválido.';
        }

        // Load the database model
        $model = new UsuarioModel(); // Replace ModelName with your actual model name

        try {
            $filePath = $csvFile->getTempName();
            $handle = fopen($filePath, 'r');

            // Skip the first row if it contains headers
            fgetcsv($handle);

            $data = [];
            while (($row = fgetcsv($handle)) !== false) {
                // Assuming your CSV columns are in the order: name, email, phone
                $data[] = [
                    'nombre'    => $row[0],
                    'area'      => $row[2]
                ];
            }

            fclose($handle);

            if (!empty($data)) {
                // Insert the data into the MySQL table using insertBatch()
                $model->insertBatch($data);
                return redirect()->to('/admin/profesores');
            } else {
                return 'El archivo no contiene las cabeceras válidas.';
            }
        } catch (\Exception $e) {
            return 'Error en la importación de datos: ' . $e->getMessage();
        }
    }

}
