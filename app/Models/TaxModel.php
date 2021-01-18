<?php namespace App\Models;

use CodeIgniter\Model;

class TaxModel extends Model
{
    protected $table      = 'sgp_taxes';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'description', 'value', 'state'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

/* End of file TaxModel.php */
/* Location: ./app/Models/TaxModel.php */