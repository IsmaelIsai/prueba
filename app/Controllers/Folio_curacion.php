<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Receta_medModel;

class folio_curacion extends BaseController
{
	protected $catálogo;

	 public function __construct()
    {

        $this->catálogo = new Receta_medModel();
    }

	public function index()
	{	$session = session();
        if ( $session->has('CURP') and $session->ID_C ==1 and $session->Status ==1)
        {
        $db = db_connect();
	    $builder = $db->table('t_rcmc');
	 	$builder->selectMax('ID_RCMC');
		$rem= $builder->get();
		$rem=$rem->getResultArray();
		$cur = ['rer' => $rem];
	
		echo view('header');
		echo view('Curacion/folio_curacion', $cur);
		echo view('footer');
	}elseif ( $session->has('CURP') and $session->ID_C ==7 and $session->Status ==1)
        {
        $db = db_connect();
	    $builder = $db->table('t_rcmc');
	 	$builder->selectMax('ID_RCMC');
		$rem= $builder->get();
		$rem=$rem->getResultArray();
		$cur = ['rer' => $rem];
	
		echo view('header_Enfermera');
		echo view('Curacion/folio_curacion', $cur);
		echo view('footer');
	}
    else{
        $session->destroy();
        return redirect()->to(base_url() . '/Login');
    }

	}
}