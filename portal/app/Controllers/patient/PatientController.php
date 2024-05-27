<?php

namespace App\Controllers\patient;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class PatientController extends BaseController
{
    public function index()
    {
        return view('patient/patients');
    }

    public function add_patient_form()
    {
        return view('patient/add_patient_form');
    }

    public function get_doctor_dropdown()
    {
        $hospitalId = $this->request->getGet('hospital_id');
        $userModel = new UserModel;
        $hospitals = $userModel->where('status', 'active')
            ->where('hospital_id', $hospitalId)
            ->groupStart()
            ->where('role', 4)
            ->orWhere('role', 3)
            ->groupEnd()
            ->findAll();
        return $this->response->setJSON($hospitals);
    }
}
