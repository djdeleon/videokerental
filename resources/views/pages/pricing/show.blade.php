@extends('layouts.users.guest.app')

@section('title', 'Videoke Rental Website | Home')

@section('content')

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavAdjust">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/">Videoke Rental</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto text-center">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
    <section class="page-section">
      <div class="container">
          
            <div class="row pb-5">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header font-weight-bolder text-center pl-5">VIDEOKE RATES</div>
                            <div class="card-body text-center">
                                <ul>
                                    @foreach ($videokes as $videokeRates)
                                          <p><strong>{{ $videokeRates->name }} ; {{ $videokeRates->number }}</strong> - PHP {{ number_format($videokeRates->price, 2, '.', ',') }}.</p>
                                      @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-7 pt">
                        <div class="card">
                            <div class="card-header">Reserved Videoke Schedule</div>
                            <div class="card-body">
                              @if ($users->count() == 0)
                                  <td>No Reservation Yet</td>
                              @endif
                                @foreach ($users as $user)
                                @if (($currentTime < $user->date_return()) && ($user->is_paid == 'Paid'))
                                    <ul>
                                      <li>{{ $user->checked_in_at->format('F d, Y g:i A') }} to {{ $user->date_return() }}</li>
                                    </ul>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-3">
                        </div>
                </div>

        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Register</h2>
            <h3 class="section-subheading text-muted">Create Your Account</h3>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <form class="form-prevent-multiple-submits" action="/register" method="POST">
                @csrf

              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="videoke_id" class="col-form-label text-md-right">Videoke Package</label>
                    <select id="videoke_id" class="form-control" name="videoke_id" autocomplete="videoke_id" autofocus>
                            <option value="{{ $videoke->id }}">{{ $videoke->name }}</option>
                    </select>
              </div>

                  <div class="form-group">
                        <label for="checked_in_at" class="col-form-label text-md-right">Date of Reservation</label>
                        <div class="input-group date form_datetime" data-date-format="dd MM yyyy - HH:ii P" data-link-field="checked_in_at">
                            <input class="form-control fs @error('checked_in_at') is-invalid @enderror" size="40" value="{{ old('checked_in_at') }}" type="text" readonly style="background-color: #fff;">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            @error('checked_in_at')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror  
                        </div>
                        <input type="hidden" id="checked_in_at" name="checked_in_at" value="{{ old('checked_in_at') }}" /><br/>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name" class="col-form-label text-md-right">First Name</label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>
    
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
    
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="last_name" class="col-form-label text-md-right">Last Name</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                            
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="1234 Main St">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="address_2">Address 2</label>
                    <input type="text" name="address_2" value="{{ old('address_2') }}" class="form-control @error('address_2') is-invalid @enderror" placeholder="Apartment, studio, or floor">
                    @error('address_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="city">City</label>
                      <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror">
                      @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                    </div>
                    <div class="form-group col-md-4">
                      <label for="brgy">Brgy.</label>
                      <input type="text" name="brgy" value="{{ old('brgy') }}" class="form-control @error('brgy') is-invalid @enderror">
                      @error('brgy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                    </div>
                    <div class="form-group col-md-2">
                      <label for="zip">Zip</label>
                      <input type="text" name="zip" value="{{ old('zip') }}" class="form-control @error('zip') is-invalid @enderror">
                      @error('zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                    </div>
                  </div>

                  <p><strong>Note:</strong> Our location is only for <strong>Palmera area</strong>, we cannot provide any services outside the location. Thank you.</p>

                  <div class="form-group">
                    <label for="gender" class="col-form-label text-md-right">Gender</label>
                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" autocomplete="gender" autofocus>
                        <option value="0" selected>--- Select Gender  ---</option>
                        <option value="male" @if (old('gender') == "male") {{ 'selected' }} @endif>Male</option>
                        <option value="female" @if (old('gender') == "female") {{ 'selected' }} @endif>Female</option>
                      </select>
                      @error('gender')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror  
                  </div>

                  <div class="form-group">
                    <label for="age" class="col-form-label text-md-right">Age</label>
                    <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                  </div>

                  <div class="form-group">
                    <label for="phone" class="col-form-label text-md-right">Contact Number</label>
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                  </div>

                  <div class="form-group">
                    <label for="payment_id" class="col-form-label text-md-right">Payment</label>
                    <select id="payment_id" class="form-control @error('payment_id') is-invalid @enderror" name="payment_id">
                          <option value="0" selected>--- Select Payment  ---</option>
                        @foreach ($payments as $payment)
                          <option value="{{ $payment->id }}" {{ old('payment_id') == $payment->id ? 'selected' : '' }}>{{ $payment->name }}</option>
                        @endforeach
                    </select>
                    @error('payment_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                  </div>

                </div>
                <div class="col-md-3"></div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    
                  </div>
                </div> --}}
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <button class="button-prevent-multiple-submits btn btn-outline-primary mt-3" type="submit">Register</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    
        <script type="text/javascript" src="{{ asset('jquery/jquery-1.8.3.min.js') }}" charset="UTF-8"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
        <script type="text/javascript">
        
          var date = new Date();
              date.setDate(date.getDate());
            
              $('.form_datetime').datetimepicker({
                format: "dd MM yyyy - HH:ii P",
                pickerPosition: "center",
                weekStart: 1,
                todayBtn:  1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                isRTL: false,
                autoclose: true,
                startDate: date
                // setDaysOfWeekDisabled: [],
                // setDatesDisabled: 
            });
        </script>
  
@endsection