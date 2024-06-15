<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class WebsiteHome extends BaseController
{
    public function index()
    {
        return view('website_home');
    }
   




}
