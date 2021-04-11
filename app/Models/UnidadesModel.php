<?php

namespace App\Models;
use CodeIgniter\Model;

class UnidadesModel extends Model
{
    protected $table      = 't_cargo';
    protected $primaryKey = 'id_c';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['roll'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_ingresar';
    protected $updatedField  = 'fecha_editar';
    protected $deletedField  = 'fecha_eliminar';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    /* protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  */
}

?>