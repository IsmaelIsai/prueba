<?php 
namespace App\Controllers;

use App\Models\Receta_medModel;
use App\Models\CuracionModel;
use App\Models\MedicamentosModel;

class Salidas extends BaseController
{
	
		protected $recetamed, $curacion , $medicamentos;
	
		public function __construct()
		{
	
			$this->recetamed = new Receta_medModel();
			$this->curacion = new CuracionModel();
			$this->medicamentos = new MedicamentosModel();

			}
	public function index()
	{	
		$session = session();
        if ($session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {
		echo view('header');
		echo view('Salidas/salidas');
		echo view('footer');
		}elseif ($session->has('CURP') and $session->ID_C ==2  and $session->Status ==1)
        {
		echo view('header_Capturista');
		echo view('Salidas/salidas');
		echo view('footer');
		}else{
        return redirect()->to(base_url() . '/Login');
    	}
    }
    	//--------------------------------------------------------------------
 }
