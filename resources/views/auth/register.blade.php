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
                                    @foreach ($videokes as $videoke)
                                          <p><strong>{{ $videoke->name }} ; {{ $videoke->number }}</strong> - PHP {{ number_format($videoke->price, 2, '.', ',') }}.</p>
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
                        <select id="videoke_id" class="form-control @error('videoke_id') is-invalid @enderror" name="videoke_id" autocomplete="videoke_id" autofocus>
                                <option value="0" selected>--- Select Videoke  ---</option>
                            @foreach ($videokes as $videoke)
                                <option value="{{ $videoke->id }}" {{ old('videoke_id') == $videoke->id ? 'selected' : '' }}>{{ $videoke->name }}</option>
                            @endforeach
                        </select>
                        @error('videoke_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
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
                      <label for="zip">Zip Code</label>
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

                  {{-- <div class="form-group">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div> --}}

                  <label for="psw">Password</label>
                  <input type="password" 
                         id="psw" 
                         name="password" 
                         class="@error('password') is-invalid @enderror" 
                         pattern=".{8,}" 
                         title="Must contain at least 8 or more characters" 
                         onkeyup='check();' 
                         required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

    {{-- <div id="message">
      <h3>Password must contain the following:</h3>
      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
      <p id="number" class="invalid">A <b>number</b></p>
      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div> --}}

    <div id="message">
      <p id="length" class="invalid">Password must be at least <b>8 characters</b></p>
    </div>

                  <div class="form-group">
                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" onkeyup='check();' autocomplete="new-password">
                    <span id='messages'></span>
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
        
          var currentDate = new Date();
              currentDate.setDate(currentDate.getDate());
            
              $('.form_datetime').datetimepicker({
                format: "MM dd, yyyy (D)",
                pickerPosition: "center",
                weekStart: 1,
                todayBtn:  1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                isRTL: false,
                autoclose: true,
                startDate: currentDate
                // setDaysOfWeekDisabled: [],
                // setDatesDisabled: 
            });
        </script>

<script>
  var myInput = document.getElementById("psw");
  // var letter = document.getElementById("letter");
  // var capital = document.getElementById("capital");
  // var number = document.getElementById("number");
  var length = document.getElementById("length");
  
  // When the user clicks on the password field, show the message box
  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  }
  
  // When the user clicks outside of the password field, hide the message box
  myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
  }
  
  // When the user starts to type something inside the password field
  myInput.onkeyup = function() {
    // Validate lowercase letters
    // var lowerCaseLetters = /[a-z]/g;
    // if(myInput.value.match(lowerCaseLetters)) {  
    //   letter.classList.remove("invalid");
    //   letter.classList.add("valid");
    // } else {
    //   letter.classList.remove("valid");
    //   letter.classList.add("invalid");
    // }
    
    // Validate capital letters
    // var upperCaseLetters = /[A-Z]/g;
    // if(myInput.value.match(upperCaseLetters)) {  
    //   capital.classList.remove("invalid");
    //   capital.classList.add("valid");
    // } else {
    //   capital.classList.remove("valid");
    //   capital.classList.add("invalid");
    // }
  
    // Validate numbers
    // var numbers = /[0-9]/g;
    // if(myInput.value.match(numbers)) {  
    //   number.classList.remove("invalid");
    //   number.classList.add("valid");
    // } else {
    //   number.classList.remove("valid");
    //   number.classList.add("invalid");
    // }
    
    // Validate length
    if(myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  }
  </script>

  <script>
    var check = function() {
  if (document.getElementById('psw').value ==
    document.getElementById('password-confirm').value) {
    document.getElementById('messages').style.color = 'green';
    document.getElementById('messages').innerHTML = 'Password is match';
  } else {
    document.getElementById('messages').style.color = 'red';
    document.getElementById('messages').innerHTML = 'Password is not match';
  }
}
  </script>
  
@endsection