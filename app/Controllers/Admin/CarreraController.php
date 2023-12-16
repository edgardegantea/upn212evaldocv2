<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarreraModel;

class CarreraController extends ResourceController
{
    private $carrera;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->carrera = new CarreraModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $carreras = $this->carrera->orderBy('id', 'desc')->findAll();

        $data = [
            'carreras'  => $carreras
        ];
        return view('admin/carreras/index', $data);
    }


    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $carrera = $this->carrera->find($id);

        if ($carrera) {
            return view('admin/carreras/show', compact('carrera'));
        } else {
            return redirect()->to('admin/carreras');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/carreras/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'nombre'        => 'required|min_length[2]|max_length[255]',
        ]);

        if (!$inputs) {
            return view('admin/carreras/create', ['validation' => $this->validator]);
        }

        $this->carrera->save([
            'nombre'            => $this->request->getVar('nombre'),
            'descripcion'       => $this->request->getVar('descripcion'),
            'creditos'          => $this->request->getVar('creditos')
        ]);

        return redirect()->to(site_url('/admin/carreras'));
        session()->setFlashdata("success", "Carrera registrada con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $carrera = $this->carrera->find($id);
        if ($carrera) {
            return view('admin/carreras/edit', compact('carrera'));
        } else {
            session()->setFlashdata('failed', 'Carrera no encontrada.');
            return redirect()->to('/admin/carreras');
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
            'nombre'        => 'required|min_length[2]|max_length[255]'
        ]);

        if (!$inputs) {
            return view('admin/carreras/create', [
                'validation' => $this->validator
            ]);
        }

        $this->carrera->save([
            'id'                => $id,
            'nombre'            => $this->request->getVar('nombre'),
            'descripcion'       => $this->request->getVar('descripcion'),
            'creditos'          => $this->request->getVar('creditos')
        ]);
        session()->setFlashdata('success', 'Datos actualizados con éxito.');
        return redirect()->to(base_url('/admin/carreras'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->carrera->delete($id);

        session()->setFlashdata('success', 'Registro borrado de la base de datos');

        return redirect()->to(base_url('/admin/carreras'));
    }
}
