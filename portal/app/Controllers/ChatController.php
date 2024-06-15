<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChatModel;
use App\Models\DoctorModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ChatController extends BaseController
{


    public function chats()
    {
        $userModel = new UserModel();
        $doctorModel = new DoctorModel();
        $chatModel = new ChatModel();
        if (session('user_role') == 2) {
            $hospitalId = session('user_id');
        } else {
            $hospitalId = session('hospital_id');
        }

        $doctors = $doctorModel->where('hospital_id', $hospitalId)->findAll();
        $hasUnreadMessages = false;
        $doctorsWithDetails = [];

        foreach ($doctors as $doctor) {
            $id = $doctor['user_id'];
            $userData = $userModel->find($id);
            $unreadMessagesCount = $chatModel->where(['sender_id' => $id, 'receiver_id' => $hospitalId])
            ->where('status', 0)
            ->countAllResults();

            $doctor['details'] = $userData;
            $doctor['unread_messages'] = $unreadMessagesCount;
            $doctorsWithDetails[] = $doctor;
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

        // echo '<pre>';
        // print_r($doctorsWithDetails);
        // die;

        return view('chat/chats.php', ['doctors' => $doctorsWithDetails]);
    }

    public function view_chat($receiverID)
    {

        $userModel = new UserModel();
        $sender = $userModel->find(session('user_id'));
        $receiver = $userModel->find($receiverID);

        $senderID = session('user_id');

        $chatModel = new ChatModel();
        $messages = $chatModel->where(['sender_id' => $receiverID, 'receiver_id' => $senderID])
            ->orWhere(['sender_id' => $senderID, 'receiver_id' => $receiverID])
            ->where('status',1)
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
        if ($files) {

            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = time() . '_' . uniqid() . '.' . $file->getExtension();
                    $destinationPath = ROOTPATH . '../admin/public/chat_images';
                    $file->move($destinationPath, $newName);
                    $fileData[] = $newName;
                }
            }
        }

        if (!empty($message) && !empty($fileData)) {
            $type = 3; // Both message and image
        } elseif (!empty($message)) {
            $type = 1; // Message only
        } elseif (!empty($fileData)) {
            $type = 2; // Image only
        }

        $data = [
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'messages' => $message,
            'type' => $type,
            'files' => !empty($fileData) ? json_encode($fileData) : json_encode([]),
        ];

        if (!empty($fileData)) {
            $data['files'] = json_encode($fileData);
        }

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
        $senderID = session('user_id');
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
