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
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form id="resetPassword" class="login" action="{{ route('password.update') }}" method="post">
                            @csrf

                            <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Email" style="margin: 0">

                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password"   style="margin: 0">

                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                                <input type="password" name="password_confirmation"  style="margin: 0">

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
