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
        <small>Offers Submitted</small>
      </h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table data-table">
          <thead>
            <tr class="text-dark">
              <th width="20">No</th>
              <th width="150">Offer Date</th>
              <th width="50">Offer Status</th>
              <th class="w-100">Remarks</th>
              <th class="w-100">Request Type</th>
              <th class="w-100">School</th>
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
              <td>{{ $list_offers[$i]->created_at }}</td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm w-100 {{ $list_offers[$i]->ofr_status == 'accepted' ? 'bg-success' : 'bg-warning' }}">
                  {{ ucwords($list_offers[$i]->ofr_status) }}
                </span>
              </td>
              <td class="text-wrap">{{ $list_offers[$i]->ofr_remarks }}</td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm w-100 {{ $list_offers[$i]->assistance_request->req_type == 'tutorial' ? 'bg-primary' : 'bg-secondary' }}">
                  {{ ucwords($list_offers[$i]->assistance_request->req_type) }}
                </span>
              </td>
              <td>{{ $list_offers[$i]->assistance_request->school->sch_name }}</td>
              <td class="d-flex justify-content-evenly">
                @if($list_offers[$i]->ofr_status == 'pending')
                <a class="text-center btn-delete"
                   href="{{ route('assistance_request_delete_offer', ['id_offer' => $id_offer]) }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="Delete Offer">
                  <i class="fa fa-times text-danger"></i>
                </a>
                @endif
              </td>
            </tr>
          @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
