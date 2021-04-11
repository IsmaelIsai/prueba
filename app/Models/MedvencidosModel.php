<?php

namespace App\Models;

use CodeIgniter\Model;

class MedvencidosModel extends Model
{

    protected $table      = 't_ingreso';
    protected $primaryKey = 'ID_INGRESO';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['SSA', 'f_entrada', 'f_expira', 'lote', 'cantidad', 'ID_PROV'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>