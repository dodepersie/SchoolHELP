<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\General\Data;
use App\Models\mRequest;
use App\Models\offer;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index() {
      // breadcrumb
      $breadcrumb = [
        [
          'name' => 'Dashboard',
          'route' => route('dashboard_admin')
        ]
      ];

      // data
      $user = Auth::user();
      $requests = mRequest::where(['id_school' => $user->id_school]);
      $total_request_tutorial = mRequest::where(['id_school' => $user->id_school, 'req_type' => 'tutorial'])->count();
      $total_request_resource = mRequest::where(['id_school' => $user->id_school, 'req_type' => 'resource'])->count();
      $offers = Offer::leftJoin('request', 'request.id_request', '=', 'offer.id_request')
                    ->leftJoin('school', 'school.id_school', '=', 'request.id_school')
                    ->where(['request.id_school' => $user->id_school]);

      // total request & offer 12 month
      $total_request_last_12_month = [];
      for ($i=1; $i<=12; $i++) {
        $total_request_last_12_month[$i] = mRequest::where(['id_school' => $user->id_school])
                                                ->whereYear('created_at', date('Y'))
                                                ->whereMonth('created_at', $i)->count();
      }
      $total_offer_last_12_month = [];
      for ($i=1; $i<=12; $i++) {
        $total_offer_last_12_month[$i] = Offer::leftJoin('request', 'request.id_request', '=', 'offer.id_request')
                                              ->leftJoin('school', 'school.id_school', '=', 'request.id_school')
                                              ->where(['request.id_school' => $user->id_school])
                                              ->whereYear('offer.created_at', date('Y'))
                                              ->whereMonth('offer.created_at', $i)->count();
      }

      // request percentage
      $total_request_last_year = mRequest::where(['id_school' => $user->id_school])
                                         ->whereYear('created_at', now()->subYear()->year)->count();
      $total_request_current_year = mRequest::where(['id_school' => $user->id_school])
                                            ->whereYear('created_at', date('Y'))->count();

      $total_diff = $total_request_current_year - $total_request_last_year;
      $total_before = $total_request_last_year == 0 ? 1 : $total_request_last_year;

      $req_percentage = ($total_diff/$total_before)*100;

      // offer percentage
      $total_offer_last_year = Offer::leftJoin('request', 'request.id_request', '=', 'offer.id_request')
                                    ->leftJoin('school', 'school.id_school', '=', 'request.id_school')
                                    ->where(['request.id_school' => $user->id_school])
                                    ->whereYear('offer.created_at', now()->subYear()->year)->count();
      $total_offer_current_year = Offer::leftJoin('request', 'request.id_request', '=', 'offer.id_request')
                                       ->leftJoin('school', 'school.id_school', '=', 'request.id_school')
                                       ->where(['request.id_school' => $user->id_school])
                                       ->whereYear('offer.created_at', date('Y'))->count();

      $total_diff = $total_offer_current_year - $total_offer_last_year;
      $total_before = $total_offer_last_year == 0 ? 1 : $total_offer_last_year;

      $offer_percentage = ($total_diff/$total_before)*100;

      $data = array_merge(Data::data($breadcrumb), [
        'total_request' => $requests->count(),
        'requests' => $requests->take(5)->latest()->get(),
        'total_request_last_12_month' => $total_request_last_12_month,
        'req_percentage' => $req_percentage,
        'total_request_tutorial' => $total_request_tutorial,
        'total_request_resource' => $total_request_resource,
        'total_offer' => $offers->count(),
        'offers' => $offers->take(5)->latest('offer.created_at')->get(),
        'total_offer_last_12_month' => $total_offer_last_12_month,
        'offer_percentage' => $offer_percentage,
      ]);
      return view('admin/dashboard', $data);
    }
}
