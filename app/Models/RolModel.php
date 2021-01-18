<?php namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table      = 'sgp_roles';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'description', 'state'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

/* End of file RolModel.php */
/* Location: ./app/Models/RolModel.php */