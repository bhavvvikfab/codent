<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('user_view\user_profile');
    }
    public function dashboard(): string
    {
        return view('dashboard.php');
    }
    
}
