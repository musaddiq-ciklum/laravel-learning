@extends('front/layouts.app')


@section('page_contents')
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{ asset('front/images/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
    <div class="container">
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    @if(session('status'))
                        <div class="alert alert-success show" role="alert">{{ session('status') }}</div>
                    @endif
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form id="resetPassword" class="login" action="{{ route('password.email') }}" method="post">
                            @csrf

                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" style="margin: 0">


                            <div class="htc__login__btn mt--30">
                                <a href="#" onclick="$('#resetPassword').submit()">Submit</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
<!-- End Login Register Area -->
@stop
