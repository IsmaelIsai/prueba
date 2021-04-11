<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedvencidosModel;


class Semaforo_rojo extends BaseController
{

    protected $vencido;

    public function __construct()
    {

        $this->vencido = new MedvencidosModel();
               
        }

    public function index()
    {
    	$session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        $db = db_connect();

        $mes=date("m")+6;
        $año=date("Y");
        if($mes>12){
            $año=$año+1;
            $mes=$mes-12;
        }
        $fecha=$año.'-'.$mes.date("-d");
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('f_expira<=', $fecha);
        $builder->where('cantidad>', 0);
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header');
        echo view ('Medvencidos/semaforojo', $rm);
        echo view ('footer');
    }elseif ($session->has('CURP') and $session->ID_C ==2  and $session->Status ==1)
        {
        $db = db_connect();

        $mes=date("m")+6;
        $año=date("Y");
        if($mes>12){
            $año=$año+1;
            $mes=$mes-12;
        }
        $fecha=$año.'-'.$mes.date("-d");
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('f_expira<=', $fecha);
        $builder->where('cantidad>', 0);
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header_Capturista');
        echo view ('Medvencidos/semaforojo', $rm);
        echo view ('footer');
    }elseif ($session->has('CURP') and $session->ID_C ==5  and $session->Status ==1)
        {
        $db = db_connect();

        $mes=date("m")+6;
        $año=date("Y");
        if($mes>12){
            $año=$año+1;
            $mes=$mes-12;
        }
        $fecha=$año.'-'.$mes.date("-d");
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('f_expira<=', $fecha);
        $builder->where('cantidad>', 0);
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header_Jefe');
        echo view ('Medvencidos/semaforojo', $rm);
        echo view ('footer');
    }elseif ($session->has('CURP') and $session->ID_C ==6  and $session->Status ==1)
        {
        $db = db_connect();

        $mes=date("m")+6;
        $año=date("Y");
        if($mes>12){
            $año=$año+1;
            $mes=$mes-12;
        }
        $fecha=$año.'-'.$mes.date("-d");
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('f_expira<=', $fecha);
        $builder->where('cantidad>', 0);
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header_D');
        echo view ('Medvencidos/semaforojo', $rm);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
}}