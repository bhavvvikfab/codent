<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table            = 'enquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['id','user_id', 'hospital_id', 'date_of_birth', 'phone', 'patient_name', 'required_specialist', 'note', 'image', 'status', 'assign_to', 'appointment_date','referral_doctor'];

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

    public function insertEnquiry($data)
    {
        $this->insert($data); 
        return $this->insertID();
    }

    public function getEnquiriesWithUserDetails($userId)
    {
        return $this->select('enquiries.id as enquiry_id, enquiries.*, users.*')
                    ->join('users', 'enquiries.user_id = users.id')
                    ->where('enquiries.user_id', $userId)
                    ->findAll();
    }

    public function getEnquiryById($id)
    {
        return $this->select('enquiries.*, users.*')
                    ->join('users', 'enquiries.user_id = users.id')
                    ->where('enquiries.id', $id)
                    ->first();
    }
    
}
