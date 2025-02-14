<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function home()
    {
        $totalUsers = User::count();
        return view('content.dashboard', compact(['totalUsers']));
    }
}
