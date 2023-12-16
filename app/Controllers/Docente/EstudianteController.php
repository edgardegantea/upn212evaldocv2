<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsuarioModel;

class EstudianteController extends ResourceController
{

    private $usuario;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->usuario = new UsuarioModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $estudiantes = $this->usuario->where('rol', 'estudiante')->findAll();

        $data = ['usuarios' => $estudiantes];

        return view('admin/estudiantes/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $usuario = $this->usuario->find($id);

        if ($usuario) {
            return view('admin/estudiantes/show', compact('usuario'));
        } else {
            return redirect()->to('admin/estudiantes');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/estudiantes/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'codigo'    => 'required|min_length[2]|max_length[10]',
            'nombre'    => 'required|min_length[2]|max_length[50]',
            'apaterno'  => 'required|min_length[2]|max_length[50]',
            'amaterno'  => 'required|min_length[2]',
            'email'     => 'required|min_length[6]|max_length[80]|valid_email|is_unique[usuarios.email]',
            'password'  => 'required|min_length[6]|max_length[255]',
            'sexo'      => 'required'
        ]);

        if (!$inputs) {
            return view('admin/estudiantes/create', ['validation' => $this->validator]);
        }

        $this->usuario->save([
            'rol'       => 'estudiante',
            'codigo'    => $this->request->getVar('codigo'),
            'nombre'    => $this->request->getVar('nombre'),
            'apaterno'  => $this->request->getVar('apaterno'),
            'amaterno'  => $this->request->getVar('amaterno'),
            'email'     => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'foto'      => $this->request->getVar('foto'),
            'sexo'      => $this->request->getVar('sexo')
        ]);

        return redirect()->to(site_url('/admin/estudiantes'));
        session()->setFlashdata("success", "Estudiante registrado con éxito");
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $usuario = $this->usuario->find($id);
        if ($usuario) {
            return view('admin/estudiantes/edit', compact('usuario'));
        } else {
            session()->setFlashdata('failed', 'Estudiante no encontrado.');
            return redirect()->to('/admin/estudiantes');
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
            'codigo'    => 'required|min_length[2]|max_length[10]',
            'nombre'    => 'required|min_length[2]|max_length[50]',
            'apaterno'  => 'required|min_length[2]|max_length[50]',
            'amaterno'  => 'required|min_length[2]',
            'email'     => 'required|min_length[6]|max_length[80]|valid_email',
            // 'password'  => 'required|min_length[6]|max_length[255]',
            'sexo'      => 'required'
        ]);

        if (!$inputs) {
            return view('admin/estudiantes/create', [
                'validation' => $this->validator
            ]);
        }

        $this->usuario->save([
            'id'        => $id,
            'rol'       => 'estudiante',
            'codigo'    => $this->request->getVar('codigo'),
            'nombre'    => $this->request->getVar('nombre'),
            'apaterno'  => $this->request->getVar('apaterno'),
            'amaterno'  => $this->request->getVar('amaterno'),
            'email'     => $this->request->getVar('email'),
            'foto'      => $this->request->getVar('foto'),
            'sexo'      => $this->request->getVar('sexo')
        ]);
        session()->setFlashdata('success', 'Datos actualizados con éxito.');
        return redirect()->to(base_url('/admin/estudiantes'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->usuario->delete($id);
        session()->setFlashdata('success', 'Registro borrado de la base de datos');
        return redirect()->to(base_url('/admin/estudiantes'));
    }
}
