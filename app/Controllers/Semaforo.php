<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedvencidosModel;


class Semaforo extends BaseController
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
        //CANTIDAD TOTAL DE ARTICULOS MAYORES A 12 MESES
        $date=date("Y")+1;
        $date=$date.date("-m-d");
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', $date);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_12=$totall['cantidad'];
        if($cantidad_12==''){
            $cantidad_12='0';
        }
        //CANTIDAD TOTAL DE ARTICULOS ENTRE 6 Y 12 MESES
        $mes=date("m")+6;
        $año=date("Y");
        if($mes>12){
            $año=$año+1;
            $mes=$mes-12;
        }
        $fecha=$año.'-'.$mes.date("-d");
        $date=$date.date("-m-d");
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', $fecha);
        $builder->where('f_expira<', $date);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_6=$totall['cantidad'];
        if($cantidad_6==''){
            $cantidad_6='0';
        }
        //CANTIDAD TOTAL DE ARTICULOS MENORES A 6 MESES
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('f_expira<', $fecha);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_3=$totall['cantidad'];
        if($cantidad_3==''){
            $cantidad_3='0';
        }

        $rm = ['cant_12' => $cantidad_12, 'cant_6' => $cantidad_6, 'cant_3' => $cantidad_3];
        echo view ('header');
        echo view('Medvencidos/semaforo', $rm);
        echo view ('footer');
        }elseif ($session->has('CURP') and $session->ID_C ==5  and $session->Status ==1)
        {
        $db = db_connect();
        //CANTIDAD TOTAL DE ARTICULOS MAYORES A 12 MESES
        $date=date("Y")+1;
        $date=$date.date("-m-d");
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', $date);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_12=$totall['cantidad'];
        if($cantidad_12==''){
            $cantidad_12='0';
        }
        //CANTIDAD TOTAL DE ARTICULOS ENTRE 6 Y 12 MESES
        $mes=date("m")+6;
        $año=date("Y");
        if($mes>12){
            $año=$año+1;
            $mes=$mes-12;
        }
        $fecha=$año.'-'.$mes.date("-d");
        $date=$date.date("-m-d");
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', $fecha);
        $builder->where('f_expira<', $date);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_6=$totall['cantidad'];
        if($cantidad_6==''){
            $cantidad_6='0';
        }
        //CANTIDAD TOTAL DE ARTICULOS MENORES A 6 MESES
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('f_expira<', $fecha);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_3=$totall['cantidad'];
        if($cantidad_3==''){
            $cantidad_3='0';
        }

        $rm = ['cant_12' => $cantidad_12, 'cant_6' => $cantidad_6, 'cant_3' => $cantidad_3];
        echo view ('header_Jefe');
        echo view('Medvencidos/semaforo', $rm);
        echo view ('footer');
        }
    else{
        return redirect()->to(base_url() . '/Login');
        }
        }
    public function semaforo_rojo()
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
        $builder->where('f_expira<', $fecha);
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
        $builder->where('f_expira<', $fecha);
        $builder->where('cantidad>', 0);
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header_Capturista');
        echo view ('Medvencidos/semaforojo', $rm);
        echo view ('footer');
    }
    elseif ($session->has('CURP') and $session->ID_C ==5  and $session->Status ==1)
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
        $builder->where('f_expira<', $fecha);
        $builder->where('cantidad>', 0);
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        
        echo view ('header_Jefe');
        echo view ('Medvencidos/semaforojo', $rm);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        

    }
    public function Semaforo_A()
    {
        $session = session();
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
        echo view('Medvencidos/semaforo', $rm);
        echo view ('footer');
        }
        if ($session->has('CURP') and $session->ID_C ==5  and $session->Status ==1)
        {
        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('cantidad>', 0);
        $builder->where('f_expira<', date("Y-m-d"));
        $query = $builder->get();
        
        $tot=$query->getResultArray();


        $rm = ['titulo' => 'Usuarios', 'datos' => $tot];
        echo view ('header_Jefe');
        echo view('Medvencidos/semaforo', $rm);
        echo view ('footer');
        }
    else{
        return redirect()->to(base_url() . '/Login');
    }
    }
        

    }
