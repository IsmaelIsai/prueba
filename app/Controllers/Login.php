<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
	
	$session = session();
        if ($session->has('CURP'))
        {
        	if ($session->ID_C == 1)
        {
        return redirect()->to(base_url() . '/Home');
    }
    else{
    	echo view('login');
    }
}
    else{
       	echo view('login');
    }


	}

	public function error()
	{
		$data['error'] = "La contraseña es incorrecta";
                    echo view('login', $data);
		

	}

	//--------------------------------------------------------------------
 }
