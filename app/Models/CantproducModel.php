<?php

namespace App\Models;

use CodeIgniter\Model;

class CantproducModel extends Model
{

    protected $table      = 't_cantproduc';
    protected $primaryKey = 'SSA';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['SSA', 'cant_cant'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    

}

?>