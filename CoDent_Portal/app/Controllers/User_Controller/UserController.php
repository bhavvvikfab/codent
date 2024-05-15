<?php

namespace App\Controllers\User_Controller;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('user_view\user_profile');
    }
}
