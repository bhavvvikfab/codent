<?php

namespace App\Filters;

use App\Models\ChatModel;
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
     
        if (!session()->get('logged_in')) {
            // User is logged in, redirect away from login page
            return redirect()->to('/'); // Redirect to the dashboard route
        }

         // ==================for getting msg notification====================
         $userid = session('id');
         $userModel = new UserModel();
         $chatModel = new ChatModel();
     
         $hospitals = $userModel->where('role', 2)->findAll();
         $hasUnreadMessages = false; 
         
         foreach ($hospitals as &$hospital) {
             $hospitalId = $hospital['id']; 
             $unreadMessagesCount = $chatModel->where(['sender_id' => $hospitalId, 'receiver_id' => $userid])
                                              ->where('status', 0)
                                              ->countAllResults();
             if ($unreadMessagesCount > 0) {
                 $hasUnreadMessages = true;
             }
         }
         // Set session for unread chat
         if ($hasUnreadMessages) {
             session()->set('unread_chat', true);
         } else {
             session()->remove('unread_chat');
         }

      // ==================for getting msg notification====================
        
       

        // User is not logged in, allow access
        return $request;
        
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
        // No action needed after redirection
    }
}
