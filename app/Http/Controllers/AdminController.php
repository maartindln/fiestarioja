<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PageVisit;
use App\Models\Pueblo;

class AdminController extends Controller
{
    public function admin()
    {
        $usuarios = User::all();
        $userCount = User::count();
        $pueblos = Pueblo::all();
        $pueblosCount = Pueblo::count();
        $pageVisit = PageVisit::first();
        $visitCount = $pageVisit ? $pageVisit->visits : 0;
        return view('admin.admin', compact('userCount','visitCount','pueblosCount'))->with('users', $usuarios)->with('pueblos', $pueblos);
    }
}
