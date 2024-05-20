<?php

namespace App\Models;

use CodeIgniter\Model;

class HospitalsModel extends Model
{
    protected $table = 'hospitals';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['name', 'current_plan', 'note','hospital_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
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

    protected function filterUpdateData($data)
    {
        return array_intersect_key($data, array_flip($this->allowedFields));
    }
    public function addHospital($data)
    {
        return $this->insert($data);
    }
    
    public function getDataByHospitalId($id)
    {
        return $this->where('hospital_id', $id)->first();
    }
    
    public function editData($id, $data)
    {
        if (empty($id) || empty($data)) {
            return false;
        }
        $filteredData = $this->filterUpdateData($data);
        $result = $this->where('hospital_id', $id)->set($filteredData)->update();

        return $result;
    }

   
}
