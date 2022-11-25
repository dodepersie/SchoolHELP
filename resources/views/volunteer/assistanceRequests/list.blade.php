@extends('layouts.main')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('content')
  <div class="card mb-4">
    <div class="card-header pb-0">
      <h4>
        <i class="ni ni-single-copy-04 me-3"></i>
        <small>Assistance Requests</small>
      </h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table data-table">
          <thead>
            <tr class="text-dark">
              <th width="20">No</th>
              <th>Request Date</th>
              <th>School Name</th>
              <th>City</th>
              <th>Description</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody class="text-sm">
          @for($i=0; $i<count($list_requests); $i++)
            @php
              $id_request = \Illuminate\Support\Facades\Crypt::encrypt($list_requests[$i]->id_request);
            @endphp
            <tr>
              <td>{{ $i+1 }}</td>
              <td>{{ $list_requests[$i]->created_at }}</td>
              <td>{{ $list_requests[$i]->school->sch_name }}</td>
              <td>{{ $list_requests[$i]->school->sch_city }}</td>
              <td>{{ $list_requests[$i]->req_description }}</td>
              <td class="d-flex justify-content-evenly">
                <a class="text-center btn-modal"
                   href="javascript:;"
                   data-route="{{ route('assistance_request_detail_request', ['id_request' => $id_request]) }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="View Details">
                  <i class="fa fa-info-circle text-black-50"></i>
                </a>
                <a class="text-center btn-modal"
                   href="javascript:;"
                   data-route="{{ route('assistance_request_create_offer', ['id_request' => $id_request]) }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="Submit Offer">
                  <i class="fa fa-paper-plane text-primary"></i>
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
