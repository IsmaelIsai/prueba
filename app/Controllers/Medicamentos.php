<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedicamentosModel;

class Medicamentos extends BaseController
{
    
    public function index()
    {
        
        $session = session();
        if ( $session->has('CURP') and $session->ID_C ==1  and $session->Status ==1)
        {    
        echo view('header');
        echo view('Medicamentos/medicamentos');
        echo view('footer');

        }
        elseif ( $session->has('CURP') and $session->ID_C ==7  and $session->Status ==1)
        {    
        echo view('header_Enfermera');
        echo view('Medicamentos/medicamentos');
        echo view('footer');

        }
    else{
        $session->destroy();
        return redirect()->to(base_url() . '/Login');
        }
    }
    public function insertar(){
      $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==7) and $session->Status ==1)
        {
        $Receta_med=new MedicamentosModel($db);
        $request= \Config\Services::request();
        $check1=$request->getPostGet('checkbox1');
        $check2=$request->getPostGet('checkbox2');
        $check3=$request->getPostGet('checkbox3');
        $check4=$request->getPostGet('checkbox4');
        $check5=$request->getPostGet('checkbox5');
        $check6=$request->getPostGet('checkbox6');
        $check7=$request->getPostGet('checkbox7');
        $check8=$request->getPostGet('checkbox8');
        $check9=$request->getPostGet('checkbox9');
        $check10=$request->getPostGet('checkbox10');
        $check11=$request->getPostGet('checkbox11');

        $folio=date("YmdHis");
        $dat=array(
                'ID_RCM'=>$folio,
                'turno'=>$request->getPostGet('turno'),
                'SSA'=>$request->getPostGet('SSA'),
                'c_solicitada'=>$request->getPostGet('c_solicitada'),
                'CURP'=>$session->CURP,
                'ID_SER'=>$request->getPostGet('servicio'),
                    );
        

        if ($check1=="on"){
            $dat1=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA2'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada2'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat1)===false){
                var_dump($Receta_med->errors());
                }
        }
        if ($check2=="on"){
            $dat2=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA3'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada3'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat2)===false){
                var_dump($Receta_med->errors());
                }
        }
        if ($check3=="on"){
            $dat3=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA4'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada4'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat3)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check4=="on"){
            $dat4=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA5'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada5'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat4)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check5=="on"){
            $dat5=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA6'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada6'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat5)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check6=="on"){
            $dat6=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA7'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada7'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat6)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check7=="on"){
            $dat7=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA8'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada8'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat7)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check8=="on"){
            $dat8=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA9'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada9'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat8)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check9=="on"){
            $dat9=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA10'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada10'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat9)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check10=="on"){
            $dat10=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA11'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada11'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat10)===false){
                var_dump($Receta_med->errors());
                }
        }if ($check11=="on"){
            $dat11=array(
                    'ID_RCM'=>$folio,
                    'turno'=>$request->getPostGet('turno'),
                    'SSA'=>$request->getPostGet('SSA12'),
                    'c_solicitada'=>$request->getPostGet('c_solicitada12'),
                    'CURP'=>$session->CURP,
                    'ID_SER'=>$request->getPostGet('servicio'),
                        );
            if($Receta_med->insert($dat11)===false){
                var_dump($Receta_med->errors());
                }
    }
        if($Receta_med->insert($dat)===false){
            var_dump($Receta_med->errors());
            }

        return redirect()->to(base_url().'/Folio_medicamentos');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
     }

    //--------------------------------------------------------------------
 }
