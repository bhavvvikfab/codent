<?php

namespace App\Controllers\patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PatientController extends BaseController
{
    public function index()
    {
        return view('patient/patient_view');
    }
    
    public function addPatient()
    {
        return view('patient/add_patient_view');
    }
}
