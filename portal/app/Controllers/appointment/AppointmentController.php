<?php

namespace App\Controllers\Appointment;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AppointmentController extends BaseController
{
    public function all_appointment()
    {
            return view('appointment/appointment.php');
    }

    public function add_appointment(){
        return view('appointment/add_appointment.php');
    }
    public function view_appointment(){
        return view('appointment/app_appointment.php');
    }

    public function edit_appointment(){
        return view('appointment/edit_appointment.php');
    }
}
