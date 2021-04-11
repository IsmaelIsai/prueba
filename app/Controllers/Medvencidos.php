<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedvencidosModel;


class Medvencidos extends BaseController
{

    protected $vencido;

    public function __construct()
    {

        $this->vencido = new MedvencidosModel();
               
        }

    public function index()
    {   $session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {

        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('cantidad>', 0);
        $builder->where('f_expira<', date("Y-m-d"));
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        echo view ('header');
        echo view('Medvencidos/medvencidos', $rm);
        echo view ('footer');
    }else{
        return redirect()->to(base_url() . '/Login');
    }
        

    }
    

    }