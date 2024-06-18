<?php

namespace App\Controllers;
use App\Models\ContactModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContactController extends BaseController
{
    public function index()
    {
        return view('Contact_view');
    }

    public function contact_fun() 
    {

        $contactModel = new ContactModel();
    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $subject = $this->request->getPost('subject');
    $message = $this->request->getPost('message');

    $data = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,

    ];

                  $result = $contactModel->insert($data);

                  if ($result) {
                    // Data inserted successfully
                    return redirect()->to('contact')->with('status','success'); // Change 'success_page' to the URL of your success page
                } else {
                    // Error inserting data
                    return redirect()->to('contact')->with('status','error');
                }

                  

}
}
