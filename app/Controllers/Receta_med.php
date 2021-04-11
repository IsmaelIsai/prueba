<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Receta_medModel;

class Receta_med extends BaseController
{
    public function __construct()
    {

        $this->Receta_med1 = new Receta_medModel();
    }
	public function index()
	{
		
		$session = session();
        if ( $session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
        echo view('header');
		echo view('Receta_med/receta_med');
		echo view('footer');

        }elseif ( $session->has('CURP') and $session->ID_C ==6  and $session->Status ==1)
        {
        echo view('header_Doctor');
        echo view('Receta_med/receta_med');
        echo view('footer');

        }
    else{
        $session->destroy();
        return redirect()->to(base_url() . '/Login');
        }
    }
	public function insertar(){
      $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==6) and $session->Status ==1)
        {
        $Receta_med=new Receta_medModel($db);
        $request= \Config\Services::request();
        $check1=$request->getPostGet('checkbox1');
        $check2=$request->getPostGet('checkbox2');
        $folio=date("YmdHis");
        $dat=array(
                'ID_RECETA'=>$folio,
          		'nom_pac'=>$request->getPostGet('nom_pac'),
                'ID_SER'=>$request->getPostGet('ID_SER'),
                'pob_aten'=>$request->getPostGet('pob_aten'),
                'num_exp'=>$request->getPostGet('num_exp'),
                'edad_pac'=>$request->getPostGet('edad_pac'),
                'sexo_pac'=>$request->getPostGet('sexo_pac'),
                'diag_pac'=>$request->getPostGet('diag_pac'),
                'SSA'=>$request->getPostGet('SSA'),
                'c_solicitada'=>$request->getPostGet('c_solicitada'),
                'CURP'=>$session->CURP,
                'indicaciones'=>$request->getPostGet('indicaciones'),
                //'c_surtida'=>$request->getPostGet('c_surtida'),
                //'ID_JEFE'=>$request->getPostGet('ID_JEFE'),
                    );
    if ($check1=="on"){
        $dat1=array(
            'ID_RECETA'=>$folio,
            'nom_pac'=>$request->getPostGet('nom_pac'),
            'ID_SER'=>$request->getPostGet('ID_SER'),
            'pob_aten'=>$request->getPostGet('pob_aten'),
            'num_exp'=>$request->getPostGet('num_exp'),
            'edad_pac'=>$request->getPostGet('edad_pac'),
            'sexo_pac'=>$request->getPostGet('sexo_pac'),
            'diag_pac'=>$request->getPostGet('diag_pac'),
            'SSA'=>$request->getPostGet('SSA2'),
            'c_solicitada'=>$request->getPostGet('c_solicitada2'),
            'CURP'=>$session->CURP,
            'indicaciones'=>$request->getPostGet('indicaciones2'),
            //'c_surtida'=>$request->getPostGet('c_surtida'),
            //'ID_JEFE'=>$request->getPostGet('ID_JEFE'),
                );
        if($Receta_med->insert($dat1)===false){
            var_dump($Receta_med->errors());
            }
    }
    if ($check2=="on"){
        $dat2=array(
            'ID_RECETA'=>$folio,
            'nom_pac'=>$request->getPostGet('nom_pac'),
            'ID_SER'=>$request->getPostGet('ID_SER'),
            'pob_aten'=>$request->getPostGet('pob_aten'),
            'num_exp'=>$request->getPostGet('num_exp'),
            'edad_pac'=>$request->getPostGet('edad_pac'),
            'sexo_pac'=>$request->getPostGet('sexo_pac'),
            'diag_pac'=>$request->getPostGet('diag_pac'),
            'SSA'=>$request->getPostGet('SSA3'),
            'c_solicitada'=>$request->getPostGet('c_solicitada3'),
            'CURP'=>$session->CURP,
            'indicaciones'=>$request->getPostGet('indicaciones3'),
            //'c_surtida'=>$request->getPostGet('c_surtida'),
            //'ID_JEFE'=>$request->getPostGet('ID_JEFE'),
                );
        if($Receta_med->insert($dat2)===false){
            var_dump($Receta_med->errors());
            }
    }

    if($Receta_med->insert($dat)===false){
            var_dump($Receta_med->errors());
            }
    $this->Receta_med1->update($this->request->getPost('ID_RECETA'), [
            'ID_SER' => $this->request->getPost('ID_SER')
        ]);

        return redirect()->to(base_url().'/Folio_receta');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
     }

	//--------------------------------------------------------------------
 }
