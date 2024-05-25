<?php

namespace App\Controllers\receptinist;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReceptionController extends BaseController
{
    public function index()
    {
        return view('receptinist/receptionist_view');
    }
    
    public function addReceptionist()
    {
        return view('receptinist/add_receptionist');
    }
}
