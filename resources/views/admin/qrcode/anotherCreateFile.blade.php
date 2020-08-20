@extends('layouts.users.admin.app-panel')

@section('upper-extends')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('title', 'Customer Access Edit')

@section('sidebar')
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo-mic.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="/admin" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Courier <strong>PANEL</strong></a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>
    <ul class="sidenav-inner py-1">
        <!-- Dashboards -->
        <li class="sidenav-item">
            <a href="/admin" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Notification -->
        <li class="sidenav-item">
            <a href="/admin/notification" class="sidenav-link">
                    <i class="sidenav-icon feather icon-bell"></i>
                <div>Notification</div>
            </a>
        </li>

        <!-- Customers -->
        <li class="sidenav-item active">
            <a href="/admin/customers" class="sidenav-link">
                    <i class="sidenav-icon feather icon-user"></i>
                <div>Customers</div>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<h4 class="font-weight-bold pb-3 mb-0">QR Code Confirmation for {{ $anotherReservation->user->first_name }} {{ $anotherReservation->user->last_name }}</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Customers</li>
        <li class="breadcrumb-item active">Customer List</li>
        <li class="breadcrumb-item active">Status</li>
        <li class="breadcrumb-item active">Confirm</li>
    </ol>
</div>

<div id="app">
    <form action="/admin/customer/{{ $anotherReservation->id }}/access-confirm" method="post">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card">
                    <div class="card-header">QR Code Confirmation</div>
                    <div class="card-body">

                        <input type="hidden" value="{{ $currentDate }}" class="form-control" name="qrcode_issued_at">

                        <input type="hidden" value="Paid" class="form-control" name="is_paid">

                        <file-reader></file-reader>

                        <p style="color: red; font-weight: bold;">{{ $errors->first('qr_password') }}</p>
                
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="btn-group btn-group-md">
                                    <button type="submit" class="btn btn-outline-primary">Confirm</button>
                                    <a href="/admin/customers" class="btn btn-outline-secondary ml-4">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection