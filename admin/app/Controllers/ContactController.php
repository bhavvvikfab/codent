<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactController extends BaseController
{
    public function index()
    {
        return view('contact/contact_view');
    }

    public function viewContactus()
    {
        return view('contact/view_contact');
    }



    
}
