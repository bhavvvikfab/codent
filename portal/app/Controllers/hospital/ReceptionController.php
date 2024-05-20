<?php

namespace App\Controllers\hospital;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReceptionController extends BaseController
{
    public function index()
    {
        return view('hospital/receptionist_view');
    }
    
    public function addReceptionist()
    {
        return view('hospital/add_receptionist_view');
    }
}
