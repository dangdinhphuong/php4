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
                                    <h1 class="breadcrumb__content--title text-white mb-25">Tài khoản</h1>
                                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                          <li class="breadcrumb__content--menu__items"><a class="text-white"
                                                      href="{{ route('home') }}">Trang chủ</a></li>
                                          <li class="breadcrumb__content--menu__items"><span
                                                      class="text-white">{{ ucwords(str_replace('_', ' ', request()->route()->getName())) }}</span>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- End breadcrumb section -->

      <!-- my account section start -->
      <section class="my__account--section section--padding">
            <div class="container">
                  <p class="account__welcome--text">Xin chào, khách hàng mới chào mừng bạn đến với bảng điều khiển của
                        bạn!
                  </p>
                  <div class="my__account--section__inner border-radius-10 d-flex">
                        <div class="account__left--sidebar">
                              <h2 class="account__content--title h3 mb-20">Hồ sơ của tôi</h2>
                              <ul class="account__menu">
                                    <li
                                          class="account__menu--list {{ request()->route()->getName() == "profile" ? "active" : "" }}">
                                          <a href="{{ route('profile') }}">Hồ sơ</a>
                                    </li>
                                    <li
                                          class="account__menu--list {{ request()->route()->getName() == "order" || request()->route()->getName() == "order_detail" ? "active" : "" }}">
                                          <a href="{{ route('order') }}">Lịch sử mua hàng</a>
                                    </li>
                                    <li class="account__menu--list"><a href="{{route('logout')}}">Đăng xuất</a></li>
                              </ul>
                        </div>

                        @yield('child-content')

                  </div>
            </div>
      </section>
      <!-- my account section end -->

      <!-- Start shipping section -->
      <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                  <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                        <div class="shipping__items2 d-flex align-items-center">
                              <div class="shipping__items2--icon">
                                    <img src="assets/img/other/shipping1.png" alt="">
                              </div>
                              <div class="shipping__items2--content">
                                    <h2 class="shipping__items2--content__title h3">Giao hàng</h2>
                                    <p class="shipping__items2--content__desc">Được lựa chọn cẩn thận</p>
                              </div>
                        </div>
                        <div class="shipping__items2 d-flex align-items-center">
                              <div class="shipping__items2--icon">
                                    <img src="assets/img/other/shipping2.png" alt="">
                              </div>
                              <div class="shipping__items2--content">
                                    <h2 class="shipping__items2--content__title h3">Thanh toán</h2>
                                    <p class="shipping__items2--content__desc">Được lựa chọn cẩn thận</p>
                              </div>
                        </div>
                        <div class="shipping__items2 d-flex align-items-center">
                              <div class="shipping__items2--icon">
                                    <img src="assets/img/other/shipping3.png" alt="">
                              </div>
                              <div class="shipping__items2--content">
                                    <h2 class="shipping__items2--content__title h3">Mẫu mã</h2>
                                    <p class="shipping__items2--content__desc">Được lựa chọn cẩn thận</p>
                              </div>
                        </div>
                        <div class="shipping__items2 d-flex align-items-center">
                              <div class="shipping__items2--icon">
                                    <img src="assets/img/other/shipping4.png" alt="">
                              </div>
                              <div class="shipping__items2--content">
                                    <h2 class="shipping__items2--content__title h3">Hỗ trợ</h2>
                                    <p class="shipping__items2--content__desc">Được lựa chọn cẩn thận</p>
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