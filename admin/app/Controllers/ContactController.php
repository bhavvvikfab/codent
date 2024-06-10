<?php

namespace App\Controllers;

use App\Models\ContactUsModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactController extends BaseController
{
    public function index()
    {
        $contactUsModel = new ContactUsModel();

        $data['contact'] = $contactUsModel->findAll();
        return view('contact/contact_view',$data);
    }

    public function viewContactus($id)
    {
        $contactUsModel = new ContactUsModel();

        $data['contact'] = $contactUsModel->where('id',$id)->findAll();
        return view('contact/view_contact',$data);
    }



    
}
