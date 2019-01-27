@include('layouts.header')

<div class="centrado-vertical">
    <div class="card" style="width: 600px">
        <h4 class="card-header red lighten-1 white-text">
            {{ __('Verify Your Email Address') }}
        </h4>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </div>
    </div>
</div>
