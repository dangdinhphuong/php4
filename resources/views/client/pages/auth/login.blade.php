@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Account Page</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb__content--menu__items"><span
                                        class="text-white">Account Page</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding">
            <div class="container">

                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1">
                            <form class="user" action="{{ route('submitLogin') }}" method="POST">
                            <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                        <p class="account__login--header__desc">Login if you area a returning
                                            customer.</p>
                                    </div>
                                    @if(session('retriesLeft')&& (int)session('retriesLeft') > 0)
                                        <span class="text-danger">Bạn còn {!! session('retriesLeft') !!} lượt đăng nhập tài khoản (*)</span>
                                    @endif
                                    <div class="account__login--inner">
                                            @csrf
                                            @error('email')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                            @enderror
                                            <input class="account__login--input" value="{{old('email')}}"
                                                   placeholder="Email Addres" type="email" name="email" >
                                            @error('password')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                            @enderror
                                            <input class="account__login--input" placeholder="Password" name="password" type="password">
                                            <div
                                                class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                                <div class="account__login--remember position__relative">
                                                    <input class="checkout__checkbox--input" id="check1"
                                                           type="checkbox">
                                                    <span class="checkout__checkbox--checkmark"></span>
                                                    <label class="checkout__checkbox--label login__remember--label"
                                                           for="check1">
                                                        Remember me</label>
                                                </div>
                                                <div class="account__login--forgot" type="submit">Forgot Your
                                                    Password?
                                                </div>
                                            </div>
                                            <button class="account__login--btn primary__btn" type="submit">Login
                                            </button>

                                    </div>
                                </div>
                            </div>
                            </form>
                            <form class="user" action="{{ route('registerCreate') }}" method="POST">
                                @csrf
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                        <p class="account__login--header__desc">Register here if you are a new
                                            customer</p>
                                    </div>
                                    <div class="account__login--inner">
                                        @error('email')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Email Addres" type="email" name="email" value="{{old('email')}}">
                                        @error('password')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Password" type="password" name="password">
                                        @error('password_confirmation')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Confirm Password"
                                               type="password" name="password_confirmation" >
                                        <button class="account__login--btn primary__btn mb-10" type="submit">Submit &
                                            Register
                                        </button>
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label"
                                                   for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        <!-- End login section  -->

        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="assets/img/other/shipping4.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

    </main>
@endsection

@section('javascript')

@endsection
