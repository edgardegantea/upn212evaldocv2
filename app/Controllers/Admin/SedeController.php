<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SedeModel;

class SedeController extends ResourceController
{

    private $sede;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->sede = new SedeModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $sedes = $this->sede->orderBy('id', 'desc')->findAll();
        $data = [
            'sedes' => $sedes
        ];

        return view('admin/sedes/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $sede = $this->sede->find($id);

        if ($sede) {
            return view('admin/sedes/show', compact('sede'));
        } else {
            return redirect()->to('admin/sedes');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/sedes/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'nombre'       => 'required|min_length[2]|max_length[255]'
        ]);

        if (!$inputs) {
            return view('admin/sedes/create', ['validation' => $this->validator]);
        }

        $this->sede->save([
            'nombre'    => $this->request->getVar('nombre'),
            'telefono'  => $this->request->getVar('telefono'),
            'email'     => $this->request->getVar('email'),
            'website'   => $this->request->getVar('website'),
            'facebook'  => $this->request->getVar('facebook')
        ]);

        return redirect()->to(site_url('/admin/sedes'));
        session()->setFlashdata("success", "Sede registrada con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $sede = $this->sede->find($id);
        if ($sede) {
            return view('admin/sedes/edit', compact('sede'));
        } else {
            session()->setFlashdata('failed', 'Sede no encontrada.');
            return redirect()->to('/admin/sedes');
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
            'nombre'       => 'required|min_length[2]|max_length[255]'
        ]);

        if (!$inputs) {
            return view('admin/sedes/create', [
                'validation' => $this->validator
            ]);
        }

        $this->sede->save([
            'id'        => $id,
            'nombre'    => $this->request->getVar('nombre'),
            'telefono'  => $this->request->getVar('telefono'),
            'email'     => $this->request->getVar('email'),
            'website'   => $this->request->getVar('website'),
            'facebook'  => $this->request->getVar('facebook')
        ]);
        session()->setFlashdata('success', 'Datos actualizados con éxito.');
        return redirect()->to(base_url('/admin/sedes'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->sede->delete($id);
        session()->setFlashdata('success', 'Registro borrado de la base de datos');
        return redirect()->to(base_url('/admin/sedes'));
    }
}
