@extends('layouts.main')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('js')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
@endsection

@section('content')
  {{-- modal create administrator --}}
  @include('superAdmin.registerSchool.administrator.create')

  <div class="card mb-4">
    <div class="card-header pb-0">
      <div class="row">
        <div class="col-6 d-flex align-items-center">
          <h4>
            <i class="fa fa-user me-3"></i>
            <small>Administrator</small>
          </h4>
        </div>
        <div class="col-6 text-end">
          <button type="button" class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#modal-add-admin">
            <i class="fas fa-plus"></i>&nbsp;&nbsp; Add
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table data-table">
          <thead>
            <tr class="text-dark">
              <th width="20">No</th>
              <th>Staff ID</th>
              <th>Name</th>
              <th>Position</th>
              <th>Email</th>
              <th>Phone Number</th>
            </tr>
          </thead>
          <tbody class="text-sm">
          @for($i=0; $i<count($list_administrator); $i++)
            <tr>
              <td>{{ $i+1 }}</td>
              <td>{{ $list_administrator[$i]->staff_id }}</td>
              <td>{{ $list_administrator[$i]->full_name }}</td>
              <td>{{ $list_administrator[$i]->position }}</td>
              <td>{{ $list_administrator[$i]->email }}</td>
              <td>{{ $list_administrator[$i]->phone_number }}</td>
            </tr>
          @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
