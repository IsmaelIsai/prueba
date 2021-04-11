<?php

namespace App\Models;

use CodeIgniter\Model;

class CargoModel extends Model
{

    protected $table      = 't_cargo';
    protected $primaryKey = 'ID_C';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['roll'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>