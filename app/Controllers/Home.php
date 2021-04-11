<?php namespace App\Controllers;


 
 
class Home extends BaseController
{
	public function index()
	{
		$session = session();
        if ( $session->has('CURP') and $session->ID_C ==1 and $session->Status ==1)
        {
        	//CANTIDAD TOTAL DE PRODUCTO
        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->where('f_expira>', date("Y-m-d"));
        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad=$totall['cantidad'];
        if($cantidad==''){
            $cantidad='0';
        }

    	//CANTIDAD TOTAL DE MEDICAMENTOS
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('ID_CAT', 1);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_med=$totall['cantidad'];
        if($cantidad_med==''){
            $cantidad_med='0';
        }

    	//CANTIDAD TOTAL DE MATERIAL DE CURACIÓN
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('ID_CAT', 0);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_cur=$totall['cantidad'];
        if($cantidad_cur==''){
            $cantidad_cur='0';
        }
    	//TOTAL DE ARTICULOS PARA RECETA
    	$builder = $db->table('t_productos');
        $builder->selectCount('SSA');

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_rec=$totall['SSA'];
        if($cantidad_rec==''){
            $cantidad_rec='0';
        }
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

    	$rm = ['titulo' => 'Usuarios', 'cant' => $cantidad, 'cant_med' => $cantidad_med, 'cant_cur' => $cantidad_cur, 'cant_rec' => $cantidad_rec, 'cant_12' => $cantidad_12, 'cant_6' => $cantidad_6, 'cant_3' => $cantidad_3];
        echo view('header');
		echo view('home',$rm);
		echo view('footer');

    }
    elseif ( $session->has('CURP') and $session->ID_C ==2 and $session->Status ==1)
        {
            //CANTIDAD TOTAL DE PRODUCTO
        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->where('f_expira>', date("Y-m-d"));
        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad=$totall['cantidad'];
        if($cantidad==''){
            $cantidad='0';
        }

        //CANTIDAD TOTAL DE MEDICAMENTOS
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('ID_CAT', 1);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_med=$totall['cantidad'];
        if($cantidad_med==''){
            $cantidad_med='0';
        }

        //CANTIDAD TOTAL DE MATERIAL DE CURACIÓN
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('ID_CAT', 0);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_cur=$totall['cantidad'];
        if($cantidad_cur==''){
            $cantidad_cur='0';
        }
        //TOTAL DE ARTICULOS PARA RECETA
        $builder = $db->table('t_productos');
        $builder->selectCount('SSA');

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_rec=$totall['SSA'];
        if($cantidad_rec==''){
            $cantidad_rec='0';
        }
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

        $rm = ['titulo' => 'Usuarios', 'cant' => $cantidad, 'cant_med' => $cantidad_med, 'cant_cur' => $cantidad_cur, 'cant_rec' => $cantidad_rec, 'cant_12' => $cantidad_12, 'cant_6' => $cantidad_6, 'cant_3' => $cantidad_3];
        echo view('header_Capturista');
        echo view('home',$rm);
        echo view('footer');

    }
    elseif ( $session->has('CURP') and $session->ID_C ==4 and $session->Status ==1)
        {
            //CANTIDAD TOTAL DE PRODUCTO
        $db = db_connect();
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->where('f_expira>', date("Y-m-d"));
        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad=$totall['cantidad'];
        if($cantidad==''){
            $cantidad='0';
        }

        //CANTIDAD TOTAL DE MEDICAMENTOS
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('ID_CAT', 1);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_med=$totall['cantidad'];
        if($cantidad_med==''){
            $cantidad_med='0';
        }

        //CANTIDAD TOTAL DE MATERIAL DE CURACIÓN
        $builder = $db->table('t_inventario');
        $builder->selectSum('cantidad');
        $builder->join('t_productos','t_inventario.SSA=t_productos.SSA');
        $builder->where('f_expira>', date("Y-m-d"));
        $builder->where('ID_CAT', 0);

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_cur=$totall['cantidad'];
        if($cantidad_cur==''){
            $cantidad_cur='0';
        }
        //TOTAL DE ARTICULOS PARA RECETA
        $builder = $db->table('t_productos');
        $builder->selectCount('SSA');

        $query = $builder->get();
        $tot=$query->getResultArray();
        foreach($tot as $totall){}
        $cantidad_rec=$totall['SSA'];
        if($cantidad_rec==''){
            $cantidad_rec='0';
        }
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

        $rm = ['titulo' => 'Usuarios', 'cant' => $cantidad, 'cant_med' => $cantidad_med, 'cant_cur' => $cantidad_cur, 'cant_rec' => $cantidad_rec, 'cant_12' => $cantidad_12, 'cant_6' => $cantidad_6, 'cant_3' => $cantidad_3];
        echo view('header_Almacen');
        echo view('home',$rm);
        echo view('footer');

    }elseif ($session->has('CURP') and $session->ID_C ==6 and $session->Status ==1) {
        echo view('header_Doctor');
        echo view('home_per');
        echo view('footer');
        # code...
    }elseif ($session->has('CURP') and $session->ID_C ==7 and $session->Status ==1) {
        echo view('header_Enfermera');
        echo view('home_per');
        echo view('footer');
        # code...
    }
    else{
        $session->destroy();
        return redirect()->to(base_url() . '/Login');
    }
		
	}

	//--------------------------------------------------------------------
 }
