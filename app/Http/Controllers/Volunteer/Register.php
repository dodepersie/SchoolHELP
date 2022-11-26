<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
  public function create() {
    return view('auth/register');
  }

  public function store(Request $request) {
    $request->validate([
      'full_name' => 'bail|required|string|max:255',
      'date_of_birth' => 'bail|required|date|date_format:Y-m-d',
      'occupation' => 'bail|required|string|max:255',
      'email' => 'bail|required|string|email|max:255|unique:users',
      'phone_number' => 'required|string|max:255',
      'username' => 'bail|required|string|min:8|unique:users',
      'password' => 'bail|required|string|min:8|confirmed',
    ]);

    $data_new_volunteer = [
      'full_name' => $request['full_name'],
      'date_of_birth' => $request['date_of_birth'],
      'occupation' => $request['occupation'],
      'phone_number' => $request['phone_number'],
      'email' => $request['email'],
      'username' => $request['username'],
      'password' => Hash::make($request['password']),
      'role_user' => "volunteer",
    ];
    $user = User::create($data_new_volunteer);

    /**
     * Login after register
     */
    Auth::login($user);

    return redirect()->route('dashboard_volunteer');
  }
}
