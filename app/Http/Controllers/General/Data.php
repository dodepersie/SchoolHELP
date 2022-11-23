<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Data extends Controller
{
  public function data($breadcrumb, $request = '') {
    $data['breadcrumb'] = Data::breadcrumb($breadcrumb);
    $data['sidenav'] = Data::sidenav($request);
    return $data;
  }

  public function breadcrumb($breadcrumb) {
    $data = [
      'breadcrumb' => $breadcrumb
    ];
    return view('layouts/breadcrumb', $data);
  }

  public function sidenav($request) {
    $role_user = Auth::user()->role_user;
    $sidenav = [];

    if ($role_user == 'super_admin') {
      $sidenav = [
        [
          'name' => 'Dashboard',
          'icon' => 'ni ni-tv-2',
          'route' => route('dashboard_super_admin'),
          'active' => Route::is('dashboard_super_admin') ? 'active' : '',
        ],
        [
          'name' => 'School and Admin',
          'icon' => 'fa fa-school',
          'route' => route('register_school_admin'),
          'active' => Route::is('register_school_admin') ||
                      Route::is('register_administrator') ? 'active' : '',
        ],
      ];
    } else if ($role_user == 'admin') {
      $sidenav = [
        [
          'name' => 'Dashboard',
          'icon' => 'ni ni-tv-2',
          'route' => route('dashboard_admin'),
          'active' => Route::is('dashboard_admin') ? 'active' : '',
        ],
        [
          'name' => 'Request',
          'icon' => 'fa fa-file-text-o',
          'route' => route('request'),
          'active' => Route::is('request') ||
                      Route::is('request_detail') ? 'active' : '',
        ],
      ];
    } else if ($role_user == 'volunteer') {
      $sidenav = [
        [
          'name' => 'Dashboard',
          'icon' => 'ni ni-tv-2',
          'route' => route('dashboard_volunteer'),
          'active' => Route::is('dashboard_volunteer') ? 'active' : '',
        ],
        [
          'name' => 'Assistance Requests',
          'icon' => 'ni ni-single-copy-04',
          'route' => route('assistance_request'),
          'active' => Route::is('assistance_request') ? 'active' : '',
        ],
        [
          'name' => 'Offers',
          'icon' => 'fas fa-hand-holding-heart',
          'route' => route('list_offers'),
          'active' => Route::is('list_offers') ? 'active' : '',
        ],
      ];
    }
    $data = [
      'sidenav' => $sidenav
    ];
    return view('layouts/sidenav', $data);
  }
}
