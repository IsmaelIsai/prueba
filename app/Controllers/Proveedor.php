<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProveedorModel;


class Proveedor extends BaseController
{

    protected $provedor;

    public function __construct()
    {

        $this->provedor = new ProveedorModel();
        

    }

    public function index()
    {
        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        $provedor = $this->provedor->findAll();
        $data = ['titulo' => 'Proveedores', 'datos' => $provedor ];
        
        echo view ('header');
        echo view ('Proveedor/proveedor', $data);
        echo view ('footer');
    }elseif ($session->has('CURP') and $session->ID_C ==4  and $session->Status ==1)
        {
        $provedor = $this->provedor->findAll();
        $data = ['titulo' => 'Proveedores', 'datos' => $provedor ];
        
        echo view ('header_Almacen');
        echo view ('Proveedor/proveedor', $data);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
     

    }

    

     public function insertar(){
        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $ProveedorModel=new ProveedorModel($db);
        $request= \Config\Services::request();
        $dat=array(
            'ID_PROV'=>$request->getPostGet('ID_PROV'),
            'nom_prov'=>$request->getPostGet('nom_prov'),
            'ape_prov'=>$request->getPostGet('ape_prov'),
            'edad_prov'=>$request->getPostGet('edad_prov'),
            'tel_prov'=>$request->getPostGet('tel_provedor'),
            'correo_prov'=>$request->getPostGet('correo_prov'),
            'empresa_prov'=>$request->getPostGet('empresa_prov'),
        );
        if($ProveedorModel->insert($dat)===false){
            var_dump($ProveedorModel->errors());
            }

 return redirect()->to(base_url().'/proveedor');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
     }


     public function  editar ($SSA)

     {
        $session = session();
        if ($session->has('CURP'))
        {
        $catala = $this->catalago->where('SSA',$SSA)->first();
        $data = ['titulo' => 'Editar', 'datos' => $catala];

        echo view ('header');
        echo view ('catalogo/editar', $data);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
     }

     public function actualizar(){

        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $this->provedor->update($this->request->getPost('ID_PROV'), ['ID_PROV' => $this->request->getPost('ID_PROV'), 
        'nom_prov' => $this->request->getPost('nom_prov'), 'ape_prov' => $this->request->getPost('ape_prov'), 'edad_prov' => $this->request->getPost('edad_prov'), 'tel_prov' => $this->request->getPost('tel_prov'), 'correo_prov' => $this->request->getPost('correo_prov'), 'empresa_prov' => $this->request->getPost('empresa_prov')]);

 return redirect()->to(base_url().'/proveedor');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
     }

     public function searchById($id) {
        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $item =  $this->provedor->where('ID_PROV', $id)->first();
        echo json_encode( $item );
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
    }
    

}