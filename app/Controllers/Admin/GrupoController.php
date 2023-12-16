<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GrupoModel;

class GrupoController extends ResourceController
{
    
    private $grupo;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->grupo = new GrupoModel();
    }


    public function index()
    {

        $data = [
            'grupos'    => $this->grupo->orderBy('id', 'ASC')->findAll()
        ];

        return view('admin/grupos/index', $data);
    }

    

    public function show($id = null)
    {
        //
    }

    

    public function new()
    {
        $data = [
            'title' => 'Grupo'
        ];
        return view('admin/grupos/new', $data);
    }

   

    public function create()
    {
        $grupoModel = new GrupoModel();

        $data = [
            'clave'     => $this->request->getPost('clave'),
            'nombre'    => $this->request->getPost('nombre')
        ];

        $grupoModel->insert($data);
        return redirect()->to('/admin/grupos');
    }


    public function edit($id = null)
    {
        $grupoModel = new GrupoModel();
        $grupo = $grupoModel->find($id);

        $data = [
            'title' => 'Grupo',
            'grupo' => $grupo
        ];

        return view('admin/grupos/edit', $data);
    }

    


    public function update($id = null)
    {
        $grupoModel = new GrupoModel();

        $data = [
            'clave'     => $this->request->getVar('clave'),
            'nombre'    => $this->request->getVar('nombre')
        ];

        $grupoModel->update($id, $data);

        return redirect()->to('/admin/grupos');
    }

    


    public function delete($id = null)
    {
        $grupoModel = new GrupoModel();

        $grupoModel->delete($id);

        return redirect()->to('admin/grupos');
    }
}
