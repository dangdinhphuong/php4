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
                                    <h1 class="breadcrumb__content--title text-white mb-25">Liên hệ</h1>
                                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                          <li class="breadcrumb__content--menu__items"><a class="text-white"
                                                      href="{{route('home')}}">Trang chủ</a></li>
                                          <li class="breadcrumb__content--menu__items"><span class="text-white">Liên
                                                      hệ</span>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- End breadcrumb section -->

      <!-- Start contact section -->
      <section class="contact__section section--padding">
            <div class="container">
                  <div class="section__heading text-center mb-40">
                        <h2 class="section__heading--maintitle">Hãy liên lạc</h2>
                  </div>
                  <div class="main__contact--area position__relative">

                        <div class="contact__form">
                              <h3 class="contact__form--title mb-40">Liên hệ tôi</h3>
                              <form class="contact__form--inner" action="{{route('sentContact')}}" method="post">
                                    @csrf
                                    <div class="row">
                                          <div class="col-lg-6 col-md-6">
                                                <div class="contact__form--list mb-20">
                                                      <label class="contact__form--label" for="input1">Tên của bạn <span
                                                                  class="contact__form--label__star">*</span></label>
                                                      <input class="contact__form--input" name="name" id="input1"
                                                            placeholder="Tên của bạn" type="text">
                                                      @error('name')
                                                      <span class="text-danger">
                                                            {{$message}}
                                                      </span>
                                                      @enderror
                                                </div>
                                          </div>
                                          <div class="col-lg-6 col-md-6">
                                                <div class="contact__form--list mb-20">
                                                      <label class="contact__form--label" for="input2">Email <span
                                                                  class="contact__form--label__star">*</span></label>
                                                      <input class="contact__form--input" name="email" id="input2"
                                                            placeholder="Email" type="email">
                                                      @error('email')
                                                      <span class="text-danger"> {{$message}} </span>
                                                      @enderror

                                                </div>
                                          </div>
                                          <div class="col-12">
                                                <div class="contact__form--list mb-15">
                                                      <label class="contact__form--label" for="input5">Nội dung<span
                                                                  class="contact__form--label__star">*</span></label>
                                                      <textarea class="contact__form--textarea" name="description"
                                                            id="input5" placeholder="Nội dung"></textarea>
                                                </div>
                                          </div>
                                    </div>
                                    <button class="contact__form--btn primary__btn" type="submit">Liên hệ</button>
                              </form>
                        </div>
                        <div class="contact__info border-radius-5">
                              <div class="contact__info--items">
                                    <h3 class="contact__info--content__title text-white mb-15">Thông tin liên hệ</h3>
                                    <div class="contact__info--items__inner d-flex">
                                          <div class="contact__info--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="31.568" height="31.128"
                                                      viewBox="0 0 31.568 31.128">
                                                      <path id="ic_phone_forwarded_24px"
                                                            d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z"
                                                            transform="translate(-3 -1)" fill="currentColor" />
                                                </svg>
                                          </div>
                                          <div class="contact__info--content">
                                                <p class="contact__info--content__desc text-white">Điện thoại
                                                      <br> <a href="tel:{{$config->phone}}">{{$config->phone}}</a>
                                                </p>
                                          </div>
                                    </div>
                              </div>
                              <div class="contact__info--items">
                                    <h3 class="contact__info--content__title text-white mb-15">Địa chỉ email</h3>
                                    <div class="contact__info--items__inner d-flex">
                                          <div class="contact__info--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13"
                                                      viewBox="0 0 31.57 31.13">
                                                      <path id="ic_email_24px"
                                                            d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z"
                                                            transform="translate(-2 -4)" fill="currentColor" />
                                                </svg>
                                          </div>
                                          <div class="contact__info--content">
                                                <p class="contact__info--content__desc text-white"><a
                                                            href="mailto:{{$config->email}}">{{$config->email}}</a></p>
                                          </div>
                                    </div>
                              </div>
                              <div class="contact__info--items">
                                    <h3 class="contact__info--content__title text-white mb-15">Chi nhánh</h3>
                                    <div class="contact__info--items__inner d-flex">
                                          <div class="contact__info--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13"
                                                      viewBox="0 0 31.57 31.13">
                                                      <path id="ic_account_balance_24px"
                                                            d="M5.323,14.341V24.718h4.985V14.341Zm9.969,0V24.718h4.985V14.341ZM2,32.13H33.57V27.683H2ZM25.262,14.341V24.718h4.985V14.341ZM17.785,1,2,8.412v2.965H33.57V8.412Z"
                                                            transform="translate(-2 -1)" fill="currentColor" />
                                                </svg>
                                          </div>
                                          <div class="contact__info--content">
                                                <p class="contact__info--content__desc text-white"> {{$config->address}}
                                                </p>
                                          </div>
                                    </div>
                              </div>
                              <div class="contact__info--items">
                                    <h3 class="contact__info--content__title text-white mb-15">Theo dõi chúng tôi</h3>
                                    <ul class="contact__info--social d-flex">
                                          <li class="contact__info--social__list">
                                                <a class="contact__info--social__icon" target="_blank"
                                                      href="https://www.facebook.com/">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="7.667"
                                                            height="16.524" viewBox="0 0 7.667 16.524">
                                                            <path data-name="Path 237"
                                                                  d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                                  transform="translate(-960.13 -345.407)"
                                                                  fill="currentColor"></path>
                                                      </svg>
                                                      <span class="visually-hidden">Facebook</span>
                                                </a>
                                          </li>
                                          <li class="contact__info--social__list">
                                                <a class="contact__info--social__icon" target="_blank"
                                                      href="https://twitter.com/">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16.489"
                                                            height="13.384" viewBox="0 0 16.489 13.384">
                                                            <path data-name="Path 303"
                                                                  d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                                  transform="translate(-951.23 -1140.849)"
                                                                  fill="currentColor"></path>
                                                      </svg>
                                                      <span class="visually-hidden">Twitter</span>
                                                </a>
                                          </li>
                                          <li class="contact__info--social__list">
                                                <a class="contact__info--social__icon" target="_blank"
                                                      href="https://www.instagram.com/">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16.497"
                                                            height="16.492" viewBox="0 0 19.497 19.492">
                                                            <path data-name="Icon awesome-instagram"
                                                                  d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                                                                  transform="translate(0.004 -1.492)"
                                                                  fill="currentColor" />
                                                      </svg>
                                                      <span class="visually-hidden">Instagram</span>
                                                </a>
                                          </li>
                                          <li class="contact__info--social__list">
                                                <a class="contact__info--social__icon" target="_blank"
                                                      href="https://www.youtube.com/">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16.49"
                                                            height="11.582" viewBox="0 0 16.49 11.582">
                                                            <path data-name="Path 321"
                                                                  d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                                  transform="translate(-951.269 -1359.8)"
                                                                  fill="currentColor"></path>
                                                      </svg>
                                                      <span class="visually-hidden">Youtube</span>
                                                </a>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- End contact section -->

      <!-- Start contact map area -->
      <div class="contact__map--area section--padding pt-0">
            <iframe class="contact__map--iframe"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14892.634016654582!2d105.84077260000001!3d21.06633065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aa5872b4a417%3A0x4f6a06226e05b679!2zMjHCsDA0JzA3LjgiTiAxMDXCsDQ5JzQ2LjkiRQ!5e0!3m2!1svi!2s!4v1651687864957!5m2!1svi!2s"
                  style="border:0;" allowfullscreen="" loading="lazy"></iframe>

      </div>
      <!-- End contact map area -->

      <!-- Start brand logo section -->
      <div class="brand__logo--section bg__secondary section--padding">
            <div class="container-fluid">
                  <div class="row row-cols-1">
                        <div class="col">
                              <div class="brand__logo--section__inner d-flex justify-content-center align-items-center">
                                    <div class="brand__logo--items">
                                          <img class="brand__logo--items__thumbnail--img display-block"
                                                src="assets/img/logo/brand-logo1.png" alt="brand logo">
                                    </div>
                                    <div class="brand__logo--items">
                                          <img class="brand__logo--items__thumbnail--img display-block"
                                                src="assets/img/logo/brand-logo2.png" alt="brand logo">
                                    </div>
                                    <div class="brand__logo--items">
                                          <img class="brand__logo--items__thumbnail--img display-block"
                                                src="assets/img/logo/brand-logo3.png" alt="brand logo">
                                    </div>
                                    <div class="brand__logo--items">
                                          <img class="brand__logo--items__thumbnail--img display-block"
                                                src="assets/img/logo/brand-logo4.png" alt="brand logo">
                                    </div>
                                    <div class="brand__logo--items">
                                          <img class="brand__logo--items__thumbnail--img display-block"
                                                src="assets/img/logo/brand-logo5.png" alt="brand logo">
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <!-- End brand logo section -->

      <!-- Start shipping section -->
      <section class="shipping__section2 shipping__style3 section--padding pt-0" style="margin-top:80px">
            <div class=" container">
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