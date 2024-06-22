<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PackagesModel;
use CodeIgniter\HTTP\ResponseInterface;

class PackagesController extends BaseController
{
    public function index()
    {
    $model = new PackagesModel();
    
    // Fetch all data from the PackagesModel
    $data['packages'] = $model->findAll();
    
    // Pass the data to the view
    return view('hospitals/subscription_view', $data);
    }

    
    public function add_subscription()
    {
       
        return view('hospitals/add_subscription_view');
    }
    
    public function add_subscription_form()
{
    $model = new PackagesModel();
    
    // Retrieve input data from POST request
    $package_id = $this->request->getPost("packageNo");
    $inputName = $this->request->getPost("inputName");
    $inputPrice = $this->request->getPost("inputPrice");
    $inputDuration = $this->request->getPost("inputDuration");
    $inputDetail = $this->request->getPost("inputDetail");
    
    // Data is validated, proceed with insertion
    $data = [
        'package_id' => $package_id,
        'plan_name' => $inputName,
        'price' => $inputPrice,
        'details' => $inputDetail,
        'duration' => $inputDuration,
    ];
    
    $result = $model->insert($data);
    
    if ($result) {
        // If the insertion was successful, echo a JSON response
        return json_encode('Successfully Added Subscription Details');
    } else {
        // If the insertion failed, echo a JSON response
        return json_encode('Something went wrong...');
    }
    
    
}

public function fetch_subscription()
{
    // Load the PackagesModel
    $model = new PackagesModel();

    // Get the user_id from the GET data
    $user_id = $this->request->getGet("id");

    // Fetch subscription data from the model based on user_id
    $data = $model->find($user_id); // Assuming $user_id is the primary key

    // Return subscription data as JSON
    return json_encode($data);
}
public function update_subscription()
{
    // Load the PackagesModel
    $model = new PackagesModel();

    // Get the user_id from the POST data
    $user_id = $this->request->getPost("id");
    
    $package_id = $this->request->getPost("package_id");
    $plan_name = $this->request->getPost("plan_name");
    $price = $this->request->getPost("price");
    $details = $this->request->getPost("details");
    $duration = $this->request->getPost("duration");
    
    // Define the data to update
    $data = [
        'package_id' => $package_id,
        'plan_name' => $plan_name,
        'price' => $price,
        'details' => $details,
        'duration' => $duration,
    ];
    
    // Check if the user record exists
    $existingRecord = $model->find($user_id);

    if ($existingRecord) {
        // Define the WHERE clause
        $whereClause = ['id' => $user_id];

        // Perform the update with the WHERE clause
        $result = $model->update($whereClause, $data);

        if ($result) {
            // Update successful
            return 1;
        } else {
            // Update failed
            return 0;
        }
    } else {
        // User record not found
        return 0;
    }
}

public  function package_status(){

        $id = $this->request->getGet('id'); 
        $model = new PackagesModel();
    
        // Check if the ID is valid
        if (!empty($id)) {
            // Fetch the hospital data by ID
            $user = $model->find($id);
        
            // Check if the hospital exists
            if ($user) {
                // Toggle the status
                $newStatus = ($user['status'] == 'active') ? 'inactive' : 'active';
        
                // Update the status
                $model->update($id, ['status' => $newStatus]);
                return response()->setJSON(['status'=>'success','msg'=>'status changed']);
            } else {
                return response()->setJSON(['status'=>'error','msg'=>'User not found']);
                // Hospital with the provided ID not found, handle error
            }
            
        } 
        else 
        {
            return response()->setJSON(['status'=>'error','msg'=>'User not found']);
            // Invalid or missing ID, handle error
        }
    }

public function update()
{
    // Load the PackagesModel
    $model = new PackagesModel();

    // Get the user_id from the POST data
    $user_id = $this->request->getVar("id");
    
 
    // Check if the user_id is provided and valid
    if (!$user_id) {
        // Handle the case where user_id is missing or invalid
        // You can throw an exception, log an error, or return a response
        return "User ID is missing or invalid";
    }

    // Get other data from the POST request
    $package_id = $this->request->getPost("package_id");
    $plan_name = $this->request->getPost("plan_name");
    $price = $this->request->getPost("price");
    $details = $this->request->getPost("details");
    $duration = $this->request->getPost("duration");

    // Define the data to update
    $data = [
        'package_id' => $package_id,
        'plan_name' => $plan_name,
        'price' => $price,
        'details' => $details,
        'duration' => $duration,
    ];

    // Check if the user record exists
    $existingRecord = $model->find($user_id);

    if ($existingRecord) {
        // Define the WHERE clause
        $whereClause = ['id' => $user_id];

        // Perform the update with the WHERE clause
        $result = $model->update($whereClause, $data);

        // Check if the update was successful
        if ($result) {
            // Handle the successful update, such as redirecting or returning a success message
            return "Update successful";
        } else {
            // Handle the case where update fails
            return "Update failed";
        }
    } else {
        // Handle the case where the user record doesn't exist
        return "User record not found";
    }
}

// public function delete_Subscription()
// {
//     // Load the PackagesModel
//     $model = new PackagesModel();

//     // Get the subscription ID from the GET data
//     $subscription_id = $this->request->getGet("id");

//     // Check if the ID is valid (optional, but recommended)
//     if (!empty($subscription_id)) {
//         // Use the model to delete the subscription
//         $deleted = $model->delete($subscription_id);

//         if ($deleted) 
//         {
//             // Subscription successfully deleted
//             return 'Subscription deleted successfully';
//         } else {
//             // Failed to delete subscription
//             return 'Failed to delete subscription';
//         }
//     } else 
//     {
//         // Invalid or missing ID
//         return 'Invalid or missing subscription ID';
//     }
// }

public function delete_Subscription()
{
    $id = $this->request->getGet('id');

    if ($id) {
        $subscriptionModel = new PackagesModel();

        // Check if the subscription exists
        $subscription = $subscriptionModel->find($id);
        if ($subscription) {
            // Delete the subscription
            if ($subscriptionModel->delete($id)) {
                return $this->response->setJSON(['success' => true]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete subscription']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Subscription not found']);
        }
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Invalid ID']);
    }
}

 
 

   
}
