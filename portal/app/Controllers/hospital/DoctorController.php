<?php

namespace App\Controllers\hospital;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DoctorController extends BaseController
{
    public function index()
    {
        return view('hospital/doctor_view');
    }
    
    public function addDoctor()
    {
        return view('hospital/add_doctor');
    }
    
    
    
}
