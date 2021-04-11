<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{

    protected $table      = 't_personal';
    protected $primaryKey = 'CURP';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['CURP', 'ID_C', 'cedu_per', 'nom_per', 'ape_per', 'correo_per', 'edad_per', 'contra_per','Status'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>