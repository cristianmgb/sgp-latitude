<?php namespace App\Models;

use CodeIgniter\Model;

class ContractorModel extends Model
{
    protected $table      = 'sgp_contractors';
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

/* End of file ContractorModel.php */
/* Location: ./app/Models/ContractorModel.php */