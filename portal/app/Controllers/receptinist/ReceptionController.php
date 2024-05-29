<?php

namespace App\Controllers\receptinist;

use App\Controllers\BaseController;
use App\Models\ReceptinistModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class ReceptionController extends BaseController
{
    public function index()

    {
        $userModel= new UserModel;
        $user_id=session('user_id');
        $data=$userModel->getUsersByRoleAndHospital(5,$user_id);
        return view('receptinist/receptionist',['data'=>$data]);
    }
    
    public function addReceptionist()
    {
        return view('receptinist/add_receptionist');
    }

    public function reception_details($id){
        $userModel= new UserModel;
        $rep=$userModel->getUserById($id);
        return view("receptinist/reception_view",['rep'=>$rep]);
    }

    public function reception_edit_view($id){
        $userModel= new UserModel;
        $rep=$userModel->getUserById($id);
        return view("receptinist/receptionist_edit",['rep'=>$rep]);
    }


    public function reception_register()
    {
        // $receptionModel = new ReceptinistModel();
        $userModel = new UserModel();
    
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[255]',
            'address' => 'required|min_length[4]|max_length[255]',
            'dob' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
                'errors' => [
                    'uploaded' => 'Please upload a valid profile image.',
                    'max_size' => 'The profile image file size should not exceed 1MB.',
                    'is_image' => 'The profile image must be in PNG, JPG, or JPEG format.',
                ],
            ],
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $name = $this->request->getPost("name");
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");
        $address = $this->request->getPost("address");
        $dob = $this->request->getPost("dob");
        $phone = $this->request->getPost("phone");
        $image = $this->request->getFile("image");

        $data = [
            'role' => 5,
            'hospital_id' => session('user_id'),
            'fullname' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'address' => $address,
            'date_of_birth' => $dob,
            'phone' => $phone,
            
        ];
    
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '.' . $image->getExtension();
            $destinationPath = ROOTPATH . '../admin/public/images';
            $image->move($destinationPath, $imageName);
            $data['profile'] = $imageName;
        }
    
        $result = $userModel->insertUser($data);
    
        if ($result) {
            return redirect()->to( base_url().''.session('prefix').'/'.'reception')->with('added_reception', 'Reception Register Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function receptionist_edit(){
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,id,{user_id}]',
                'errors' => [
                    'is_unique' => 'This email address is already in use.'
                ]
            ],
            'address' => 'required|min_length[4]|max_length[255]',
            'dob' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
            'user_id' => 'required|integer',
            // 'image' => [
            //     'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            //     'errors' => [
            //         'uploaded' => 'Please upload a valid profile image.',
            //         'max_size' => 'The profile image file size should not exceed 1MB.',
            //         'is_image' => 'The profile image must be in PNG, JPG, or JPEG format.',
            //     ],
            // ],
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $user_id = $this->request->getPost("user_id");
    
        $doctorName = $this->request->getPost("name");
        $email = $this->request->getPost("email");
        $address = $this->request->getPost("address");
        $dob = $this->request->getPost("dob");
        $phone = $this->request->getPost("phone");
        $image = $this->request->getFile("image");
    
    
        $userModel = new UserModel();
    
     
    
        $userData = [
            'fullname' => $doctorName,
            'email' => $email,
            'address' => $address,
            'date_of_birth' => $dob,
            'phone' => $phone,     
        ];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '.' . $image->getExtension();
            $destinationPath = ROOTPATH . '../admin/public/images';
            $image->move($destinationPath, $imageName);
            $userData['profile'] = $imageName;
        }

        $result= $userModel->update($user_id, $userData);
        if ($result) {
            return redirect()->to(base_url() . session('prefix') . '/reception')->with('edit_receptioninst', 'Doctor Info Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

    }

    public function receptionist_delete($id){
        $userModel = new UserModel();
  
        if ( $userModel->delete($id)) {
            
            return redirect()->to(base_url() . session('prefix') . '/reception')->with('delete_receptionist', 'Receptionist deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Receptionist not found.');
        }
    }

    public function receptionist_status(){

        $id = $this->request->getGet('id'); 
        $usermodel = new UserModel();
    
        if (!empty($id)) {

            $user = $usermodel->find($id);
        
            if ($user) {
                $newStatus = ($user['status'] == 'active') ? 'inactive' : 'active';
        
                $usermodel->update($id, ['status' => $newStatus]);
                return response()->setJSON(['status'=>'success','msg'=>'Receptionist status changed.']);
            } else {
                return response()->setJSON(['status'=>'error','msg'=>'User not found...!']);
            }
        } else {
            return response()->setJSON(['status'=>'error','msg'=>'User not found...!']);
        }
    }
}
