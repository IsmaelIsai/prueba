<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InventarioModel;


class Inventario extends BaseController
{

    protected $inventario;

    public function __construct()
    {

        $this->inventario = new InventarioModel();
              
        }

    public function index()
    {
        $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('cantidad>', 0);
        $builder->where('f_expira>', date("Y-m-d"));
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header');
        echo view ('inventario/inventario', $rm);
        echo view ('footer');
    }elseif ($session->has('CURP') and $session->ID_C ==2  and $session->Status ==1)
        {
        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('cantidad>', 0);
        $builder->where('f_expira>', date("Y-m-d"));
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header_Capturista');
        echo view ('inventario/inventario', $rm);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        

    }
    

    }