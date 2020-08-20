@extends('layouts.users.courier.app-panel')

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
        <a href="/courier" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Courier <strong>PANEL</strong></a>
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>
    <ul class="sidenav-inner py-1">
        <!-- Dashboards -->
        <li class="sidenav-item">
            <a href="/courier" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Notification -->
        <li class="sidenav-item">
            <a href="/courier/notification" class="sidenav-link">
                    <i class="sidenav-icon feather icon-bell"></i>
                <div>Notification</div>
            </a>
        </li>

        <!-- Customers -->
        <li class="sidenav-item active">
            <a href="/courier/customers" class="sidenav-link">
                    <i class="sidenav-icon feather icon-user"></i>
                <div>Customers</div>
            </a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="container" style="padding-top: 25vh;">
    <div class="row text-center">
        <div class="col-md-12">
            <h1>Choose Confirmation Method:</h1>
            <h2><a href="/courier/customers/{{ $user->id }}/access/confirm-return">Camera</a> | <a href="/courier/customers/{{ $user->id }}/access/confirm-return-file">Files</a></h2>
            <a href="/courier/customers" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
</div>

@endsection