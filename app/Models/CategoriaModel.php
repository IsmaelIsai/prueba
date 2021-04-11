<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{

    protected $table      = 't_categoria';
    protected $primaryKey = 'ID_CAT';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cat'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>