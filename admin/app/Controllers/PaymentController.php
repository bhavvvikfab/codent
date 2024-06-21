<?php

namespace App\Controllers;
use App\Models\TransactionModel;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use CodeIgniter\HTTP\ResponseInterface;

class PaymentController extends BaseController
{
    public function index()
{
    $transactionModel = new TransactionModel();
    // $hospitalModel = new HospitalModel();

    // Fetch data using Query Builder to join tables and filter by hospital ID name
    $transactions = $transactionModel->select('transaction.*, transaction.status as transaction_status,transaction.created_at as date, users.*, packages.plan_name as package_name')
    ->join('users', 'users.id = transaction.hospital_id', 'left') // Adjust if 'hospital_id' or 'user_id' is the foreign key
    ->join('packages', 'packages.id = transaction.package_id', 'left') // Left join with packages table on package_id
    ->findAll();

        // echo "<pre>";
        // print_r($transactions);
        // die;
        // echo "</pre>";


    // Pass the data to the view
    return view('payment/payment_view', ['transactions' => $transactions]);
}

}
