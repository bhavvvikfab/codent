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

    public function add_lead_instruction()
    {
        $enquiryModel = new EnquiryModel();
    
        $enquiry_id = $this->request->getPost('enquiry_id');
        $outcome = $this->request->getPost('outcome');
        $comment = $this->request->getPost('comment');
    
        if ($enquiry_id) {
            $data = [
                'lead_instruction' => $outcome,
                'lead_comment' => $comment
            ];
    
            $result = $enquiryModel->update($enquiry_id, $data);
            
            if($result){
                return response()->setJSON(['success']);
            }else{
                return response()->setJSON(['error']);
            }
        }
  
    }

    
}
