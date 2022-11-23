<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\General\Data;
use App\Models\School;
use App\Models\User;

class Dashboard extends Controller
{
  public function index() {
    // breadcrumb
    $breadcrumb = [
      [
        'name' => 'Dashboard',
        'route' => route('dashboard_super_admin')
      ]
    ];

    // data
    $schools = School::take(5)->latest()->get();
    $total_school = School::all()->count();
    $administrators = User::where('role_user','admin')->take(4)->latest()->get();
    $total_administrator = User::where('role_user','admin')->count();

    // school registration percentage
    $total_school_last_year = School::whereYear('created_at', now()->subYear()->year)->count();
    $total_school_current_year = School::whereYear('created_at', date('Y'))->count();

    $total_diff = $total_school_current_year - $total_school_last_year;
    $total_before = $total_school_last_year == 0 ? 1 : $total_school_last_year;

    $shc_reg_percentage = ($total_diff/$total_before)*100;

    // total per month this year
    $total_school_last_12_month = [];
    for ($i=1; $i<=12; $i++) {
      $total_school_last_12_month[$i] = School::whereYear('created_at', date('Y'))
                                              ->whereMonth('created_at', $i)->count();
    }

    $data = array_merge(Data::data($breadcrumb), [
      'schools' => $schools,
      'total_school' => $total_school,
      'administrators' => $administrators,
      'total_administrator' => $total_administrator,
      'shc_reg_percentage' => $shc_reg_percentage,
      'total_school_last_12_month' => $total_school_last_12_month,
    ]);
    return view('superAdmin/dashboard', $data);
  }
}
