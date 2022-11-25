@extends('layouts.main')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('js')
  <script type="text/javascript" charset="utf8"
          src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('content')
  <div class="card mb-4">
    <div class="card-header pb-0">
      <h4 class="mb-3">
        <i class="fa fa-file-text-o me-3"></i>
        <small>Request Details</small>
      </h4>
      <table>
        <tbody>
          <tr>
            <th>Description</th>
            <th class="pe-2">:</th>
            <td>{{ $assistance_request->req_description }}</td>
          </tr>
          @if($assistance_request->req_type == "tutorial")
          <tr>
            <th>Proposed Date Time</th>
            <th>:</th>
            <td class="text-uppercase">{{ $assistance_request->proposed_date_time }}</td>
          </tr>
          <tr>
            <th>Student Level</th>
            <th>:</th>
            <td class="text-uppercase">{{ $assistance_request->req_student_level }}</td>
          </tr>
          <tr>
            <th>No. of Student</th>
            <th>:</th>
            <td class="text-uppercase">{{ $assistance_request->req_no_of_student }}</td>
          </tr>
          @elseif($assistance_request->req_type == "resource")
          <tr>
            <th>Resource Type</th>
            <th>:</th>
            <td class="text-uppercase">{{ $assistance_request->req_resource_type }}</td>
          </tr>
          <tr>
            <th>No. of Resource</th>
            <th>:</th>
            <td class="text-uppercase">{{ $assistance_request->req_no_of_resource }}</td>
          </tr>
          @endif
          <tr>
            <th>Status</th>
            <th>:</th>
            <td class="text-uppercase">{{ $assistance_request->req_status }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-body">
      <h4 class="mb-3">
        <i class="ni ni-single-copy-04 me-3"></i>
        <small>Offers</small>
      </h4>
      <div class="table-responsive">
        <table class="table data-table">
          <thead>
          <tr class="text-dark">
            <th width="20">No</th>
            <th class="w-55">Remarks</th>
            <th >Offer Date</th>
            <th class="w-10">Status</th>
            <th width="100">Action</th>
          </tr>
          </thead>
          <tbody class="text-sm">
          @for($i=0; $i<count($list_offers); $i++)
            @php
              $id_offer = \Illuminate\Support\Facades\Crypt::encrypt($list_offers[$i]->id_offer);
            @endphp
            <tr>
              <td>{{ $i+1 }}</td>
              <td class="text-wrap">{{ $list_offers[$i]->ofr_remarks }}</td>
              <td>{{ $list_offers[$i]->created_at }}</td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm w-100 {{ $list_offers[$i]->ofr_status == 'accepted' ? 'bg-success' : 'bg-warning' }}">
                  {{ ucwords($list_offers[$i]->ofr_status) }}
                </span>
              </td>
{{--              <td>{{ $list_offers[$i]->user->full_name }}</td>--}}
{{--              <td>{{ $year > 1 ? $year.' years old' : $year.' year old' }}</td>--}}
{{--              <td>{{ $list_offers[$i]->user->occupation }}</td>--}}
              <td class="d-flex justify-content-evenly">
                <a class="text-center btn-modal"
                   href="javascript:;"
                   data-route="{{ route('offer_detail', ['id_offer' => $id_offer]) }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="View Offer Details">
                  <i class="fa fa-file-text-o text-dark"></i>
                </a>
              </td>
            </tr>
          @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
