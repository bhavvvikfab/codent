<?php

namespace App\Filters;

use App\Controllers\LoginController;
use App\Models\ActivePlanHospital;
use App\Models\ChatModel;
use App\Models\DoctorModel;
use App\Models\PackagesModel;
use App\Models\UserModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
{
    {
        $session = session();
        $email = $session->get('email');

        if (!$session->get('logged_in') || empty($email)) {
            return redirect()->to('/');
        }


         // ==================for getting msg notification ====================
         $doctorModel = new DoctorModel();
         $chatModel = new ChatModel();
         if (session('user_role') == 2) {
             $hospitalId = session('user_id');
         } else {
             $hospitalId = session('hospital_id');
         }

         $doctors = $doctorModel->where('hospital_id', $hospitalId)->findAll();
         $hasUnreadMessages = false;

         foreach ($doctors as $doctor) {
             $id = $doctor['user_id'];
             $unreadMessagesCount = $chatModel->where(['sender_id' => $id, 'receiver_id' => $hospitalId])
                 ->where('status', 0)
                 ->countAllResults();
             if ($unreadMessagesCount > 0) {
                 $hasUnreadMessages = true;
             }
         }
         $adminUnreadMessagesCount = $chatModel->where(['sender_id' => 1, 'receiver_id' => $hospitalId])
             ->where('status', 0)
             ->countAllResults();

         // Set session for unread chat
         if ($hasUnreadMessages || $adminUnreadMessagesCount > 0) {
             session()->set('unread_chat', true);
         } else {
             session()->remove('unread_chat');
         }

         // ==================for getting msg notification====================

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            // Handle case where user is not found
            return redirect()->to('/');
        }
        if(session('user_role') == 2 ){
            $id=$user['id'];
        }else{
            $id=$user['hospital_id'];
        }
        $active_planModel = new ActivePlanHospital();
        $active_plan = $active_planModel->where('hospital_id', $id)->first();

        if ($active_plan) {
            $currentDate = date('Y-m-d H:i:s');
            if ($currentDate >= $active_plan['ending_date']) {
                $this->handleExpiredPlan($active_plan, $user);
                return redirect()->to('/');
            }
        } else {
            // Handle case where user does not have an active plan
            $this->handleNoActivePlan($user);
            return redirect()->to('/');
        }

        // Continue with the request
        return $request;
    }
}
    private function handleExpiredPlan($active_plan, $user)
    {
        $active_planModel = new ActivePlanHospital();
        $active_planModel->delete($active_plan['id']);

        $userModel = new UserModel();
        $userModel->where('id', $user['id'])->set(['package_status' => 'expired'])->update();

        session()->setFlashdata('package_message', 'Your active package has expired. Please purchase a new package.');
    }

    private function handleNoActivePlan($user)
    {
        $packagesModel = new PackagesModel();
        $data['packages'] = $packagesModel->getActivePackages();

        $userModel = new UserModel();
        $userModel->where('id', $user['id'])->set(['package_status' => 'expired'])->update();

        session()->setFlashdata('package_message', 'You do not have an active package. Please purchase a package.');
        echo view('buy_package', ['hospitalId' => $user['id'], 'data' => $data]);
        exit(); // Make sure to exit after rendering the view
    }


    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
        
    }
}
