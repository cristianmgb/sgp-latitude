<?php namespace App\Models;

use CodeIgniter\Model;

class Associate extends Model {
	protected $DBGroup = 'default';
	protected $table = 'associates';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDelete = false;
	protected $protectFields = true;
	protected $allowedFields = ['first_name', 'last_name', 'email', 'phone', 'state'];

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	// Validation
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert = [];
	protected $afterInsert = [];
	protected $beforeUpdate = [];
	protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];
}

/* End of file Associate.php */
/* Location: ./app/Models/Associate.php */