<?php

namespace App\Controllers\Admin;

use App\Models\ModalidadModel;
use CodeIgniter\RESTful\ResourceController;

class ModalidadController extends ResourceController
{

    private $modalidad;

    public function __construct()
    {
        $this->modalidad = new ModalidadModel();
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $modalidades = $this->modalidad->orderBy('id', 'desc')->findAll();
        $data = ['modalidades' => $modalidades];
        return view('admin/modalidades/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $modalidad = $this->modalidad->find($id);

        if ($modalidad) {
            return view('admin/modalidades/show', compact('modalidad'));
        } else {
            return redirect()->to('admin/modalidades');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/modalidades/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'nombre'        => 'required|min_length[2]|max_length[255]'
        ]);

        if (!$inputs) {
            return view('admin/modalidades/create', ['validation' => $this->validator]);
        }

        $this->modalidad->save([
            'nombre'            => $this->request->getVar('nombre')
        ]);

        return redirect()->to(site_url('/admin/modalidades'));
        session()->setFlashdata("success", "ModalidadModel registrada con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $modalidad = $this->modalidad->find($id);
        if ($modalidad) {
            return view('admin/modalidades/edit', compact('modalidad'));
        } else {
            session()->setFlashdata('failed', 'Modalidad no encontrada.');
            return redirect()->to('/admin/modalidades');
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
            return view('admin/modalidades/create', [
                'validation' => $this->validator
            ]);
        }

        $this->modalidad->save([
            'id'                => $id,
            'nombre'            => $this->request->getVar('nombre')
        ]);
        session()->setFlashdata('success', 'Datos actualizados con éxito.');
        return redirect()->to(base_url('/admin/modalidades'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->modalidad->delete($id);

        session()->setFlashdata('success', 'Registro borrado de la base de datos');

        return redirect()->to(base_url('/admin/modalidades'));
    }
}
