<?php

namespace App\Controllers\Admin;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;
use Dompdf\Dompdf;
use Dompdf\Options;


class UsuarioController extends ResourceController
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
        $usuarios = $this->usuario->orderBy('id', 'desc')->findAll(50);

        $data = [
            'usuarios'  => $usuarios
        ];
        // return view('admin/usuarios/index', $data);
        return view('admin/usuarios/index', $data);
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
            return view('admin/usuarios/show', compact('usuario'));
        } else {
            return redirect()->to('admin/usuarios');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('admin/usuarios/create');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $usuario = new UsuarioModel();

        $data = [
            'rol'       => $this->request->getVar('rol'),
            'codigo'    => $this->request->getVar('codigo'),
            'nombre'    => $this->request->getVar('nombre'),
            'apaterno'  => $this->request->getVar('apaterno'),
            'amaterno'  => $this->request->getVar('amaterno'),
            'email'     => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'foto'      => $this->request->getVar('foto'),
            'sexo'      => $this->request->getVar('sexo'),
            'bio'       => $this->request->getVar('bio')
        ];

        $rules = [
            // 'codigo'    => 'required|is_unique[usuarios.codigo]',
            'email'     => 'required|valid_email|is_unique[usuarios.email]'
        ];

        if ($this->validate($rules)) {
            $usuario->insert($data);
            return redirect()->to(site_url('/admin/usuarios'));
            session()->setFlashdata("success", "Usuario registrado con éxito");
        } else {
            $data['emailDuplicateError'] = lang('El correo electrónico ya se encuentra registrado.');
            // $data['codigoDuplicado'] = lang('La matrícula ya se encuentra registrada.');
            return view('admin/usuarios/create', $data);
        }

        // return redirect()->to(site_url('/admin/usuarios'));
        // session()->setFlashdata("success", "Usuario registrado con éxito");
    }

    /*
    $data = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
    ];

    $rules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
    ];

    if ($this->validate($rules)) {
        $model->insert($data);
        return redirect()->to('/users')->with('success', 'Usuario creado exitosamente.');
    } else {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
*/




    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $usuario = $this->usuario->find($id);
        if ($usuario) {
            return view('admin/usuarios/edit', compact('usuario'));
        } else {
            session()->setFlashdata('failed', 'Usuario no encontrado.');
            return redirect()->to('/admin/usuarios');
        }
    }

    public function update($id = null)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado en la base de datos');
        }

        $data = [
            'id'        => $id,
            'rol'       => $this->request->getVar('rol'),
            'codigo'    => $this->request->getVar('codigo'),
            'nombre'    => $this->request->getVar('nombre'),
            'apaterno'  => $this->request->getVar('apaterno'),
            'amaterno'  => $this->request->getVar('amaterno'),
            'email'     => $this->request->getVar('email'),
            'foto'      => $this->request->getVar('foto'),
            'sexo'      => $this->request->getVar('sexo'),
            'bio'       => $this->request->getVar('bio')
        ];

        $usuarioModel->update($id, $data);
        return redirect()->to('/admin/usuarios')->with('success', 'Usuario actualizado exitosamente.');
    }

    


    public function delete($id = null)
    {
        $this->usuario->delete($id);

        session()->setFlashdata('success', 'Registro borrado de la base de datos');

        return redirect()->to(base_url('/admin/usuarios'));
    }



    public function sdue()
    {
        return view('admin/csv/importarUsuarioEstudiante');
    }

    public function idue()
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
                    // 'id'        => $row[0],
                    'rol'       => 'estudiante',
                    'codigo'    => $row[0],
                    'nombre'    => $row[1],
                    'curp'      => $row[2],
                    'email'     => $row[3],
                    'password'  => password_hash($row[4], PASSWORD_DEFAULT),
                    'sexo'      => $row[5],
                    'fechaNacimiento'   => $row[6]
                ];
            }

            fclose($handle);

            if (!empty($data)) {
                // Insert the data into the MySQL table using insertBatch()
                $model->insertBatch($data);
                return redirect()->to('/admin/estudiantes');
            } else {
                return 'El archivo no contiene las cabeceras válidas.';
            }
        } catch (\Exception $e) {
            return 'Erros en la importación de datos: ' . $e->getMessage();
        }
    }


    // función para buscar usuarios
    public function bu()
    {
        $usuario = new UsuarioModel();
        
        $searchTerm = $this->request->getGet('search'); // Obtener el término de búsqueda
        $data['searchTerm'] = $searchTerm;
        
        if ($searchTerm) {
            // Filtrar registros según el término de búsqueda
            $data['usuarios'] = $usuario->like('nombre', $searchTerm)
                ->orLike('codigo', $searchTerm)
                ->orLike('rol', $searchTerm)
                ->orLike('email', $searchTerm)
                ->findAll(18);
        } else {
            // Sin filtro, obtener todos los registros
            $data['usuarios'] = $usuario->findAll(10);
        }

        return view('admin/usuarios/buscarUsuarios', $data);
    }


    public function pdfUsuario($id)
    {
        $usuario = new UsuarioModel();
        $usuario = $usuario->find($id);

        if (!$usuario) {
            return redirect()->to('admin/usuarios');
        }

        $options = new Options();
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        $data['usuario'] = $usuario;

        $html = view('admin/usuarios/pdf_template', $data); // Crea una vista para el contenido del PDF

        $dompdf->loadHtml($html);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();

        $dompdf->stream('usuario_' . $usuario['id'] . '.pdf', ['Attachment' => 0]);
    }


    public function editPassword($id)
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find($id);

        if (!$data['usuario']) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        return view('admin/usuarios/edit_password', $data);
    }


    public function updatePassword($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        $newPassword = $this->request->getPost('new_password');
        if (empty($newPassword)) {
            return redirect()->back()->with('error', 'La nueva contraseña no puede estar vacía.');
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $usuarioModel->update($id, ['password' => $hashedPassword]);

        return redirect()->to('/admin/usuarios')->with('success', 'Contraseña actualizada exitosamente.');
    }

}
