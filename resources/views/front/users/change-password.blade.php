@extends('front/layouts.app')


@section('page_contents')
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url({{ asset('front/images/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                @if($success)
                    <div class="alert alert-success show" role="alert">{{ $success }}</div>
                @endif

                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Change Password</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form id="changePassword" class="login" action="{{ route('post_change_password') }}" method="post">
                            @csrf

                            @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="current_password" style="margin: 0">
                            <label>Current Password</label>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="password" name="password" placeholder="">
                            <label>New Password</label>
                            <input type="password" name="password_confirmation" placeholder="">
                            <label>Confirm Password</label>
                            <div class="htc__login__btn mt--30">
                                <a href="#" onclick="$('#changePassword').submit()">Submit</a>
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
