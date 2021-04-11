<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatalogoModel;
use App\Models\CategoriaModel;

class Catálogo extends BaseController
{

    protected $catálogo, $categoria;

    public function __construct()
    {

        $this->catálogo = new CatalogoModel();
        $this->categoria = new CategoriaModel();
    }

    public function index()
    {
        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1 and $session->Status ==1)
        {
        $catálogo = $this->catálogo->findAll();

        $data = ['titulo' => 'Catálogo de productos', 'datos' => $catálogo];


        echo view('header');
        echo view('Catálogo/catálogo', $data);
        echo view('footer');
    }
    elseif ($session->has('CURP') and $session->ID_C ==4 and $session->Status ==1)
        {
        $catálogo = $this->catálogo->findAll();

        $data = ['titulo' => 'Catálogo de productos', 'datos' => $catálogo];


        echo view('header_Almacen');
        echo view('Catálogo/catálogo', $data);
        echo view('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
    }


    public function insertar()
    {
        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $CatalogoModel = new CatalogoModel($db);
        $request = \Config\Services::request();
        $dat = array(
            'SSA' => $request->getPostGet('SSA'),
            'desc_produc' => $request->getPostGet('desc_produc'),
            'presentacion' => $request->getPostGet('presentacion'),
            'ID_CAT' => $request->getPostGet('ID_CAT'),
        );
        if ($CatalogoModel->insert($dat) === false) {
            var_dump($CatalogoModel->errors());
        }

        return redirect()->to(base_url() . '/Catálogo');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
      
    }

    public function searchById($id) {
        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $item =  $this->catálogo->where('SSA', $id)->first();
        echo json_encode( $item );
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
    }

    public function  editar($SSA)
    {
        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1 )
        {
        $catalo = $this->catálogo->where('SSA', $SSA)->first();
        $data = ['titulo' => 'Editar', 'datos' => $catalo];

    
        echo view('Catálogo/catálogo', $data);
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
        
    }

    public function actualizar()
    {
        $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $this->catálogo->update($this->request->getPost('SSA'), [
            'SSA' => $this->request->getPost('SSA'),
            'desc_produc' => $this->request->getPost('desc_produc'),
            'presentacion' => $this->request->getPost('presentacion')
        ]);

        return redirect()->to(base_url() . '/Catálogo');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
    }
}
