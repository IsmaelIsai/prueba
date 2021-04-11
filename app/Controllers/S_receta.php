<?php 
namespace App\Controllers;

use App\Models\Receta_medModel;
use App\Models\CuracionModel;
use App\Models\MedicamentosModel;
use App\Models\CatalogoModel;

class S_receta extends BaseController
{
	
		protected $recetamed, $curacion , $medicamentos,$catálogo;
	
		public function __construct()
		{
	
			$this->recetamed = new Receta_medModel();
			$this->curacion = new CuracionModel();
			$this->medicamentos = new MedicamentosModel();
			$this->catálogo = new CatalogoModel();

			}
	public function index()
	{	$session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
		$request= \Config\Services::request();
        $SSA_pro=$request->getPostGet('a');
        if($SSA_pro==''){
        	return redirect()->to(base_url().'/Salidas');
        }
        $db = db_connect();
	    $builder = $db->table('t_receta');
	    $builder->select('ID_RECETA,desc_produc,t_receta.SSA,c_solicitada,cant_tot,c_surtida');
	    $builder->join('t_productos','t_receta.SSA=t_productos.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $query = $builder->get();
	    //SELECT ID_RECETA,t_receta.SSA,c_solicitada,SUM(cantidad),c_surtida FROM `t_receta` INNER JOIN `t_inventario` ON t_receta.SSA=t_inventario.SSA WHERE ID_RECETA ='20210211101456' AND t_receta.SSA='010.000.0106.00' AND f_expira>'2021-02-19'
	    $tot=$query->getResultArray();
	    $guia=$tot;
	    $ins=0;
	    $name1='';
	    $name2='';
	    $name3='';
	    foreach($tot as $totall){
	    if($ins==0){
	    	$name1=$totall['SSA'];
	    }
	   	elseif ($ins==1) {
	   		$name2=$totall['SSA'];
	   	}
	   	elseif($ins==2){
	   		$name3=$totall['SSA'];
	   	}
	   	$ins=$ins+1;
	   }
	   //CASO 1//
	   if(count($guia)==1){
	   	
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name1);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	    echo $consull['t'];
	   }
	    $cero=$guia[0];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$cero=array_replace($cero, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$cero=array_replace($cero, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name1);
	    $builder->update();
	    $tot=array($cero);
}		//CASO 2//
	    if(count($guia)==2){

	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name1);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	    	echo $consull['t'];
	   }
	    $cero=$guia[0];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$cero=array_replace($cero, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$cero=array_replace($cero, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name1);
	    $builder->update();
	    
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name2);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	    	echo $consull['t'];
	   }
	    $uno=$guia[1];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$uno=array_replace($uno, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$uno=array_replace($uno, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name2);
	    $builder->update();
	    $tot=array($cero,$uno);
	    }
	    //CASO 3//
	    if(count($guia)==3){
	    	
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name1);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	   }
	    $cero=$guia[0];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$cero=array_replace($cero, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$cero=array_replace($cero, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name1);
	    $builder->update();
	    
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name2);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	   }
	    $uno=$guia[1];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$uno=array_replace($uno, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$uno=array_replace($uno, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name2);
	    $builder->update();

	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name3);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	   }
	   	$dos=$guia[2];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$dos=array_replace($dos, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$dos=array_replace($dos, $rem );
	    }
	   	$builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name3);
	    $builder->update();
	    $tot=array($cero,$uno,$dos);
	    }

		$dataing = ['titulo' => 'Despacho de material', 'datos' => $tot ];

		echo view('header');
		echo view('Salidas/receta_med', $dataing);
		echo view('footer');
	}elseif ($session->has('CURP') and $session->ID_C ==2  and $session->Status ==1)
        {
		$request= \Config\Services::request();
        $SSA_pro=$request->getPostGet('a');
        if($SSA_pro==''){
        	return redirect()->to(base_url().'/Salidas');
        }
        $db = db_connect();
	    $builder = $db->table('t_receta');
	    $builder->select('ID_RECETA,desc_produc,t_receta.SSA,c_solicitada,cant_tot,c_surtida');
	    $builder->join('t_productos','t_receta.SSA=t_productos.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $query = $builder->get();
	    //SELECT ID_RECETA,t_receta.SSA,c_solicitada,SUM(cantidad),c_surtida FROM `t_receta` INNER JOIN `t_inventario` ON t_receta.SSA=t_inventario.SSA WHERE ID_RECETA ='20210211101456' AND t_receta.SSA='010.000.0106.00' AND f_expira>'2021-02-19'
	    $tot=$query->getResultArray();
	    $guia=$tot;
	    $ins=0;
	    $name1='';
	    $name2='';
	    $name3='';
	    foreach($tot as $totall){
	    if($ins==0){
	    	$name1=$totall['SSA'];
	    }
	   	elseif ($ins==1) {
	   		$name2=$totall['SSA'];
	   	}
	   	elseif($ins==2){
	   		$name3=$totall['SSA'];
	   	}
	   	$ins=$ins+1;
	   }
	   //CASO 1//
	   if(count($guia)==1){
	   	
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name1);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	    echo $consull['t'];
	   }
	    $cero=$guia[0];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$cero=array_replace($cero, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$cero=array_replace($cero, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name1);
	    $builder->update();
	    $tot=array($cero);
}		//CASO 2//
	    if(count($guia)==2){

	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name1);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	    	echo $consull['t'];
	   }
	    $cero=$guia[0];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$cero=array_replace($cero, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$cero=array_replace($cero, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name1);
	    $builder->update();
	    
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name2);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	    	echo $consull['t'];
	   }
	    $uno=$guia[1];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$uno=array_replace($uno, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$uno=array_replace($uno, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name2);
	    $builder->update();
	    $tot=array($cero,$uno);
	    }
	    //CASO 3//
	    if(count($guia)==3){
	    	
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name1);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	   }
	    $cero=$guia[0];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$cero=array_replace($cero, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$cero=array_replace($cero, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name1);
	    $builder->update();
	    
	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name2);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	   }
	    $uno=$guia[1];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$uno=array_replace($uno, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$uno=array_replace($uno, $rem );
	    }
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name2);
	    $builder->update();

	    $builder = $db->table('t_receta');
	    $builder->select('SUM(cantidad) t');
	    $builder->join('t_inventario','t_receta.SSA=t_inventario.SSA');
	    $builder->where('ID_RECETA', $SSA_pro);
	    $builder->where('t_receta.SSA', $name3);
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	    $consul=$query->getResultArray();
	    foreach($consul as $consull){
	   }
	   	$dos=$guia[2];
	    $rem=array("cant_tot"=> $consull['t']);
	   	$dos=array_replace($dos, $rem );

	    if($consull['t']==NULL){
	    $rem=array("cant_tot"=> "0");
	   	$dos=array_replace($dos, $rem );
	    }
	   	$builder = $db->table('t_productos');
	    $builder->set('cant_tot',$consull['t']);
	    $builder->where('SSA', $name3);
	    $builder->update();
	    $tot=array($cero,$uno,$dos);
	    }

		$dataing = ['titulo' => 'Despacho de material', 'datos' => $tot ];

		echo view('header_Capturista');
		echo view('Salidas/receta_med', $dataing);
		echo view('footer');
	}else{
        return redirect()->to(base_url() . '/Login');
    }

        

    }


	public function actualizar(){
      $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==2) and $session->Status ==1)
        {
     //recoleccion de datos de la pagina de reparto de medicamentos
    $request= \Config\Services::request();
    $CANT=$request->getPostGet('0');
    echo $CANT;
    echo '---';
    $SSA=$request->getPostGet('10');
    echo $SSA;
    echo '---';
    $RECETA=$request->getPostGet('20');
    echo $RECETA;
    echo '---';
    //coneccion a los datos de la base de datos
    $db = db_connect();
    //select min de la fecha de caducidad de los ingresos(primer filtro)
    $builder = $db->table('t_inventario');
    $builder->selectMin('f_expira');
    $builder->where('SSA', $SSA);
    $builder->where('cantidad>', '0');
    $builder->where('f_expira>', date("Y-m-d"));
    $query = $builder->get();

   	//acomoda en un arreglo para la extraccion del dato
    $tot=$query->getResultArray();
    foreach($tot as $f_exp){
    echo $f_exp['f_expira'];}
    if ($f_exp['f_expira']==''){
    	echo 'nada en';
    }
    else{
    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
    echo '..';
    $builder = $db->table('t_inventario');
    $builder->select('cantidad');
    $builder->where('f_expira', $f_exp['f_expira']);
    $query = $builder->get();
    //acomoda en un arreglo para la extraccion del dato resultante
    $tot5=$query->getResultArray();
    foreach($tot5 as $op1){
    }
    print_r($tot5);
    //if seleccionador que ejecutara la accion si la cantidad de producto del lote seleccionado
    //es igual o mayor a la cantidad seleccionada para repartir
     //-------------------------------------------------------------//
    //---------------------------CASO NORMAL-----------------------//
   //-------------------------------------------------------------//

    if($op1['cantidad']>=$CANT){
    	$builder = $db->table('t_productos');
	    $builder->select('cant_tot');
	    $builder->where('SSA', $SSA);
	    $query = $builder->get();
	   	//acomodar en un arreglo
	    $tot=$query->getResultArray();
	    foreach($tot as $toti){
	    echo $toti['cant_tot'];}
	    //adicion de 2 variables
	    $a = array($toti['cant_tot'],-$CANT);
		$resta=array_sum($a);
		$b = array($op1['cantidad'],-$CANT);
		$restb=array_sum($b);
		//actualizacion del registro
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$resta,false);
	    $builder->where('SSA', $SSA);
	    $builder->update();
	    //actualizacion del registro inventario

	    $builder = $db->table('t_inventario');
	    $builder->set('cantidad',$restb,false);
	    $builder->where('f_expira', $f_exp['f_expira']);
	    $builder->update();
		//conectar y recolectar los valores a insertar
	    $builder = $db->table('t_receta');
	    $builder->select('c_surtida');
	    $builder->where('SSA', $SSA);
	    $builder->where('ID_RECETA', $RECETA);
	    $query = $builder->get();
	    //acomodar en un arreglo
	    $tot=$query->getResultArray();
	    foreach($tot as $toti){
	    echo $toti['c_surtida'];}
	    //adicion de 2 variables
	    $a1 = array($toti['c_surtida'],$CANT);
		$suma=array_sum($a1);
		//actualizacion del registro
		$builder = $db->table('t_receta');
	    $builder->set('c_surtida',$suma,false);
	    $builder->where('SSA', $SSA);
	    $builder->where('ID_RECETA', $RECETA);
	    $builder->update();
    }
     //-------------------------------------------------------------//
    //----------------------CASO ESPECIAL--------------------------//
   //-------------------------------------------------------------//
    else{
    	$CANTT=$op1['cantidad'];
    	$builder = $db->table('t_productos');
	    $builder->select('cant_tot');
	    $builder->where('SSA', $SSA);
	    $query = $builder->get();
	   	//acomodar en un arreglo
	    $tot=$query->getResultArray();
	    foreach($tot as $toti){
	    echo $toti['cant_tot'];}
	    //adicion de 2 variables
	    $a = array($toti['cant_tot'],-$CANTT);
		$resta=array_sum($a);
		$b = array($op1['cantidad'],-$CANTT);
		$restb=array_sum($b);
		//actualizacion del registro
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$resta,false);
	    $builder->where('SSA', $SSA);
	    $builder->update();
	    //actualizacion del registro inventario

	    $builder = $db->table('t_inventario');
	    $builder->set('cantidad',$restb,false);
	    $builder->where('f_expira', $f_exp['f_expira']);
	    $builder->update();
		//conectar y recolectar los valores a insertar
	    $builder = $db->table('t_receta');
	    $builder->select('c_surtida');
	    $builder->where('SSA', $SSA);
	    $builder->where('ID_RECETA', $RECETA);
	    $query = $builder->get();
	    //acomodar en un arreglo
	    $tot=$query->getResultArray();
	    foreach($tot as $toti){
	    echo $toti['c_surtida'];}
	    //adicion de 2 variables
	    $a1 = array($toti['c_surtida'],$CANTT);
		$suma=array_sum($a1);
		//actualizacion del registro
		$builder = $db->table('t_receta');
	    $builder->set('c_surtida',$suma,false);
	    $builder->where('SSA', $SSA);
	    $builder->where('ID_RECETA', $RECETA);
	    $builder->update();
	     //--------------------------------------------------------------//
	    //----------------------SEGUNDA INSERCIÓN-----------------------//
	   //--------------------------------------------------------------//


	    $C1 = array($CANT,-$CANTT);
		$CANT=array_sum($C1);
	    $builder = $db->table('t_inventario');
	    $builder->selectMin('f_expira');
	    $builder->where('SSA', $SSA);
	    $builder->where('cantidad>', '0');
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	   	//acomoda en un arreglo para la extraccion del dato
	    $tot=$query->getResultArray();
	    foreach($tot as $f_exp){
	    echo $f_exp['f_expira'];}
	    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
	    echo '..';
	    $builder = $db->table('t_inventario');
	    $builder->select('cantidad');
	    $builder->where('f_expira', $f_exp['f_expira']);
	    $query = $builder->get();
	    //acomoda en un arreglo para la extraccion del dato resultante
	    $tot=$query->getResultArray();
	    foreach($tot as $op1){
	    echo $op1['cantidad'];}

		$builder = $db->table('t_productos');
	    $builder->select('cant_tot');
	    $builder->where('SSA', $SSA);
	    $query = $builder->get();
	   	//acomodar en un arreglo
	    $tot=$query->getResultArray();
	    foreach($tot as $toti){
	    echo $toti['cant_tot'];}
	    //adicion de 2 variables
	    $a = array($toti['cant_tot'],-$CANT);
		$resta=array_sum($a);
		$b = array($op1['cantidad'],-$CANT);
		$restb=array_sum($b);
		//actualizacion del registro
	    $builder = $db->table('t_productos');
	    $builder->set('cant_tot',$resta,false);
	    $builder->where('SSA', $SSA);
	    $builder->update();
	    //actualizacion del registro inventario

	    $builder = $db->table('t_inventario');
	    $builder->set('cantidad',$restb,false);
	    $builder->where('f_expira', $f_exp['f_expira']);
	    $builder->update();
		//conectar y recolectar los valores a insertar
	    $builder = $db->table('t_receta');
	    $builder->select('c_surtida');
	    $builder->where('SSA', $SSA);
	    $builder->where('ID_RECETA', $RECETA);
	    $query = $builder->get();
	    //acomodar en un arreglo
	    $tot=$query->getResultArray();
	    foreach($tot as $toti){
	    echo $toti['c_surtida'];}
	    //adicion de 2 variables
	    $a1 = array($toti['c_surtida'],$CANT);
		$suma=array_sum($a1);
		//actualizacion del registro
		$builder = $db->table('t_receta');
	    $builder->set('c_surtida',$suma,false);
	    $builder->where('SSA', $SSA);
	    $builder->where('ID_RECETA', $RECETA);
	    $builder->update();	    

    }
}
     //*******************
    //SEGUNDO MEDICAMENTO
   //*******************
    if($request->getPostGet('ref')>=1){
    	$CANT=$request->getPostGet('1');
	    $SSA=$request->getPostGet('11');
	    $RECETA=$request->getPostGet('21');
	    //coneccion a los datos de la base de datos
	    $db = db_connect();
	    //select min de la fecha de caducidad de los ingresos(primer filtro)
	    $builder = $db->table('t_inventario');
	    $builder->selectMin('f_expira');
	    $builder->where('SSA', $SSA);
	    $builder->where('cantidad>', '0');
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	   	//acomoda en un arreglo para la extraccion del dato
	    $tot=$query->getResultArray();
	    foreach($tot as $f_exp){
	    echo $f_exp['f_expira'];}
	    if ($f_exp['f_expira']==''){
    	echo 'nada en caso 12';}
    	else{
	    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
	    echo '..';
	    $builder = $db->table('t_inventario');
	    $builder->select('cantidad');
	    $builder->where('f_expira', $f_exp['f_expira']);
	    $query = $builder->get();
	    //acomoda en un arreglo para la extraccion del dato resultante
	    $tot=$query->getResultArray();
	    foreach($tot as $op1){
	    echo $op1['cantidad'];}
	    //if seleccionador que ejecutara la accion si la cantidad de producto del lote seleccionado
	    //es igual o mayor a la cantidad seleccionada para repartir
	     //-------------------------------------------------------------//
	    //---------------------------CASO NORMAL-----------------------//
	   //-------------------------------------------------------------//
	    if($op1['cantidad']>=$CANT){
	    	$builder = $db->table('t_productos');
		    $builder->select('cant_tot');
		    $builder->where('SSA', $SSA);
		    $query = $builder->get();
		   	//acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['cant_tot'];}
		    //adicion de 2 variables
		    $a = array($toti['cant_tot'],-$CANT);
			$resta=array_sum($a);
			$b = array($op1['cantidad'],-$CANT);
			$restb=array_sum($b);
			//actualizacion del registro
		    $builder = $db->table('t_productos');
		    $builder->set('cant_tot',$resta,false);
		    $builder->where('SSA', $SSA);
		    $builder->update();
		    //actualizacion del registro inventario

		    $builder = $db->table('t_inventario');
		    $builder->set('cantidad',$restb,false);
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $builder->update();
			//conectar y recolectar los valores a insertar
		    $builder = $db->table('t_receta');
		    $builder->select('c_surtida');
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $query = $builder->get();
		    //acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['c_surtida'];}
		    //adicion de 2 variables
		    $a1 = array($toti['c_surtida'],$CANT);
			$suma=array_sum($a1);
			//actualizacion del registro
			$builder = $db->table('t_receta');
		    $builder->set('c_surtida',$suma,false);
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $builder->update();
	    }
	     //-------------------------------------------------------------//
	    //----------------------CASO ESPECIAL--------------------------//
	   //-------------------------------------------------------------//
	    else{
	    	$CANTT=$op1['cantidad'];
	    	$builder = $db->table('t_productos');
		    $builder->select('cant_tot');
		    $builder->where('SSA', $SSA);
		    $query = $builder->get();
		   	//acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['cant_tot'];}
		    //adicion de 2 variables
		    $a = array($toti['cant_tot'],-$CANTT);
			$resta=array_sum($a);
			$b = array($op1['cantidad'],-$CANTT);
			$restb=array_sum($b);
			//actualizacion del registro
		    $builder = $db->table('t_productos');
		    $builder->set('cant_tot',$resta,false);
		    $builder->where('SSA', $SSA);
		    $builder->update();
		    //actualizacion del registro inventario

		    $builder = $db->table('t_inventario');
		    $builder->set('cantidad',$restb,false);
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $builder->update();
			//conectar y recolectar los valores a insertar
		    $builder = $db->table('t_receta');
		    $builder->select('c_surtida');
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $query = $builder->get();
		    //acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['c_surtida'];}
		    //adicion de 2 variables
		    $a1 = array($toti['c_surtida'],$CANTT);
			$suma=array_sum($a1);
			//actualizacion del registro
			$builder = $db->table('t_receta');
		    $builder->set('c_surtida',$suma,false);
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $builder->update();
		     //--------------------------------------------------------------//
		    //----------------------SEGUNDA INSERCIÓN-----------------------//
		   //--------------------------------------------------------------//


		    $C1 = array($CANT,-$CANTT);
			$CANT=array_sum($C1);
		    $builder = $db->table('t_inventario');
		    $builder->selectMin('f_expira');
		    $builder->where('SSA', $SSA);
		    $builder->where('cantidad>', '0');
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		   	//acomoda en un arreglo para la extraccion del dato
		    $tot=$query->getResultArray();
		    foreach($tot as $f_exp){
		    echo $f_exp['f_expira'];}
		    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
		    echo '..';
		    $builder = $db->table('t_inventario');
		    $builder->select('cantidad');
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $query = $builder->get();
		    //acomoda en un arreglo para la extraccion del dato resultante
		    $tot=$query->getResultArray();
		    foreach($tot as $op1){
		    echo $op1['cantidad'];}

			$builder = $db->table('t_productos');
		    $builder->select('cant_tot');
		    $builder->where('SSA', $SSA);
		    $query = $builder->get();
		   	//acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['cant_tot'];}
		    //adicion de 2 variables
		    $a = array($toti['cant_tot'],-$CANT);
			$resta=array_sum($a);
			$b = array($op1['cantidad'],-$CANT);
			$restb=array_sum($b);
			//actualizacion del registro
		    $builder = $db->table('t_productos');
		    $builder->set('cant_tot',$resta,false);
		    $builder->where('SSA', $SSA);
		    $builder->update();
		    //actualizacion del registro inventario

		    $builder = $db->table('t_inventario');
		    $builder->set('cantidad',$restb,false);
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $builder->update();
			//conectar y recolectar los valores a insertar
		    $builder = $db->table('t_receta');
		    $builder->select('c_surtida');
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $query = $builder->get();
		    //acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['c_surtida'];}
		    //adicion de 2 variables
		    $a1 = array($toti['c_surtida'],$CANT);
			$suma=array_sum($a1);
			//actualizacion del registro
			$builder = $db->table('t_receta');
		    $builder->set('c_surtida',$suma,false);
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $builder->update();	    

    	}
    }
    }
     //*******************
    //TERCER  MEDICAMENTO//
   //*******************
    if($request->getPostGet('ref')>=2){
    	$CANT=$request->getPostGet('2');
	    $SSA=$request->getPostGet('12');
	    $RECETA=$request->getPostGet('22');
	    //coneccion a los datos de la base de datos
	    $db = db_connect();
	    //select min de la fecha de caducidad de los ingresos(primer filtro)
	    $builder = $db->table('t_inventario');
	    $builder->selectMin('f_expira');
	    $builder->where('SSA', $SSA);
	    $builder->where('cantidad>', '0');
	    $builder->where('f_expira>', date("Y-m-d"));
	    $query = $builder->get();
	   	//acomoda en un arreglo para la extraccion del dato
	    $tot=$query->getResultArray();
	    foreach($tot as $f_exp){
	    echo $f_exp['f_expira'];}
	    if ($f_exp['f_expira']==''){
    	echo 'nada en caso 12';}
    	else{
	    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
	    echo '..';
	    $builder = $db->table('t_inventario');
	    $builder->select('cantidad');
	    $builder->where('f_expira', $f_exp['f_expira']);
	    $query = $builder->get();
	    //acomoda en un arreglo para la extraccion del dato resultante
	    $tot=$query->getResultArray();
	    foreach($tot as $op1){
	    echo $op1['cantidad'];}
	    //if seleccionador que ejecutara la accion si la cantidad de producto del lote seleccionado
	    //es igual o mayor a la cantidad seleccionada para repartir
	     //-------------------------------------------------------------//
	    //---------------------------CASO NORMAL-----------------------//
	   //-------------------------------------------------------------//
	    if($op1['cantidad']>=$CANT){
	    	$builder = $db->table('t_productos');
		    $builder->select('cant_tot');
		    $builder->where('SSA', $SSA);
		    $query = $builder->get();
		   	//acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['cant_tot'];}
		    //adicion de 2 variables
		    $a = array($toti['cant_tot'],-$CANT);
			$resta=array_sum($a);
			$b = array($op1['cantidad'],-$CANT);
			$restb=array_sum($b);
			//actualizacion del registro
		    $builder = $db->table('t_productos');
		    $builder->set('cant_tot',$resta,false);
		    $builder->where('SSA', $SSA);
		    $builder->update();
		    //actualizacion del registro inventario

		    $builder = $db->table('t_inventario');
		    $builder->set('cantidad',$restb,false);
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $builder->update();
			//conectar y recolectar los valores a insertar
		    $builder = $db->table('t_receta');
		    $builder->select('c_surtida');
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $query = $builder->get();
		    //acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['c_surtida'];}
		    //adicion de 2 variables
		    $a1 = array($toti['c_surtida'],$CANT);
			$suma=array_sum($a1);
			//actualizacion del registro
			$builder = $db->table('t_receta');
		    $builder->set('c_surtida',$suma,false);
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $builder->update();
	    }
	     //-------------------------------------------------------------//
	    //----------------------CASO ESPECIAL--------------------------//
	   //-------------------------------------------------------------//
	    else{
	    	$CANTT=$op1['cantidad'];
	    	$builder = $db->table('t_productos');
		    $builder->select('cant_tot');
		    $builder->where('SSA', $SSA);
		    $query = $builder->get();
		   	//acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['cant_tot'];}
		    //adicion de 2 variables
		    $a = array($toti['cant_tot'],-$CANTT);
			$resta=array_sum($a);
			$b = array($op1['cantidad'],-$CANTT);
			$restb=array_sum($b);
			//actualizacion del registro
		    $builder = $db->table('t_productos');
		    $builder->set('cant_tot',$resta,false);
		    $builder->where('SSA', $SSA);
		    $builder->update();
		    //actualizacion del registro inventario

		    $builder = $db->table('t_inventario');
		    $builder->set('cantidad',$restb,false);
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $builder->update();
			//conectar y recolectar los valores a insertar
		    $builder = $db->table('t_receta');
		    $builder->select('c_surtida');
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $query = $builder->get();
		    //acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['c_surtida'];}
		    //adicion de 2 variables
		    $a1 = array($toti['c_surtida'],$CANTT);
			$suma=array_sum($a1);
			//actualizacion del registro
			$builder = $db->table('t_receta');
		    $builder->set('c_surtida',$suma,false);
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $builder->update();
		     //--------------------------------------------------------------//
		    //----------------------SEGUNDA INSERCIÓN-----------------------//
		   //--------------------------------------------------------------//


		    $C1 = array($CANT,-$CANTT);
			$CANT=array_sum($C1);
		    $builder = $db->table('t_inventario');
		    $builder->selectMin('f_expira');
		    $builder->where('SSA', $SSA);
		    $builder->where('cantidad>', '0');
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		   	//acomoda en un arreglo para la extraccion del dato
		    $tot=$query->getResultArray();
		    foreach($tot as $f_exp){
		    echo $f_exp['f_expira'];}
		    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
		    echo '..';
		    $builder = $db->table('t_inventario');
		    $builder->select('cantidad');
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $query = $builder->get();
		    //acomoda en un arreglo para la extraccion del dato resultante
		    $tot=$query->getResultArray();
		    foreach($tot as $op1){
		    echo $op1['cantidad'];}

			$builder = $db->table('t_productos');
		    $builder->select('cant_tot');
		    $builder->where('SSA', $SSA);
		    $query = $builder->get();
		   	//acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['cant_tot'];}
		    //adicion de 2 variables
		    $a = array($toti['cant_tot'],-$CANT);
			$resta=array_sum($a);
			$b = array($op1['cantidad'],-$CANT);
			$restb=array_sum($b);
			//actualizacion del registro
		    $builder = $db->table('t_productos');
		    $builder->set('cant_tot',$resta,false);
		    $builder->where('SSA', $SSA);
		    $builder->update();
		    //actualizacion del registro inventario

		    $builder = $db->table('t_inventario');
		    $builder->set('cantidad',$restb,false);
		    $builder->where('f_expira', $f_exp['f_expira']);
		    $builder->update();
			//conectar y recolectar los valores a insertar
		    $builder = $db->table('t_receta');
		    $builder->select('c_surtida');
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $query = $builder->get();
		    //acomodar en un arreglo
		    $tot=$query->getResultArray();
		    foreach($tot as $toti){
		    echo $toti['c_surtida'];}
		    //adicion de 2 variables
		    $a1 = array($toti['c_surtida'],$CANT);
			$suma=array_sum($a1);
			//actualizacion del registro
			$builder = $db->table('t_receta');
		    $builder->set('c_surtida',$suma,false);
		    $builder->where('SSA', $SSA);
		    $builder->where('ID_RECETA', $RECETA);
		    $builder->update();	    

    	}
    }
    }
    	
    return redirect()->to(base_url().'/Salidas');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
       
     
  }

 }