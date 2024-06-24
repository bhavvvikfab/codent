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
        if(session('user_role')==2){
            $hospitalId = session('user_id');
        }else{
            $hospitalId = session('hospital_id');
        }
        $data=$userModel->getUsersByRoleAndHospital(5,$hospitalId);
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
            'email' => 'required|valid_email|is_unique[users.email]', 
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return $this->response->setJSON([
                'status' => 'emailerror',
                'message' => $validation->getErrors()
            ]);
            // return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
            session()->setFlashdata('added_reception', 'Reception Register Successfully');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Reception Register Successfully'
            ]);
            // return redirect()->to( base_url().''.session('prefix').'/'.'reception')->with('added_reception', 'Reception Register Successfully');
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'something went wrong..!'
            ]); 
            // return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function receptionist_edit(){
        $validationRules = [
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,id,{user_id}]',
                'errors' => [
                    'is_unique' => 'This email address is already in use.'
                ]
            ],
            'user_id' => 'required|integer',
           
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return $this->response->setJSON([
                'status' => 'emailerror',
                'message' => $validation->getErrors()
            ]);
            // return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
            session()->setFlashdata('edit_receptioninst', 'Receptionist Info Updated Successfully');
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Receptionist Info Updated Successfully'
            ]);
            // return redirect()->to(base_url() . session('prefix') . '/reception')->with('edit_receptioninst', 'Doctor Info Updated Successfully');
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'something went wrong..!'
            ]); 
            // return redirect()->back()->with('error', 'Something went wrong. Please try again.');
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
