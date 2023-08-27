<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Check if user is authenticated
        if (Auth::check()) {
            return $this->redirect();
        } else {
            return view('home.userpage');
        }
    }

    public function redirect()
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return view('admin.home');
            } else {
                return view('home.userpage');
            }
        } else {
            // User is not authenticated, handle accordingly
            return redirect()->route('login'); // Redirect to login page or handle as needed
        }
    }
}

