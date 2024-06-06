<?php

namespace App\Controllers\Leads;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;
use CodeIgniter\HTTP\ResponseInterface;

class LeadsController extends BaseController
{
    public function leads()
    {
        $enquiryModel= new EnquiryModel();
        $leads = $enquiryModel->where('status', 'lead')->findAll();
        return view('leads/leads.php',['enquiries'=> $leads]);
    }

    public function view_lead($id)
    {
        $enquiryModel = new EnquiryModel();

        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            $user_id = $enquiry['user_id'];

            $details = $enquiryModel->getEnquiryAndUserById($id, $user_id);

            $enquiryDetails = $details['enquiry'];
            $userDetails = $details['user'];

            return view('leads/view_lead.php', ['enquiry' => $enquiryDetails, 'user' => $userDetails]);
        }
    }

    
}
