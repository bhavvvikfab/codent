<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['fullname', 'password', 'role','profile','email', 'phone', 'date_of_birth','status','address','hospital_id'];

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

    public function editData($id, $data)
    {
        if (empty($id) || empty($data)) {
            return false;
        }
        $filteredData = $this->filterUpdateData($data);
        $result = $this->update($id, $filteredData);

        return $result;
    }

    protected function filterUpdateData($data)
    {
        return array_intersect_key($data, array_flip($this->allowedFields));
    }

    public function updatePassword($id, $oldPassword, $newPassword)
    {
        if (empty($id) || empty($oldPassword) || empty($newPassword)) {
            return false;
        }
        $user = $this->find($id);
        if (password_verify($oldPassword, $user['password'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $data = ['password' => $hashedPassword];

            $result = $this->update($id, $data);
            return true;
        }
        return 'error';
    }

    public function getUsersByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }

    public function insertUser($data)
    {
         $this->insert($data);
         return $this->insertID();
    }
    
     public function deleteUser($id)
    {
        return $this->where('id', $id)->delete();
    }
    
    public function findUserById($id)
    {
        return $this->find($id);
    }

}
