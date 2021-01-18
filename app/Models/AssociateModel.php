<?php namespace App\Models;

use CodeIgniter\Model;

class AssociateModel extends Model
{
    protected $table      = 'sgp_associates';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['first_name', 'last_name', 'email', 'phone', 'state'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

/* End of file AssociateModel.php */
/* Location: ./app/Models/AssociateModel.php */