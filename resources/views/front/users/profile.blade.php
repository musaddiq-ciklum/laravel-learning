@extends('front/layouts.app')


@section('page_contents')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">single portfolio</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active">single portfolio</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="single-portfolio-area bg__white ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="portfolio-description mrg-sm">
                        <h2>{{ $user->name }}e</h2>
                        <div class="portfolio-info">
                            <ul>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="{{ route('change_password') }}">Change Password</a></li>

                                {{--<li><span>Created by:</span>Hamim Ahmed</li>
                                <li><span>portfolio link:</span><a href="#">https://user/Theme365/portfolio</a></li>--}}
                            </ul>
                        </div>
                        <div class="portfolio-social">
                            <ul>
                                <li>Share: </li>
                                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                <li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-portfolio-img">
                        <img src="{{ asset('front/images/portfolio/single-portfolio/2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
