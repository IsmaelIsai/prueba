<?php

namespace App\Models;

use CodeIgniter\Model;

class Receta_medModel extends Model
{

    protected $table      = 't_receta';
    protected $primaryKey = 'CONTADOR';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ID_RECETA','nom_pac', 'ID_SER', 'pob_aten', 'num_exp', 'edad_pac', 'sexo_pac', 'CURP_P','FOLIO_R', 'SSA','lote','f_expira', 'c_solicitada', 'CURP', 'c_surtida', 'turno'];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

?>