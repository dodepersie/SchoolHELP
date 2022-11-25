<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\General\Data;
use App\Models\mRequest;
use App\Models\offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index() {
      // breadcrumb
      $breadcrumb = [
        [
          'name' => 'Dashboard',
          'route' => route('dashboard_volunteer')
        ]
      ];

      // data
      $user = Auth::user();
      $total_offer = Offer::where('id_user', $user->id_user);
      $total_accepted = Offer::where(['id_user' => $user->id_user, 'ofr_status' => 'accepted'])->count();
      $total_pending = Offer::where(['id_user' => $user->id_user, 'ofr_status' => 'pending'])->count();

      // total offer 12 month
      $total_offer_last_12_month = [];
      for ($i=1; $i<=12; $i++) {
        $total_offer_last_12_month[$i] = Offer::where(['id_user' => $user->id_user])
          ->whereYear('created_at', date('Y'))
          ->whereMonth('created_at', $i)->count();
      }

      // offer percentage
      $total_offer_last_year = Offer::where(['id_user' => $user->id_user])
                                    ->whereYear('created_at', now()->subYear()->year)->count();
      $total_offer_current_year = Offer::where(['id_user' => $user->id_user])
                                       ->whereYear('created_at', date('Y'))->count();

      $total_diff = $total_offer_current_year - $total_offer_last_year;
      $total_before = $total_offer_last_year == 0 ? 1 : $total_offer_last_year;

      $ofr_percentage = ($total_diff/$total_before)*100;

      $data = array_merge(Data::data($breadcrumb), [
        'total_offer' => $total_offer->count(),
        'offers' => $total_offer->take(5)->latest()->get(),
        'total_accepted' => $total_accepted,
        'total_pending' => $total_pending,
        'total_offer_last_12_month' => $total_offer_last_12_month,
        'ofr_percentage' => $ofr_percentage,
      ]);
      return view('volunteer/dashboard', $data);
    }
}
