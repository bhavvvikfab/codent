<?php

namespace App\Controllers;
use App\Models\EnquiryModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReferralController extends BaseController
{
    public function index()
    {
        $id = session()->get('user_id');

       
            if (!$id == '') 
            {
            $userModel = new EnquiryModel();
            $segment = $this->request->uri->getSegment(1);

            // Pagination Config
            $config = [
                'baseURL' => base_url($segment . '/index'),
                'totalRows' => $userModel->where('user_id', $id)->countAllResults(),
                'per_page' => 9,
            ];

            $pager = \Config\Services::pager(null, null, false); // Initialize Pager

            // Initialize Pagination
            $userModel->where('user_id', $id);
            $data['user'] = $userModel->paginate(9);
            $data['pager'] = $userModel->pager;

            // Check if user data exists
            if ($data['user']) {
                // Pass user data and pager to the view
                return view('referral_page', $data);
            } else {
                // Handle case where no user data is found (optional)
                return view('referral_page', ['error' => 'User not found']);
            }
        } 
        else 
        {
            return view('login_page');

        }
    }

    public function searchEnquiry_fun()
{
    $searchKeyword = $this->request->getGet('search_keyword');

    

    // Retrieve the current user's ID (assuming it's stored in the session)
    $currentUserId = session()->get('user_id');

    // Load the EnquiryModel
    $enquiryModel = new EnquiryModel();

    // Pagination Config
    $config = [
        'baseURL' => base_url('your_controller/searchEnquiry_fun'), // Update 'your_controller' with your actual controller name
        'totalRows' => $enquiryModel->where('user_id', $currentUserId)
                                     ->groupStart()
                                        ->like('patient_name', $searchKeyword)
                                        ->orLike('appointment_date', $searchKeyword)
                                     ->groupEnd()
                                     ->countAllResults(),
        'per_page' => 6,
    ];

    $pager = \Config\Services::pager(null, null, false); // Initialize Pager

    // Initialize Pagination    
    $enquiryModel->where('user_id', $currentUserId)
                 ->groupStart()
                    ->like('patient_name', $searchKeyword)
                    ->orLike('appointment_date', $searchKeyword)
                 ->groupEnd();

    $data['user'] = $enquiryModel->paginate(6);
    $data['pager'] = $enquiryModel->pager;

    // Pass user data and pager to the view
    return view('referral_page', $data);
}



public function user_view_fun($id) 
{
    $enquiryModel = new EnquiryModel();

    $users = $enquiryModel->where('id',$id)->findAll();

    

    return view('user_profile_view', ['users' => $users]);
    
    
    
}
       
    
}
