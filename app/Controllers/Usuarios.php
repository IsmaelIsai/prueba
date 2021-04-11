<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CargoModel;

class Usuarios extends BaseController
{

    protected $usuarios, $cargo;
    protected $reglas, $reglasLogin;
   

    public function __construct()
    {

        $this->usuarios = new UsuariosModel();
        $this->cargo = new CargoModel();

        helper(['form']);

        $this->reglas = [
            'CURP' => [
                'rules' => 'required|is_unique[t_personal.CURP]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is unique' => 'El campo {field} es obligatorio.'
                ]
            ],

            'ID_C' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'cedu_per' => [
                'rules' => 'required|is_unique[t_personal.cedu_per]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is unique' => 'El campo {field} es obligatorio.'
                ]
            ],

            'nom_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'ape_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'correo_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'edad_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],

            'contra_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];


        $this->reglasLogin = [
            'CURP' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ]
            ],


            'contra_per' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ]
        ];
    }

    public function index()
    {
        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        $usuarios = $this->usuarios->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

        echo view('header');
        echo view('Usuarios/usuarios', $data);
        echo view('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
    }

    public function  nuevo()
    {

        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        $cargo = $this->cargo->findAll();

        $data = ['titulo' => 'Agregar usuario', 'cargo' => $cargo];
        echo view('header');
        echo view('Usuarios/nuevo', $data);
        echo view('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }


    }

    public function insertar(){

        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
         $hash = password_hash($this->request->getPostGet('contra_per'), PASSWORD_DEFAULT);

        if($this->request->getMethod() == "post" && $this->validate($this->reglas)) {


        $UsuariosModel=new UsuariosModel($db);
        $request= \Config\Services::request();
        $dat=array(
            'CURP'=>$request->getPostGet('CURP'),
            'ID_C'=>$request->getPostGet('ID_C'),
            'cedu_per'=>$request->getPostGet('cedu_per'),
            'nom_per'=>$request->getPostGet('nom_per'),
            'ape_per'=>$request->getPostGet('ape_per'),
            'correo_per'=>$request->getPostGet('correo_per'),
            'edad_per'=>$request->getPostGet('edad_per'),
            'contra_per' =>md5($this->request->getPostGet('contra_per'))
        );
        if($UsuariosModel->insert($dat)===false){
            var_dump($UsuariosModel->errors());
            }

return redirect()->to(base_url().'/usuarios');
} else {

    $cargo = $this->cargo->findAll();

    $data = ['titulo' => 'Agregar usuario', 'cargo' => $cargo, 'validation' => $this->validator];

        echo view ('header');
        echo view ('usuarios/nuevo', $data);
        echo view ('footer');
    }
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
        }


    public function login()
    {

        echo view('login');
    }
    public function valida()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {

        $request= \Config\Services::request();
            $usuario = $this->request->getPost('CURP');
            $contra_p = $this->request->getPost('contra_per');

            $datosUsuario = $this->usuarios->where('CURP', $usuario)->first();
           

            if ($datosUsuario != null) {
            $resta=strlen(md5($contra_p))-strlen($datosUsuario['contra_per']);
            $contras=substr(md5($contra_p), 0, -$resta);

                if ($contras=== $datosUsuario['contra_per']) {

                    $datosSesion = [

                        'CURP' => $datosUsuario['CURP'],
                        'contra_per' => $datosUsuario['contra_per'],
                        'nom_per' => $datosUsuario['nom_per'],
                        'ape_per' => $datosUsuario['ape_per'],
                        'cedu_per' => $datosUsuario['cedu_per'],
                        'ID_C' => $datosUsuario['ID_C'],
                        'edad_per' => $datosUsuario['edad_per'],
                        'correo_per' => $datosUsuario['correo_per'],
                        'Status' => $datosUsuario['Status']

                    ];

                    $session = session();
                    $session->set($datosSesion);

                    return redirect()->to(base_url() . '/Home');
                } else {

                    return redirect()->to(base_url() . '/Login/error');
                }
            } else {    

                $data['error'] = "El usuario no existe";
                echo view('login', $data);
            }
        } else {

            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }
    public function logout()
    {
        $session=session();
        $session->destroy();
        return redirect()->to(base_url() . '/inicio');
    }

    public function searchById($id) {
        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        $item =  $this->usuarios->where('CURP', $id)->first();
        echo json_encode( $item );
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
    }

    public function actualizar()
    {
        $session = session();
        if ($session->has('CURP'))
        {
        $this->usuarios->update($this->request->getPost('CURP'), [
            'CURP' => $this->request->getPost('CURP'),
            'cedu_per' => $this->request->getPost('cedu_per'),
            'nom_per' => $this->request->getPost('nom_per'),
            'ape_per' => $this->request->getPost('ape_per'),
            'correo_per' => $this->request->getPost('correo_per'),
            'edad_per' => $this->request->getPost('edad_per'),
            'Status' => $this->request->getPost('Status')
        ]);

        return redirect()->to(base_url() . '/Usuarios');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
    }
}
