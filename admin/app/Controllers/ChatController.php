<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatModel;
use App\Models\HospitalsModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ChatController extends BaseController
{
  
    public function chats()
    {
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

            $hospital['unread_messages'] = $unreadMessagesCount;

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
    
        return view('chat/chats.php', ['hospitals' => $hospitals]);
    }
    

    public function view_chat($receiverID)
    {

        $userModel = new UserModel();
        $sender = $userModel->find(session('id'));
        $receiver = $userModel->find($receiverID);

        $senderID = session('id');

        $chatModel = new ChatModel();
        $messages = $chatModel
                    ->where('sender_id', $senderID)
                    ->where('receiver_id', $receiverID)
                    ->orWhere('sender_id', $receiverID)
                    ->where('receiver_id', $senderID)
                    ->orderBy('created_at', 'asc')
                    ->findAll();

        $chatModel->where(['sender_id' => $receiverID, 'receiver_id' => $senderID, 'status' => 0])
        ->set(['status' => 1])
        ->update();
           

        return view('chat/view_chat', [
            'receiverID' => $receiverID,
            'sender' => $sender,
            'receiver' => $receiver,
            'messages' => $messages
        ]);
    }
   
    public function sent_message()
    {
        $message = $this->request->getPost('message');
        $receiver_id = $this->request->getPost('receiver_id');
        $sender_id = $this->request->getPost('sender_id');
        $files = $this->request->getFiles();
        
        $chatModel = new ChatModel();
    
        $fileData = [];
        $fileType = null;
    
        if ($files) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = time() . '_' . uniqid() . '.' . $file->getExtension();
                    $destinationPath = ROOTPATH . '../admin/public/chat_files';
                    
                    // Move file to appropriate directory based on file type
                    if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                        $file->move($destinationPath ,$newName);
                        $fileType = 'image';
                    } elseif (in_array($file->getExtension(), ['mp4', 'avi', 'mov'])) {
                        $file->move($destinationPath ,$newName);
                        $fileType = 'video';
                    } elseif (in_array($file->getExtension(), ['pdf'])) {
                        $file->move($destinationPath , $newName);
                        $fileType = 'pdf';
                    } else {
                        continue; 
                    }
                    
                    $fileData[] = $newName;
                }
            }
        }
    
        // Determine the type of message being sent
        if (!empty($message) && !empty($fileData)) {
            if ($fileType == 'image') {
                $type = 3; // Both message and image
            } elseif ($fileType == 'video') {
                $type = 6; // Both message and video
            } elseif ($fileType == 'pdf') {
                $type = 7; // Both message and PDF
            }
        } elseif (!empty($message)) {
            $type = 1; // Message only
        } elseif (!empty($fileData)) {
            if ($fileType == 'image') {
                $type = 2; // Image only
            } elseif ($fileType == 'video') {
                $type = 4; // Video only
            } elseif ($fileType == 'pdf') {
                $type = 5; // PDF only
            }
        } else {
            $type = 0; // No content, handle as needed
        }
    
        // Prepare data for insertion
        $data = [
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'messages' => $message,
            'type' => $type,
            'files' => !empty($fileData) ? json_encode($fileData) : json_encode([]),
        ];
    
        $insertID = $chatModel->insert($data);
    
        if ($insertID) {
            $newMessage = $chatModel->find($insertID);
            return $this->response->setJSON(['status' => 200, 'message' => 'Message sent successfully.', 'data' => $newMessage]);
        } else {
            return $this->response->setJSON(['status' => 500, 'message' => 'Failed to send message.']);
        }
    }


    public function get_live_message()
    {
        $receiver_id = $this->request->getPost('receiver_id');
        $senderID = session('id');
        $chatModel = new ChatModel();
        
        $newMessages = $chatModel->where(['sender_id' => $receiver_id, 'receiver_id' => $senderID, 'status' => 0])->findAll();
        
        if ($newMessages) {
            $chatModel->where(['sender_id' => $receiver_id, 'receiver_id' => $senderID, 'status' => 0])
                      ->set(['status' => 1])
                      ->update();
    
            return $this->response->setJSON(['status' => 200, 'data' => $newMessages]);
        } else {
            return $this->response->setJSON(['status' => 404, 'message' => 'No new messages']);
        }
    }
    
}
