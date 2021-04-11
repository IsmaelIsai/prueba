<?php 
namespace App\Controllers;

use App\Models\Receta_medModel;
use App\Models\CuracionModel;
use App\Models\MedicamentosModel;
use App\Models\CatalogoModel;

class S_curacion extends BaseController
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
	    $builder = $db->table('t_rcmc');
	    $builder->select('ID_RCMC,desc_produc,t_rcmc.SSA,c_solicitada,cant_tot,c_surtida');
	    $builder->join('t_productos','t_rcmc.SSA=t_productos.SSA');
	    $builder->where('ID_RCMC', $SSA_pro);
	    $query = $builder->get();
	    //SELECT ID_RCMC,t_rcmc.SSA,c_solicitada,SUM(cantidad),c_surtida FROM `t_rcmc` INNER JOIN `t_inventario` ON t_rcmc.SSA=t_inventario.SSA WHERE ID_RCMC ='20210211101456' AND t_rcmc.SSA='010.000.0106.00' AND f_expira>'2021-02-19'
	    $tot=$query->getResultArray();
	    $guia=$tot;
	    $ins=0;
	    $name1='';
	    $name2='';
	    $name3='';
	    $name4='';
	    $name5='';
	    $name6='';
	    $name7='';
	    $name8='';
	    $name9='';
	    $name10='';
	    $name11='';
	    $name12='';
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
	   		elseif ($ins==3) {
	   			$name4=$totall['SSA'];
	   		}
	   		elseif($ins==4){
	   			$name5=$totall['SSA'];
	   		}
	   		elseif ($ins==5) {
	   			$name6=$totall['SSA'];
	   		}
	   		elseif($ins==6){
	   			$name7=$totall['SSA'];
	   		}
	   		elseif ($ins==7) {
	   			$name8=$totall['SSA'];
	   		}
	   		elseif($ins==8){
	   			$name9=$totall['SSA'];
	   		}
	   		elseif ($ins==9) {
	   			$name10=$totall['SSA'];
	   		}
	   		elseif($ins==10){
	   			$name11=$totall['SSA'];
	   		}
	   		elseif ($ins==11) {
	   			$name12=$totall['SSA'];
	   		}
	   		$ins=$ins+1;
	   	}
	   //CASO 1//
	   if(count($guia)==1){
		   	$builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
	    }		
		//CASO 2//
	    if(count($guia)==2){

		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
	    //CASO 4//
	    if(count($guia)==4){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres);
	    }
		//CASO 5//
		if(count($guia)==5){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro);
	    }
		//CASO 6//
		if(count($guia)==6){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco);
	    }
		//CASO 7//
		if(count($guia)==7){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis);
	    }
		//CASO 8//
		if(count($guia)==8){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete);
	    }
		//CASO 9//
		if(count($guia)==9){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho);
	    }
		//CASO 10//
		if(count($guia)==10){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
			//DIEZ
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name10);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$nueve=$guia[9];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$nueve=array_replace($nueve, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$nueve=array_replace($nueve, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name10);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve);
	    }
		//CASO 11//
		if(count($guia)==11){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
			//DIEZ
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name10);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$nueve=$guia[9];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$nueve=array_replace($nueve, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$nueve=array_replace($nueve, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name10);
		    $builder->update();
			//ONCE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name11);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$diez=$guia[10];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$diez=array_replace($diez, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$diez=array_replace($diez, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name11);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez);
	    }
		//CASO 12//
		if(count($guia)==12){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
			//DIEZ
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name10);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$nueve=$guia[9];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$nueve=array_replace($nueve, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$nueve=array_replace($nueve, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name10);
		    $builder->update();
			//ONCE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name11);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$diez=$guia[10];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$diez=array_replace($diez, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$diez=array_replace($diez, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name11);
		    $builder->update();
			//ONCE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name12);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$once=$guia[11];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$once=array_replace($once, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$once=array_replace($once, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name12);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once);
	    }

		$dataing = ['titulo' => 'Despacho de material', 'datos' => $tot ];

		echo view('header');
		echo view('Salidas/curacion', $dataing);
		echo view('footer');
	}elseif ($session->has('CURP') and $session->ID_C ==2  and $session->Status ==1)
        {
		$request= \Config\Services::request();
        $SSA_pro=$request->getPostGet('a');
        if($SSA_pro==''){
        	return redirect()->to(base_url().'/Salidas');
        }
        $db = db_connect();
	    $builder = $db->table('t_rcmc');
	    $builder->select('ID_RCMC,desc_produc,t_rcmc.SSA,c_solicitada,cant_tot,c_surtida');
	    $builder->join('t_productos','t_rcmc.SSA=t_productos.SSA');
	    $builder->where('ID_RCMC', $SSA_pro);
	    $query = $builder->get();
	    //SELECT ID_RCMC,t_rcmc.SSA,c_solicitada,SUM(cantidad),c_surtida FROM `t_rcmc` INNER JOIN `t_inventario` ON t_rcmc.SSA=t_inventario.SSA WHERE ID_RCMC ='20210211101456' AND t_rcmc.SSA='010.000.0106.00' AND f_expira>'2021-02-19'
	    $tot=$query->getResultArray();
	    $guia=$tot;
	    $ins=0;
	    $name1='';
	    $name2='';
	    $name3='';
	    $name4='';
	    $name5='';
	    $name6='';
	    $name7='';
	    $name8='';
	    $name9='';
	    $name10='';
	    $name11='';
	    $name12='';
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
	   		elseif ($ins==3) {
	   			$name4=$totall['SSA'];
	   		}
	   		elseif($ins==4){
	   			$name5=$totall['SSA'];
	   		}
	   		elseif ($ins==5) {
	   			$name6=$totall['SSA'];
	   		}
	   		elseif($ins==6){
	   			$name7=$totall['SSA'];
	   		}
	   		elseif ($ins==7) {
	   			$name8=$totall['SSA'];
	   		}
	   		elseif($ins==8){
	   			$name9=$totall['SSA'];
	   		}
	   		elseif ($ins==9) {
	   			$name10=$totall['SSA'];
	   		}
	   		elseif($ins==10){
	   			$name11=$totall['SSA'];
	   		}
	   		elseif ($ins==11) {
	   			$name12=$totall['SSA'];
	   		}
	   		$ins=$ins+1;
	   	}
	   //CASO 1//
	   if(count($guia)==1){
		   	$builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
	    }		
		//CASO 2//
	    if(count($guia)==2){

		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
	    //CASO 4//
	    if(count($guia)==4){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres);
	    }
		//CASO 5//
		if(count($guia)==5){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro);
	    }
		//CASO 6//
		if(count($guia)==6){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco);
	    }
		//CASO 7//
		if(count($guia)==7){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis);
	    }
		//CASO 8//
		if(count($guia)==8){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete);
	    }
		//CASO 9//
		if(count($guia)==9){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho);
	    }
		//CASO 10//
		if(count($guia)==10){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
			//DIEZ
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name10);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$nueve=$guia[9];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$nueve=array_replace($nueve, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$nueve=array_replace($nueve, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name10);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve);
	    }
		//CASO 11//
		if(count($guia)==11){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
			//DIEZ
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name10);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$nueve=$guia[9];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$nueve=array_replace($nueve, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$nueve=array_replace($nueve, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name10);
		    $builder->update();
			//ONCE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name11);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$diez=$guia[10];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$diez=array_replace($diez, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$diez=array_replace($diez, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name11);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez);
	    }
		//CASO 12//
		if(count($guia)==12){
	    	//uno
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name1);
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
		    //dos
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name2);
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
		    //tres
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name3);
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
			//cuatro
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name4);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$tres=$guia[3];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$tres=array_replace($tres, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$tres=array_replace($tres, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name4);
		    $builder->update();
			//CINCO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name5);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cuatro=$guia[4];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cuatro=array_replace($cuatro, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cuatro=array_replace($cuatro, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name5);
		    $builder->update();
			//SEIS
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name6);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$cinco=$guia[5];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$cinco=array_replace($cinco, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$cinco=array_replace($cinco, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name6);
		    $builder->update();
			//SIETE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name7);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$seis=$guia[6];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$seis=array_replace($seis, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$seis=array_replace($seis, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name7);
		    $builder->update();
			//OCHO
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name8);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$siete=$guia[7];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$siete=array_replace($siete, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$siete=array_replace($siete, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name8);
		    $builder->update();
			//NUEVE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name9);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$ocho=$guia[8];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$ocho=array_replace($ocho, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$ocho=array_replace($ocho, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name9);
		    $builder->update();
			//DIEZ
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name10);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$nueve=$guia[9];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$nueve=array_replace($nueve, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$nueve=array_replace($nueve, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name10);
		    $builder->update();
			//ONCE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name11);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$diez=$guia[10];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$diez=array_replace($diez, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$diez=array_replace($diez, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name11);
		    $builder->update();
			//ONCE
		    $builder = $db->table('t_rcmc');
		    $builder->select('SUM(cantidad) t');
		    $builder->join('t_inventario','t_rcmc.SSA=t_inventario.SSA');
		    $builder->where('ID_RCMC', $SSA_pro);
		    $builder->where('t_rcmc.SSA', $name12);
		    $builder->where('f_expira>', date("Y-m-d"));
		    $query = $builder->get();
		    $consul=$query->getResultArray();
		    foreach($consul as $consull){
		   	}
		   	$once=$guia[11];
		    $rem=array("cant_tot"=> $consull['t']);
		   	$once=array_replace($once, $rem );

		    if($consull['t']==NULL){
		    	$rem=array("cant_tot"=> "0");
		   		$once=array_replace($once, $rem );
		    }
		   	$builder = $db->table('t_productos');
		    $builder->set('cant_tot',$consull['t']);
		    $builder->where('SSA', $name12);
		    $builder->update();
		    $tot=array($cero,$uno,$dos,$tres,$cuatro,$cinco,$seis,$siete,$ocho,$nueve,$diez,$once);
	    }

		$dataing = ['titulo' => 'Despacho de material', 'datos' => $tot ];

		echo view('header_Capturista');
		echo view('Salidas/curacion', $dataing);
		echo view('footer');
	}
    else{
        return redirect()->to(base_url() . '/Login');
    }

    }
    


	public function actualizar()
	{
		$session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==2) and $session->Status ==1)
        {
        	//recoleccion de datos de la pagina de reparto de medicamentos
	    	$request= \Config\Services::request();
	    	$CANT=$request->getPostGet('0');
		    $SSA=$request->getPostGet('12');
		    $RECETA=$request->getPostGet('24');
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
    			echo $f_exp['f_expira'];
    		}
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
				    $builder = $db->table('t_rcmc');
				    $builder->select('c_surtida');
				    $builder->where('SSA', $SSA);
				    $builder->where('ID_RCMC', $RECETA);
				    $query = $builder->get();
				    //acomodar en un arreglo
				    $tot=$query->getResultArray();
				    foreach($tot as $toti){
				    echo $toti['c_surtida'];}
				    //adicion de 2 variables
				    $a1 = array($toti['c_surtida'],$CANT);
					$suma=array_sum($a1);
					//actualizacion del registro
					$builder = $db->table('t_rcmc');
				    $builder->set('c_surtida',$suma,false);
				    $builder->where('SSA', $SSA);
				    $builder->where('ID_RCMC', $RECETA);
				    $builder->update();
			    }
     //-------------------------------------------------------------//
    //----------------------CASO ESPECIAL--------------------------//
   //-------------------------------------------------------------//
			    else
			    {
			    	$CANTT=$op1['cantidad'];
			    	$builder = $db->table('t_productos');
				    $builder->select('cant_tot');
				    $builder->where('SSA', $SSA);
				    $query = $builder->get();
				   	//acomodar en un arreglo
				    $tot=$query->getResultArray();
				    foreach($tot as $toti){
				    	echo $toti['cant_tot'];
				    }
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
				    $builder = $db->table('t_rcmc');
				    $builder->select('c_surtida');
				    $builder->where('SSA', $SSA);
				    $builder->where('ID_RCMC', $RECETA);
				    $query = $builder->get();
				    //acomodar en un arreglo
				    $tot=$query->getResultArray();
				    foreach($tot as $toti){
				    	echo $toti['c_surtida'];
				    }
				    //adicion de 2 variables
				    $a1 = array($toti['c_surtida'],$CANTT);
					$suma=array_sum($a1);
					//actualizacion del registro
					$builder = $db->table('t_rcmc');
				    $builder->set('c_surtida',$suma,false);
				    $builder->where('SSA', $SSA);
				    $builder->where('ID_RCMC', $RECETA);
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
				    	echo $f_exp['f_expira'];
				    }
				    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
				    echo '..';
				    $builder = $db->table('t_inventario');
				    $builder->select('cantidad');
				    $builder->where('f_expira', $f_exp['f_expira']);
				    $query = $builder->get();
				    //acomoda en un arreglo para la extraccion del dato resultante
				    $tot=$query->getResultArray();
				    foreach($tot as $op1){
				    	echo $op1['cantidad'];
				    }

					$builder = $db->table('t_productos');
				    $builder->select('cant_tot');
				    $builder->where('SSA', $SSA);
				    $query = $builder->get();
				   	//acomodar en un arreglo
				    $tot=$query->getResultArray();
				    foreach($tot as $toti){
				    	echo $toti['cant_tot'];
				    }
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
				    $builder = $db->table('t_rcmc');
				    $builder->select('c_surtida');
				    $builder->where('SSA', $SSA);
				    $builder->where('ID_RCMC', $RECETA);
				    $query = $builder->get();
				    //acomodar en un arreglo
				    $tot=$query->getResultArray();
				    foreach($tot as $toti){
				    	echo $toti['c_surtida'];
				    }
				    //adicion de 2 variables
				    $a1 = array($toti['c_surtida'],$CANT);
					$suma=array_sum($a1);
					//actualizacion del registro
					$builder = $db->table('t_rcmc');
				    $builder->set('c_surtida',$suma,false);
				    $builder->where('SSA', $SSA);
				    $builder->where('ID_RCMC', $RECETA);
				    $builder->update();	    
				}
			}
			     //*******************
			    //SEGUNDO MEDICAMENTO
			   //*******************
    		if($request->getPostGet('ref')>=1){
		    	$CANT=$request->getPostGet('1');
			    $SSA=$request->getPostGet('13');
			    $RECETA=$request->getPostGet('25');
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
	    			echo $f_exp['f_expira'];
	    		}
	    		if ($f_exp['f_expira']==''){
    				echo 'nada en caso 12';
    			}
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
				    	echo $op1['cantidad'];
					}
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    

			    	}
			    }
    		}
		     //*******************
		    //TERCER  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=2){
    			$CANT=$request->getPostGet('2');
			    $SSA=$request->getPostGet('14');
			    $RECETA=$request->getPostGet('26');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    	     //*******************
		    //CUARTO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=3){
    			$CANT=$request->getPostGet('3');
			    $SSA=$request->getPostGet('15');
			    $RECETA=$request->getPostGet('27');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //CQUINTO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=4){
    			$CANT=$request->getPostGet('4');
			    $SSA=$request->getPostGet('16');
			    $RECETA=$request->getPostGet('28');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //SEXTO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=5){
    			$CANT=$request->getPostGet('5');
			    $SSA=$request->getPostGet('17');
			    $RECETA=$request->getPostGet('29');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //SEPTIMO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=6){
    			$CANT=$request->getPostGet('6');
			    $SSA=$request->getPostGet('18');
			    $RECETA=$request->getPostGet('30');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //OCTAVO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=7){
    			$CANT=$request->getPostGet('7');
			    $SSA=$request->getPostGet('19');
			    $RECETA=$request->getPostGet('31');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //NOVENO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=8){
    			$CANT=$request->getPostGet('8');
			    $SSA=$request->getPostGet('20');
			    $RECETA=$request->getPostGet('32');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //DECIMO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=9){
    			$CANT=$request->getPostGet('9');
			    $SSA=$request->getPostGet('21');
			    $RECETA=$request->getPostGet('33');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //ONCEAVO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=10){
    			$CANT=$request->getPostGet('10');
			    $SSA=$request->getPostGet('22');
			    $RECETA=$request->getPostGet('34');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $builder->update();	    
					}
    			}
    		}
    		 //*******************
		    //DOCEAVO  MEDICAMENTO//
		   //*******************
    		if($request->getPostGet('ref')>=11){
    			$CANT=$request->getPostGet('11');
			    $SSA=$request->getPostGet('23');
			    $RECETA=$request->getPostGet('35');
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
			    	echo $f_exp['f_expira'];
			    }
			    if ($f_exp['f_expira']==''){
		    		echo 'nada en caso 12';
		    	}
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
				    	echo $op1['cantidad'];
				    }
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANTT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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
					    	echo $f_exp['f_expira'];
					    }
					    //SEGUNDA BUSQUEDA de cantidad del lote seleccionado con el select min de la primera busqueda
					    echo '..';
					    $builder = $db->table('t_inventario');
					    $builder->select('cantidad');
					    $builder->where('f_expira', $f_exp['f_expira']);
					    $query = $builder->get();
					    //acomoda en un arreglo para la extraccion del dato resultante
					    $tot=$query->getResultArray();
					    foreach($tot as $op1){
					    	echo $op1['cantidad'];
					    }

						$builder = $db->table('t_productos');
					    $builder->select('cant_tot');
					    $builder->where('SSA', $SSA);
					    $query = $builder->get();
					   	//acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['cant_tot'];
					    }
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
					    $builder = $db->table('t_rcmc');
					    $builder->select('c_surtida');
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
					    $query = $builder->get();
					    //acomodar en un arreglo
					    $tot=$query->getResultArray();
					    foreach($tot as $toti){
					    	echo $toti['c_surtida'];
					    }
					    //adicion de 2 variables
					    $a1 = array($toti['c_surtida'],$CANT);
						$suma=array_sum($a1);
						//actualizacion del registro
						$builder = $db->table('t_rcmc');
					    $builder->set('c_surtida',$suma,false);
					    $builder->where('SSA', $SSA);
					    $builder->where('ID_RCMC', $RECETA);
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