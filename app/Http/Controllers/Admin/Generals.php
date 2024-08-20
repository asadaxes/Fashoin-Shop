<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Generals extends Controller
{
    public function dashboard()
    {
        $data = [
            'active_page' => 'dashboard',
        ];
        return view('admin.dashboard', $data);
    }
}