<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
  public function edit() {
    // data
    $user = Auth::user();
    // breadcrumb
    if ($user->role_user == "super_admin")
      $breadcrumb = [[
        'name' => 'Dashboard',
        'route' => route('dashboard_super_admin')
      ]];
    else if ($user->role_user == "admin")
      $breadcrumb = [[
        'name' => 'Dashboard',
        'route' => route('dashboard_admin')
      ]];
    else if ($user->role_user == "volunteer")
      $breadcrumb = [[
        'name' => 'Dashboard',
        'route' => route('dashboard_volunteer')
      ]];
    else
      $breadcrumb = [];

    $breadcrumb = array_merge($breadcrumb, [
      [
        'name' => 'Profile',
        'route' => route('profile_edit')
      ]
    ]);

    $data = array_merge(Data::data($breadcrumb), [
      'user' => User::find($user->id_user)
    ]);
    return view('general/profile', $data);
  }

  public function update(Request $request, $id_user) {
    $rules = [
      'full_name' => 'bail|required|string|max:255',
      'email' => 'bail|required|string|email|max:255',
      'phone_number' => 'required|string|max:255',
    ];

    $id_user = Crypt::decrypt($id_user);
    $user = User::find($id_user);

    if (!empty($request['password'])) {
      $rules['password'] = 'bail|required|string|min:8|confirmed';
    } else if($request['email'] != $user->email) {
      $rules['email'] = 'bail|required|string|email|max:255|unique:users';
    }

    if ($user->role_user == "admin") {
      $rules['staff_id'] = 'bail|required|string|max:255';
      $rules['position'] = 'bail|required|string|max:255';
    } else if ($user->role_user == "volunteer") {
      $rules['date_of_birth'] = 'bail|required|date|date_format:Y-m-d';
      $rules['occupation'] = 'bail|required|string|max:255';
    }
    $request->validate($rules);

    $data_update_user = [
      'full_name' => $request['full_name'],
      'phone_number' => $request['phone_number'],
    ];

    if (!empty($request['password'])) {
      $data_update_user['password'] = Hash::make($request['password']);
    } else if($request['email'] != $user->email) {
      $data_update_user['email'] = $request['email'];
    }

    if ($user->role_user == "admin") {
      $data_update_user['staff_id'] = $request['staff_id'];
      $data_update_user['position'] = $request['position'];
    } else if ($user->role_user == "volunteer") {
      $data_update_user['date_of_birth'] = $request['date_of_birth'];
      $data_update_user['occupation'] = $request['occupation'];
    }
    $user->update($data_update_user);

    return redirect()->back();
  }
}
