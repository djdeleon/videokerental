


@if  (($user->is_paid == 'Half Payment') || ($user->is_paid == 'Paid'))
    
<div class="card accountC">
    <h5 class="card-header">Account</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/home">Home</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/personalinformation">Personal Information</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/reservation">Reservation</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/payment">Payment</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></li>
    </ul>
</div>

@elseif (auth()->user()->is_paid == 'Paying')

<div class="card account">
    <h5 class="card-header center">Account</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/home">Home</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/personalinformation">Personal Information</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/reservation">Reservation</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/payment">Payment</a></li>
        <li class="list-group-item"><a href="/user/{{ $user->id }}/account/writemessage">Write Message</a></li>
    </ul>
</div>

@endif
        <div class="card videoke mb-4 mt-4">
            <h5 class="card-header center">Videoke Rates</h5>
                <div class="pl-3">
                    @foreach ($videokes as $videoke)
                        <p class="pt-2"><strong>{{ $videoke->name }} ; {{ $videoke->number }}</strong> - PHP {{ number_format($videoke->price, 2, '.', ',') }}.</p>
                    @endforeach
                </div>
        </div>
    