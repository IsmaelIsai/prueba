<?php

namespace App\Models;

use CodeIgniter\Model;

class CuracionModel extends Model
{

    protected $table      = 't_rcmc';
    protected $primaryKey = 'ID_RCMC';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ID_RCMC','turno', 'SSA', 'c_solicitada','c_surtida','CURP','ID_SER','ID_JEFE'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>