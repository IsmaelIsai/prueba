<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IngresoModel;
use App\Models\IngresotempModel;
use App\Models\ProveedorModel;
use App\Models\CatalogoModel;


class Ingreso extends BaseController
{

    protected $ingreso, $provedor, $catálogo;

    public function __construct()
    {

        $this->ingreso = new IngresoModel();
        $this->ingresotemp = new IngresotempModel();
        $this->provedor = new ProveedorModel();
        $this->catálogo = new CatalogoModel();
        
    }

    public function index()
    {
      $session = session();
        if ($session->has('CURP') and $session->ID_C ==1 and $session->Status ==1)
        {
        $db = db_connect();
        $builder = $db->table('t_ingreso');
        $builder->join('t_productos','t_ingreso.SSA=t_productos.SSA');
        $query = $builder->get();
        $ingreso=$query->getResultArray();
        $dataing = ['titulo' => 'Ingreso productos', 'dataingr' => $ingreso ];
        
        echo view ('header');
        echo view ('Ingreso/ingreso', $dataing);
        echo view ('footer');
    }elseif ($session->has('CURP') and $session->ID_C ==4 and $session->Status ==1)
        {
        $db = db_connect();
        $builder = $db->table('t_ingreso');
        $builder->join('t_productos','t_ingreso.SSA=t_productos.SSA');
        $query = $builder->get();
        $ingreso=$query->getResultArray();
        $dataing = ['titulo' => 'Ingreso productos', 'dataingr' => $ingreso ];
        
        echo view ('header_Almacen');
        echo view ('Ingreso/ingreso', $dataing);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
       

    }
      
    public function  agregar_masproduct ()
     {
      $session = session();
        if ($session->has('CURP'))
        {
        $provedor = $this->provedor->findAll();
        $catálogo = $this->catálogo->findAll();
        $data = ['titulo' => 'Ingreso nuevo', 'provedor' => $provedor, 'catálogo' => $catálogo];
        
        echo view ('header');
        echo view ('Ingreso/ingreso', $data);
        echo view ('footer');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        

     }

    public function insertar(){
      $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $IngresoModel=new IngresoModel($db);
        $IngresotempModel=new IngresotempModel($db);
    $request= \Config\Services::request();
    $dat=array(
      'SSA'=>$request->getPostGet('SSA'),
            'f_entrada'=>$request->getPostGet('f_entrada'),
            'f_expira'=>$request->getPostGet('f_expira'),
            'lote'=>$request->getPostGet('lote'),
            'cantidad'=>$request->getPostGet('cantidad'),
            'ID_PROV'=>$request->getPostGet('ID_PROV'),
            'folio_ing'=>$request->getPostGet('folio_ing'),

            
                );
    if($IngresoModel->insert($dat)===false){
            var_dump($IngresoModel->errors());
            }
    $dat=array(
            'SSA'=>$request->getPostGet('SSA'),
            'Lote'=>$request->getPostGet('lote'),
            'cantidad'=>$request->getPostGet('cantidad'),
            'f_expira'=>$request->getPostGet('f_expira'),
                );
    if($IngresotempModel->insert($dat)===false){
            var_dump($IngresotempModel->errors());
            }

    $SSA_pro=$request->getPostGet('SSA');
    $cantidad_pro=$request->getPostGet('cantidad');

    $db = db_connect();
    $builder = $db->table('t_productos');
    $builder->select('cant_tot');
    $builder->where('SSA', $SSA_pro);
    $query = $builder->get();
    
    $tot=$query->getResultArray();
    foreach($tot as $tott){
    echo $tott['cant_tot'];}
    $suma=$tott['cant_tot']+$cantidad_pro;

    $builder = $db->table('t_productos');
    $builder->set('cant_tot',$suma,false);
    $builder->where('SSA', $SSA_pro);
    $builder->update();
    return redirect()->to(base_url().'/Ingreso');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }

        
     }

     public function  editar ($ID_INGRESO)

     {
      $session = session();
        if ($session->has('CURP'))
        {
        $ingre = $this->ingreso->where('ID_INGRESO',$ID_INGRESO)->first();
        $data = ['titulo' => 'Editar', 'datos' => $ingre];

        echo view ('Ingreso/ingreso', $data);
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
        
   
     }

     public function actualizar(){
      $session = session();
        if ($session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==4) and $session->Status ==1)
        {
        $this->ingreso->update($this->request->getPost('ID_INGRESO'), ['F_expira' => $this->request->getPost('F_expira'), 
     'lote' => $this->request->getPost('lote'), 'cantidad' => $this->request->getPost('cantidad')]);

return redirect()->to(base_url().'/Ingreso');
    }
    else{
        return redirect()->to(base_url() . '/Login');
    }
       
     
  }

}