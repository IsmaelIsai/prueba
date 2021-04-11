<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicamentosModel extends Model
{

    protected $table      = 't_rcm';
    protected $primaryKey = 'ID_RCM';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ID_RCM','turno', 'SSA', 'c_solicitada','c_surtida','CURP','ID_SER','ID_JEFE'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}

?>