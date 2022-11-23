@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-10">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                    {{ __('You are logged in!') }}
                    <a
                        href="
                                @if(Auth::user()->role_user == 'super_admin')
                                {{ route('dashboard_super_admin') }}
                                @elseif(Auth::user()->role_user == 'admin')
                                {{ route('dashboard_admin') }}
                                @elseif(Auth::user()->role_user == 'volunteer')
                                {{ route('dashboard_volunteer') }}
                                @endif">
                        <span class="text-primary"> Go to Dashboard </span>
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
