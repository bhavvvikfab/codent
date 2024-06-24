<?php

namespace App\Controllers\Leads;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;
use App\Models\LeadsModel;
use CodeIgniter\HTTP\ResponseInterface;

class LeadsController extends BaseController
{
    public function leads()
    {
        $enquiryModel= new EnquiryModel();

         if(session('user_role')==2){
            $hospitalId = session('user_id');
        }else{
            $hospitalId = session('hospital_id');
        }
        $leads = $enquiryModel->where('status', 'lead')
                                ->where('hospital_id', $hospitalId)
                                ->orderBy('created_at', 'DESC')
                                ->findAll();
       
        return view('leads/leads.php',['enquiries'=> $leads]);
    }

    public function view_lead($id)
    {
        $enquiryModel = new EnquiryModel();
        $leadsModel=new LeadsModel();
        $lead = $leadsModel->where('enquiry_id', $id)->first();
        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            $user_id = $enquiry['user_id'];

            $details = $enquiryModel->getEnquiryAndUserById($id, $user_id);

            $enquiryDetails = $details['enquiry'];
            $userDetails = $details['user'];

            return view('leads/view_lead.php', ['enquiry' => $enquiryDetails, 'user' => $userDetails,'lead'=>$lead]);
        }
    }

    public function add_lead_details()
    {
        $leadsModel = new LeadsModel();
        
        $enquiry_id = $this->request->getPost('enquiry_id');
        $outcome = $this->request->getPost('outcome');
        $contactedVia = $this->request->getPost('contactedVia');
        $appointmentWith = $this->request->getPost('appointmentWith');
        $method = $this->request->getPost('method');
        $dateTime = $this->request->getPost('dateTime');
        $remindMeTo = $this->request->getPost('remindMeTo');
        $assignNextTaskTo = $this->request->getPost('assignNextTaskTo');
        $noteForTeam = $this->request->getPost('noteForTeam');
        $message = $this->request->getPost('message');
        
    
        if ($enquiry_id) {
            $data = [
                'enquiry_id'=>$enquiry_id,
                'response' => $outcome,
                'date_time'=>$dateTime,
                'appointment_with'=> $appointmentWith,
                'contacted_via'=> $contactedVia,
                'method'=>$method,
                'remind_me'=>$remindMeTo,
                'assign_next_task'=>$assignNextTaskTo,
                'note_for_team'=>$noteForTeam,
                'message'=> $message
           
            ];
            $data = array_filter($data, function($value) {
                return $value !== null && $value !== '';
            });

            $result = $leadsModel->insert($data);
            
            if($result){
                return response()->setJSON(['success']);
            }else{
                return response()->setJSON(['error']);
            }
        }else{
            return response()->setJSON(['error']);
        }
  
    }

    
}
