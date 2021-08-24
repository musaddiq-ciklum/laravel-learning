@extends('front/layouts.app')


@section('page_contents')
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{ asset('front/images/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    @if(session('status'))
                    <div class="text-danger">{{ session('status') }}</div>
                    @endif
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form id="loginForm" class="login" action="{{ route('post_user_login') }}" method="post">
                            @csrf

                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="email" name="email" placeholder="User Name*">
                            <input type="password" name="password" placeholder="Password*">

                            <div class="tabs__checkbox">
                                <input type="checkbox" style="height: 15px;width: 15px;">
                                <span> Remember me</span>
                                <span class="forget"><a href="{{ route('password.request') }}">Forget Pasword?</a></span>
                            </div>
                            <div class="htc__login__btn mt--30">
                                <a href="#" onclick="$('#loginForm').submit()">Login</a>
                            </div>
                        </form>
                        {{--<div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>

                                <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>

                                <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>

                                <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>--}}
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form id="registerForm" action="{{ route('user_register') }}" class="login" method="post">
                            @csrf
                            <input type="text" name="name" placeholder="Name*">
                            <input type="email" name="email" placeholder="Email*">
                            <input type="password" name="password" placeholder="Password*">

                            <div class="htc__login__btn">
                                <a href="#" onclick="$('#registerForm').submit()">register</a>
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
