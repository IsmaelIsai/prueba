<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarioModel extends Model
{

    protected $table      = 't_inventario';
    protected $primaryKey = 'id_inven';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['SSA', 'Lote', 'cantidad', 'f_expira'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>