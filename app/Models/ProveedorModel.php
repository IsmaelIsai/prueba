<?php

namespace App\Models;

use CodeIgniter\Model;

class ProveedorModel extends Model
{

    protected $table      = 't_provedor';
    protected $primaryKey = 'ID_PROV';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ID_PROV','nom_prov', 'ape_prov', 'edad_prov', 'tel_prov', 'correo_prov', 'empresa_prov'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>