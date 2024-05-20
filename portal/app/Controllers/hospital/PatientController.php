<?php

namespace App\Controllers\hospital;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PatientController extends BaseController
{
    public function index()
    {
        return view('hospital/patient_view');
    }
    
    public function addPatient()
    {
        return view('hospital/add_patient_view');
    }
}
