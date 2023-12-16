<?php

namespace App\Controllers\Admin;

use App\Models\AsignaturaModel;
use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class AsignaturaController extends ResourceController
{

    private $estudiante;
    private $db;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $this->db = db_connect();
        $this->asignatura = new AsignaturaModel();
        $this->estudiante = new UsuarioModel();
        $this->session = \Config\Services::session();
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

        return view('admin/asignaturas/index', $data);
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
            return view('admin/asignaturas/show', compact('asignatura'));
        } else {
            return redirect()->to('admin/asignaturas');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/asignaturas/create');
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



    public function prueba()
    {
        $db = \Config\Database::connect();
        $this->session = \Config\Services::session();

        $builder = $this->db->table('asignaturas as a');
        $builder->select('a.id, a.clave, a.nombre, p.*');
        $builder->join('preguntaseval as p', 'a.ed = p.id');
        $asignaturas = $builder->get()->getResult();

        $data = [
            'title' => 'Usuarios',
            'asignaturas' => $asignaturas
        ];

        dd($data);
        // return view('admin/usuarios/index', $data);
    }



    public function prueba2()
    {
        $db = \Config\Database::connect();
        $this->session = \Config\Services::session();


        $total = $db->table('asignaturas')->countAll();

        $builder3 = $this->db->table('asignaturas as a');
        $builder3->select('a.*, u.nombre');
        $builder3->join('users as user', 't.usuario = user.id');
        $builder3->join('areas as a', 'user.area = a.id');
        $builder3->join('status', 't.status = status.id');

        $tickets = $builder3->where('usuario', $this->session->id)->get()->getResult();

        $data = [
            'title'     => 'Tickets de soporte',
            'total'     => $total,
            'tickets' => $tickets
        ];

        return view('admin/tickets/misTickets', $data);
    }


}
