<?php

namespace App\Controllers\Docente;

use App\Models\AsignaturaModel;
use CodeIgniter\RESTful\ResourceController;

class AsignaturaController extends ResourceController
{

    private $asignatura;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->asignatura = new AsignaturaModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $asignaturas = $this->asignatura->orderBy('id', 'desc')->findAll();

        $data = [
            'asignaturas'   => $asignaturas
        ];
        return view('docente/asignaturas/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $asignatura = $this->asignatura->find($id);

        if ($asignatura) {
            return view('docente/asignaturas/show', compact('asignatura'));
        } else {
            return redirect()->to('docente/asignaturas');
        }
    }



    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('docente/asignaturas/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'clave'         => 'required|min_length[1]|max_length[10]',
            'nombre'        => 'required|min_length[2]|max_length[255]',
            'creditos'      => 'required',
            'horasSemana'   => 'required'
        ]);

        if (!$inputs) {
            return view('admin/asignaturas/create', ['validation' => $this->validator]);
        }

        $this->asignatura->save([
            'clave'             => $this->request->getVar('clave'),
            'nombre'            => $this->request->getVar('nombre'),
            'descripcion'       => $this->request->getVar('descripcion'),
            'creditos'          => $this->request->getVar('creditos'),
            'horasSemana'       => $this->request->getVar('horasSemana'),
            'temario'           => $this->request->getVar('temario'),
            'temarioArchivo'    => $this->request->getVar('temarioArchivo')
        ]);

        return redirect()->to(site_url('/admin/asignaturas'));
        session()->setFlashdata("success", "Asignatura registrada con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $asignatura = $this->asignatura->find($id);
        if ($asignatura) {
            return view('admin/asignaturas/edit', compact('asignatura'));
        } else {
            session()->setFlashdata('failed', 'Asignatura no encontrada.');
            return redirect()->to('/admin/asignaturas');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $inputs = $this->validate([
            'clave'         => 'required|min_length[1]|max_length[10]',
            'nombre'        => 'required|min_length[2]|max_length[255]',
            'creditos'      => 'required',
            'horasSemana'   => 'required'
        ]);

        if (!$inputs) {
            return view('admin/asignaturas/create', [
                'validation' => $this->validator
            ]);
        }

        $this->asignatura->save([
            'id'                => $id,
            'clave'             => $this->request->getVar('clave'),
            'nombre'            => $this->request->getVar('nombre'),
            'descripcion'       => $this->request->getVar('descripcion'),
            'creditos'          => $this->request->getVar('creditos'),
            'horasSemana'       => $this->request->getVar('horasSemana'),
            'temario'           => $this->request->getVar('temario'),
            'temarioArchivo'    => $this->request->getVar('temarioArchivo')
        ]);
        session()->setFlashdata('success', 'Datos actualizados con éxito.');
        return redirect()->to(base_url('/admin/asignaturas'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->asignatura->delete($id);

        session()->setFlashdata('success', 'Registro borrado de la base de datos');

        return redirect()->to(base_url('/admin/asignaturas'));
    }
}
