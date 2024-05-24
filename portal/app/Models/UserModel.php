<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

 
    protected $allowedFields = ['role','fullname', 'email', 'password','address','date_of_birth','phone','profile','hospital_id'];

    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    
     function updatePassword($id, $oldPassword, $newPassword)
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
        return false;
    }
    
     public function insertUser($data)
    {
         $this->insert($data);
         return $this->insertID();
    }
    
   public function getUsersByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }
}
   