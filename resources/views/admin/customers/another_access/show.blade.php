@extends('layouts.users.admin.app-panel')

@section('title', 'Customer Access')

@section('sidebar')
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/img/logo-mic.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="/admin" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Admin <strong>PANEL</strong></a>
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
        <li class="sidenav-item open active">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Customers</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item active">
                    <a href="/admin/customers" class="sidenav-link">
                        <div>Customer List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/paying" class="sidenav-link">
                        <div>Paying</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/firstpayment" class="sidenav-link">
                        <div>First Payment</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/customers/fullypaid" class="sidenav-link">
                        <div>Fully Paid</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Reservation --}}
        <li class="sidenav-item">
            <a href="/admin/reservations" class="sidenav-link">
                <i class="sidenav-icon feather icon-file-text"></i>
                <div>Reservation</div>
            </a>
        </li>

        {{-- Videoke --}}
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-mic"></i>
                <div>Videoke</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/videokelists" class="sidenav-link">
                        <div>Videoke List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/videokes" class="sidenav-link">
                        <div>Videoke Package</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/videokes/rent" class="sidenav-link">
                        <div>Videoke On Rent</div>
                    </a>
                </li>
            </ul>
        </li>

        <!--  Payment -->
        <li class="sidenav-item">
            <a href="/admin/payments" class="sidenav-link">
                <i class="sidenav-icon feather icon-credit-card"></i>
                <div>Payment</div>
            </a>
        </li>

        {{-- Transaction --}}
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-globe"></i>
                <div>Transactions</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/transactions" class="sidenav-link">
                        <div>Transaction List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/transaction/palawanexpress" class="sidenav-link">
                        <div>Palawan Express</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/transaction/smartpadala" class="sidenav-link">
                        <div>Smart Padala</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/transaction/bayadcenter" class="sidenav-link">
                        <div>Bayad Center</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Sales --}}
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-shopping-cart"></i>
                <div>Sales</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="/admin/sales" class="sidenav-link">
                        <div>Sales List</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="/admin/sales/chart" class="sidenav-link">
                        <div>Chart</div>
                    </a>
                </li>
                <li class="sidenav-item">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <div>Monthly</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="/admin/sales/january" class="sidenav-link">
                                    <div>January</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/february" class="sidenav-link">
                                    <div>February</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/march" class="sidenav-link">
                                    <div>March</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/april" class="sidenav-link">
                                    <div>April</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/may" class="sidenav-link">
                                    <div>May</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/june" class="sidenav-link">
                                    <div>June</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/july" class="sidenav-link">
                                    <div>July</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/august" class="sidenav-link">
                                    <div>August</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/september" class="sidenav-link">
                                    <div>September</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/october" class="sidenav-link">
                                    <div>October</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/november" class="sidenav-link">
                                    <div>November</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <a href="/admin/sales/december" class="sidenav-link">
                                    <div>December</div>
                                </a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </li>
    </ul>
</div>
@endsection

@section('content')
<h4 class="font-weight-bold pb-3 mb-0">Customer Access for {{ $anotherReservation->user->first_name }} {{ $anotherReservation->user->last_name }}</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item active">Customers</li>
        <li class="breadcrumb-item active">Customer List</li>
        <li class="breadcrumb-item active">Customer Access</li>
    </ol>
</div>

<div class="col-lg-12">
    <p><a href="/admin/customers" class="btn btn-outline-secondary">Back</a></p>
</div>

@include('layouts.users.admin.session')

<div class="table-responsive">
    <table class="table table-bordered bg-white">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>User Type</th>
                <th>Account Status</th>
                <th>Payment Status</th>
                <th>Videoke Status</th>
                <th>Videoke Delivery Date</th>
                <th>Videoke Return Date</th>
                <th>Payment Confirmation Date Issued</th>
                <th>Videoke Date Returned Issued</th>
                <th>Customer Registered Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $anotherReservation->user->id - 2 }}</td>
                    @if ( $anotherReservation->user->usertype == 'Admin')
                        <td><h5><span class="badge badge-pill badge-info">{{ $anotherReservation->user->usertype }}</span></h5></td>
                    @else
                        <td><h5><span class="badge badge-pill badge-secondary">{{ $anotherReservation->user->usertype }}</span></h5></td>
                    @endif
                    @if ( $anotherReservation->user->is_expired == 'Active' )
                        <td><h5><span class="badge badge-pill badge-success">{{ $anotherReservation->user->is_expired }}</span></h5></td>
                    @else
                        <td><h5><span class="badge badge-pill badge-danger">{{ $anotherReservation->user->is_expired }}</span></h5></td>
                    @endif
                    @if ($anotherReservation->is_paid == 'Paid')
                        <td><h5><span class="badge badge-pill badge-success">{{ $anotherReservation->is_paid }}</span></h5></td>
                    @elseif ($anotherReservation->is_paid == 'Half Payment')
                        <td><h5><span class="badge badge-pill badge-warning">{{ $anotherReservation->is_paid }}</span></h5></td>
                    @else
                        <td><h5><span class="badge badge-pill badge-danger">{{ $anotherReservation->is_paid }}</span></h5></td>
                    @endif
                    @if ($anotherReservation->is_return == 'Return')
                        <td><h5><span class="badge badge-pill badge-success">{{ $anotherReservation->is_return }}</span></h5></td>
                    @elseif ($anotherReservation->is_return == 'Operating')
                        <td>
                            <h5><span class="badge badge-pill badge-warning mr-2">{{ $anotherReservation->is_return }}</span></h5>
                        </td>
                    @else
                        <td><h5><span class="badge badge-pill badge-danger">{{ $anotherReservation->is_return }}</span></h5></td>
                    @endif
                    <td>{{ $anotherReservation->reserve_format() }}</td>

                    <td>{{ $anotherReservation->reserve_return_format() }}</td>

                    @if ($anotherReservation->is_paid == 'Paid')
                    <td>{{ $anotherReservation->qrcode_issued_at_format() }}</td>
                    @else
                        <td>Not Yet Issued</td>
                    @endif
                   
                    @if ($anotherReservation->is_return == 'Return')
                        <td>{{ $anotherReservation->videoke_return_issued_at_format() }}</td>
                    @else
                        <td>Not Yet Issued</td>
                    @endif
                    <td>{{ $anotherReservation->user->created_at->format('F d, Y (D) - g:i A') }} - {{ $anotherReservation->user->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="btn-group">

                            
                        </div>

                        <div class="btn-group">
                            @if ($anotherReservation->is_paid == 'Paid')
                                <a href="/admin/customer/{{ $anotherReservation->id }}/access/edit" class="btn btn-outline-primary m-1">Edit</a>
                                @elseif ($anotherReservation->is_paid == 'Half Payment')
                                <a href="/admin/customer/{{ $anotherReservation->id }}/access/edit" class="btn btn-outline-primary m-1">Edit</a>
                                {{-- /admin/customer/{{ $anotherReservation->id }}/access/confirm --}}
                                <a href="/admin/customer/{{ $anotherReservation->id }}/access/confirm-choice" class="btn btn-outline-success m-1">Confirm</a>
                                @elseif ($anotherReservation->is_paid == 'Paying')
                                <a href="/admin/customer/{{ $anotherReservation->id }}/access/edit" class="btn btn-outline-primary m-1">Edit</a>
                                @endif
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
</div>

@endsection