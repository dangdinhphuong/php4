@extends('client.master')
@section('title', 'Suruchi - Fashion')
@section('content')

<main class="main__content_wrapper">
      <!-- Start slider section -->
      <section class="hero__slider--section">
            <div class="hero__slider--inner hero__slider--activation swiper">
                  <div class="hero__slider--wrapper swiper-wrapper">
                        @foreach($sliders as $slider)
                        <div class="swiper-slide ">
                              <div class="hero__slider--items home1__slider--bg" style="  background: url({{asset('storage/' .$slider->image)}}); background-repeat: no-repeat;
                            background-attachment: scroll;
                            background-position: center center;
                            background-size: cover;">
                                    <div class="container-fluid">
                                          <div class="hero__slider--items__inner">
                                                <div class="row row-cols-1">
                                                      <div class="col">
                                                            <div class="slider__content">
                                                                  {{-- <p class="slider__content--desc desc1 mb-15"><img--}}
                                                                  {{-- class="slider__text--shape__icon"--}}
                                                                  {{-- src="assets/img/icon/text-shape-icon.png" alt="text-shape-icon">--}}
                                                                  {{-- New Product</p>--}}
                                                                  <h2 class="slider__content--maintitle h1"></h2>
                                                                  <p
                                                                        class="slider__content--desc desc2 d-sm-2-none mb-40">
                                                                  </p>
                                                                  <a class="slider__btn primary__btn"
                                                                        href="{{ route('product',['slug'=>$slider->link]) }}">Show
                                                                        Collection
                                                                        <svg class="primary__btn--arrow__icon"
                                                                              xmlns="http://www.w3.org/2000/svg"
                                                                              width="20.2" height="12.2"
                                                                              viewBox="0 0 6.2 6.2">
                                                                              <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                                                                    transform="translate(-4 -4)"
                                                                                    fill="currentColor"></path>
                                                                        </svg>
                                                                  </a>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        @endforeach

                  </div>
                  <div class="swiper__nav--btn swiper-button-next"></div>
                  <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
      </section>
      <!-- End slider section -->


      <!-- Start product section -->
      <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                  <div class="section__heading text-center mb-35">
                        <h2 class="section__heading--maintitle">SẢN PHẨM MỚI</h2>
                  </div>
                  <ul class="product__tab--one product__tab--primary__btn d-flex justify-content-center mb-50">

                        @if( isset($category) && $category->count()>0)
                        @for( $i=0 ; $i < $category->count() ; $i++)
                              @if($i < 3) <li class="product__tab--primary__btn__list {{ $i == 0 ? 'active' : ''  }}"
                                    data-toggle="tab" data-target="#{{$category[$i]->slug}}">
                                    {{$category[$i]->nameCate}}
                                    </li>
                                    @endif
                                    @endfor
                                    @endif
                  </ul>
                  <div class="tab_content">
                        @for( $i=0 ; $i < $category->count() ; $i++)
                              @if($i < 3) <div id="{{$category[$i]->slug}}"
                                    class="tab_pane {{ $i == 0 ? 'active show' : ''  }}">
                                    <div class="product__section--inner">
                                          <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                                @foreach($category[$i]->products->take(20) as $product)
                                                @if($product->status != 0)
                                                <div class="col mb-30">
                                                      <div class="product__items ">
                                                            <div class="product__items--thumbnail">
                                                                  <a class="product__items--link"
                                                                        href="{{ route('product',['slug'=>$product->slug]) }}">
                                                                        <img class="product__items--img product__primary--img"
                                                                              src="{{asset('storage/' .$product->image)}}"
                                                                              alt="product-img">
                                                                        <img class="product__items--img product__secondary--img"
                                                                              src="{{asset('storage/' .(!empty($product->images[0]->image_path) ? $product->images[0]->image_path: ''))}}"
                                                                              alt="product-img">
                                                                  </a>
                                                                  <div class="product__badge">
                                                                        <span
                                                                              class="product__badge--items sale">Sale</span>
                                                                  </div>
                                                            </div>
                                                            <div class="product__items--content">
                                                                  <span class="product__items--content__subtitle">
                                                                        {{$category[$i]->nameCate}}</span>
                                                                  <h4 class="product__items--content__title"><a
                                                                              href="{{ route('product',['slug'=>$product->slug]) }}">{{ \Illuminate\Support\Str::limit($product->namePro, 30, '...') }}</a>
                                                                  </h4>
                                                                  <div class="product__items--price">
                                                                        @if($product->discounts > 0)
                                                                        <span
                                                                              class="current__price">{{ number_format(($product->price-(($product->price * $product->discounts )/100)), 0, ',', '.') . " VNĐ"   }}</span>
                                                                        <span class="price__divided"></span>
                                                                        <span
                                                                              class="old__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }}</span>
                                                                        @else
                                                                        <span class="current__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }}
                                                                        </span>
                                                                        @endif
                                                                  </div>
                                                                  <ul class="rating product__rating d-flex">
                                                                        <li class="rating__list">
                                                                              <span class="rating__list--icon">
                                                                                    <svg class="rating__list--icon__svg"
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="14.105" height="14.732"
                                                                                          viewBox="0 0 10.105 9.732">
                                                                                          <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor">
                                                                                          </path>
                                                                                    </svg>
                                                                              </span>
                                                                        </li>
                                                                        <li class="rating__list">
                                                                              <span class="rating__list--icon">
                                                                                    <svg class="rating__list--icon__svg"
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="14.105" height="14.732"
                                                                                          viewBox="0 0 10.105 9.732">
                                                                                          <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor">
                                                                                          </path>
                                                                                    </svg>
                                                                              </span>
                                                                        </li>
                                                                        <li class="rating__list">
                                                                              <span class="rating__list--icon">
                                                                                    <svg class="rating__list--icon__svg"
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="14.105" height="14.732"
                                                                                          viewBox="0 0 10.105 9.732">
                                                                                          <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor">
                                                                                          </path>
                                                                                    </svg>
                                                                              </span>
                                                                        </li>
                                                                        <li class="rating__list">
                                                                              <span class="rating__list--icon">
                                                                                    <svg class="rating__list--icon__svg"
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="14.105" height="14.732"
                                                                                          viewBox="0 0 10.105 9.732">
                                                                                          <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor">
                                                                                          </path>
                                                                                    </svg>
                                                                              </span>
                                                                        </li>
                                                                        <li class="rating__list">
                                                                              <span class="rating__list--icon">
                                                                                    <svg class="rating__list--icon__svg"
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="14.105" height="14.732"
                                                                                          viewBox="0 0 10.105 9.732">
                                                                                          <path data-name="star - Copy"
                                                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                                                transform="translate(0 -0.018)"
                                                                                                fill="currentColor">
                                                                                          </path>
                                                                                    </svg>
                                                                              </span>
                                                                        </li>

                                                                  </ul>
                                                                  <ul class="product__items--action d-flex">
                                                                        <li class="product__items--action__list w-100 text-center"
                                                                              style="">
                                                                              <div class="product__items--action__btn add__to--cart"
                                                                                    onclick="addCart({{$product->id}})">
                                                                                    <svg class="product__items--action__btn--svg"
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          width="22.51" height="20.443"
                                                                                          viewBox="0 0 14.706 13.534">
                                                                                          <g transform="translate(0 0)">
                                                                                                <g>
                                                                                                      <path data-name="Path 16787"
                                                                                                            d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                                                            transform="translate(0 -463.248)"
                                                                                                            fill="currentColor">
                                                                                                      </path>
                                                                                                      <path data-name="Path 16788"
                                                                                                            d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                                                            transform="translate(-1.191 -466.622)"
                                                                                                            fill="currentColor">
                                                                                                      </path>
                                                                                                      <path data-name="Path 16789"
                                                                                                            d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                                                            transform="translate(-2.875 -466.622)"
                                                                                                            fill="currentColor">
                                                                                                      </path>
                                                                                                </g>
                                                                                          </g>
                                                                                    </svg>
                                                                                    <span class="add__to--cart__text"> +
                                                                                          Thêm giỏ hàng</span>
                                                                              </div>
                                                                        </li>
                                                                  </ul>
                                                            </div>
                                                      </div>
                                                </div>
                                                @endif
                                                @endforeach
                                          </div>
                                    </div>
                  </div>
                  @endif
                  @endfor
            </div>
            </div>
      </section>
      <!-- End product section -->

      <!-- Start deals banner section -->
      <section class="deals__banner--section section--padding pt-0">
            <div class="container-fluid">
                  <div class="deals__banner--inner banner__bg">
                        <div class="row row-cols-1 align-items-center">
                              <div class="col">
                                    <div class="deals__banner--content position__relative">
                                          <span class="deals__banner--content__subtitle text__secondary">Nhanh chóng và
                                                được giảm giá 25%</span>
                                          <h2 class="deals__banner--content__maintitle">Giao dịch trong ngày</h2>
                                          <p class="deals__banner--content__desc">Theo dõi thời gian khuyến mại</p>
                                          <div class="deals__banner--countdown d-flex"
                                                data-countdown="Sep 30, 2022 00:00:00"></div>
                                          <a class="primary__btn" href="">Hiển thị bộ sưu tập
                                                <svg class="primary__btn--arrow__icon"
                                                      xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2"
                                                      viewBox="0 0 6.2 6.2">
                                                      <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                                            transform="translate(-4 -4)" fill="currentColor"></path>
                                                </svg>
                                          </a>
                                          <br>
                                          <div class="banner__bideo--play">
                                                <a class="banner__bideo--play__icon glightbox"
                                                      href="https://vimeo.com/115041822" data-gallery="video">
                                                      <svg id="play" xmlns="http://www.w3.org/2000/svg" width="40.302"
                                                            height="40.302" viewBox="0 0 46.302 46.302">
                                                            <g id="Group_193" data-name="Group 193"
                                                                  transform="translate(0 0)">
                                                                  <path id="Path_116" data-name="Path 116"
                                                                        d="M39.521,6.781a23.151,23.151,0,0,0-32.74,32.74,23.151,23.151,0,0,0,32.74-32.74ZM23.151,44.457A21.306,21.306,0,1,1,44.457,23.151,21.33,21.33,0,0,1,23.151,44.457Z"
                                                                        fill="currentColor" />
                                                                  <g id="Group_188" data-name="Group 188"
                                                                        transform="translate(15.588 11.19)">
                                                                        <g id="Group_187" data-name="Group 187">
                                                                              <path id="Path_117" data-name="Path 117"
                                                                                    d="M190.3,133.213l-13.256-8.964a3,3,0,0,0-4.674,2.482v17.929a2.994,2.994,0,0,0,4.674,2.481l13.256-8.964a3,3,0,0,0,0-4.963Zm-1.033,3.435-13.256,8.964a1.151,1.151,0,0,1-1.8-.953V126.73a1.134,1.134,0,0,1,.611-1.017,1.134,1.134,0,0,1,1.185.063l13.256,8.964a1.151,1.151,0,0,1,0,1.907Z"
                                                                                    transform="translate(-172.366 -123.734)"
                                                                                    fill="currentColor" />
                                                                        </g>
                                                                  </g>
                                                                  <g id="Group_190" data-name="Group 190"
                                                                        transform="translate(28.593 5.401)">
                                                                        <g id="Group_189" data-name="Group 189">
                                                                              <path id="Path_118" data-name="Path 118"
                                                                                    d="M328.31,70.492a18.965,18.965,0,0,0-10.886-10.708.922.922,0,1,0-.653,1.725,17.117,17.117,0,0,1,9.825,9.664.922.922,0,1,0,1.714-.682Z"
                                                                                    transform="translate(-316.174 -59.724)"
                                                                                    fill="currentColor" />
                                                                        </g>
                                                                  </g>
                                                                  <g id="Group_192" data-name="Group 192"
                                                                        transform="translate(22.228 4.243)">
                                                                        <g id="Group_191" data-name="Group 191">
                                                                              <path id="Path_119" data-name="Path 119"
                                                                                    d="M249.922,47.187a19.08,19.08,0,0,0-3.2-.27.922.922,0,0,0,0,1.845,17.245,17.245,0,0,1,2.889.243.922.922,0,1,0,.31-1.818Z"
                                                                                    transform="translate(-245.801 -46.917)"
                                                                                    fill="currentColor" />
                                                                        </g>
                                                                  </g>
                                                            </g>
                                                      </svg>
                                                      <span class="visually-hidden">Video Play</span>
                                                </a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- End deals banner section -->

      <!-- Start product section -->
      <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                  <div class="section__heading text-center mb-50">
                        <h2 class="section__heading--maintitle">MẶT HÀNG TỐT NHẤT</h2>
                  </div>
                  <div class="product__section--inner product__swiper--activation swiper">
                        <div class="swiper-wrapper">
                              @foreach($category[4]->products as $product)
                              @if($product->status != 0)
                              <div class="swiper-slide">
                                    <div class="product__items ">
                                          <div class="product__items--thumbnail">
                                                <a class="product__items--link"
                                                      href="{{ route('product',['slug'=>$product->slug]) }}">
                                                      <img class="product__items--img product__primary--img"
                                                            src="{{asset('storage/' .$product->image)}}"
                                                            alt="product-img">
                                                      <img class="product__items--img product__secondary--img"
                                                            src="{{asset('storage/' .(!empty($product->images[0]->image_path) ? $product->images[0]->image_path: ''))}}"
                                                            alt="product-img">
                                                </a>
                                                <div class="product__badge">
                                                      <span class="product__badge--items sale">Sale</span>
                                                </div>
                                          </div>

                                          <div class="product__items--content">
                                                <span class="product__items--content__subtitle">
                                                      {{$category[4]->nameCate ?? ''}}</span>
                                                <h4 class="product__items--content__title"><a
                                                            href="{{ route('product',['slug'=>$product->slug]) }}">{{ \Illuminate\Support\Str::limit($product->namePro, 30, '...') }}</a>
                                                </h4>
                                                <div class="product__items--price">
                                                      @if($product->discounts > 0)
                                                      <span
                                                            class="current__price">{{ number_format(($product->price-(($product->price * $product->discounts )/100)), 0, ',', '.') . " VNĐ"   }}</span>
                                                      <span class="price__divided"></span>
                                                      <span
                                                            class="old__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }}</span>
                                                      @else
                                                      <span class="current__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }}
                                                      </span>
                                                      @endif
                                                </div>
                                                <ul class="rating product__rating d-flex">
                                                      <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                  <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105" height="14.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                              d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                              transform="translate(0 -0.018)"
                                                                              fill="currentColor"></path>
                                                                  </svg>
                                                            </span>
                                                      </li>
                                                      <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                  <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105" height="14.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                              d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                              transform="translate(0 -0.018)"
                                                                              fill="currentColor"></path>
                                                                  </svg>
                                                            </span>
                                                      </li>
                                                      <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                  <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105" height="14.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                              d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                              transform="translate(0 -0.018)"
                                                                              fill="currentColor"></path>
                                                                  </svg>
                                                            </span>
                                                      </li>
                                                      <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                  <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105" height="14.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                              d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                              transform="translate(0 -0.018)"
                                                                              fill="currentColor"></path>
                                                                  </svg>
                                                            </span>
                                                      </li>
                                                      <li class="rating__list">
                                                            <span class="rating__list--icon">
                                                                  <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105" height="14.732"
                                                                        viewBox="0 0 10.105 9.732">
                                                                        <path data-name="star - Copy"
                                                                              d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                              transform="translate(0 -0.018)"
                                                                              fill="currentColor"></path>
                                                                  </svg>
                                                            </span>
                                                      </li>

                                                </ul>
                                                <ul class="product__items--action d-flex">
                                                      <li class="product__items--action__list w-100 text-center"
                                                            style="">
                                                            <div class="product__items--action__btn add__to--cart"
                                                                  onclick="addCart({{$product->id}})">
                                                                  <svg class="product__items--action__btn--svg"
                                                                        xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                                        height="20.443" viewBox="0 0 14.706 13.534">
                                                                        <g transform="translate(0 0)">
                                                                              <g>
                                                                                    <path data-name="Path 16787"
                                                                                          d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                                          transform="translate(0 -463.248)"
                                                                                          fill="currentColor"></path>
                                                                                    <path data-name="Path 16788"
                                                                                          d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                                          transform="translate(-1.191 -466.622)"
                                                                                          fill="currentColor"></path>
                                                                                    <path data-name="Path 16789"
                                                                                          d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                                          transform="translate(-2.875 -466.622)"
                                                                                          fill="currentColor"></path>
                                                                              </g>
                                                                        </g>
                                                                  </svg>
                                                                  <span class="add__to--cart__text"> + Thêm giỏ
                                                                        hàng</span>
                                                            </div>
                                                      </li>
                                                </ul>
                                          </div>
                                    </div>
                              </div>
                              @endif
                              @endforeach
                        </div>
                        <div class="swiper__nav--btn swiper-button-next"></div>
                        <div class="swiper__nav--btn swiper-button-prev"></div>
                  </div>
            </div>
      </section>
      <!-- End product section -->

      <!-- Start banner section -->
      <section class="banner__section section--padding pt-0">
            <div class="container-fluid">
                  <div class="row row-cols-md-2 row-cols-1 mb--n28">
                        <div class="col mb-28">
                              <div class="banner__items position__relative">
                                    <a class="banner__items--thumbnail " href=""><img
                                                class="banner__items--thumbnail__img banner__img--max__height"
                                                src="assets/img/banner/banner5.png" alt="banner-img">
                                          <div class="banner__items--content">
                                                <span class="banner__items--content__subtitle d-none d-lg-block">Chọn
                                                      các mặt hàng của bạn</span>
                                                <h2 class="banner__items--content__title h3">Đặt hàng lên đến 25% ngay
                                                      bây giờ
                                                </h2>
                                                <span class="banner__items--content__link"><u>Mua sắm ngay bây
                                                            giờ</u></span>
                                          </div>
                                    </a>
                              </div>
                        </div>
                        <div class="col mb-28">
                              <div class="banner__items position__relative">
                                    <a class="banner__items--thumbnail " href=""><img
                                                class="banner__items--thumbnail__img banner__img--max__height"
                                                src="assets/img/banner/banner6.png" alt="banner-img">
                                          <div class="banner__items--content">
                                                <span class="banner__items--content__subtitle d-none d-lg-block">Ưu đãi
                                                      đặc biệt</span>
                                                <h2 class="banner__items--content__title h3">Đặt hàng lên đến 35% ngay
                                                      bây giờ
                                                </h2>
                                                <span class="banner__items--content__link"><u>Khám phá ngay bây giờ</u>
                                                </span>
                                          </div>
                                    </a>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- End banner section -->

      <!-- Start banner section -->
      <section class="banner__section section--padding pt-0">
            <div class="container-fluid">
                  <div class="row row-cols-1">
                        <div class="col">
                              <div class="banner__section--inner position__relative">
                                    <a class="banner__items--thumbnail display-block" href=""><img
                                                class="banner__items--thumbnail__img banner__img--height__md display-block"
                                                src="assets/img/banner/banner-bg2.png" alt="banner-img">
                                          <div class="banner__content--style2">
                                                <h2 class="banner__content--style2__title text-white">Cần giày mùa đông?
                                                </h2>
                                                <p class="banner__content--style2__desc">Mẫu mã mới về giầy mùa đông</p>
                                                <span class="primary__btn">Mau sắm ngay
                                                      <svg class="primary__btn--arrow__icon"
                                                            xmlns="http://www.w3.org/2000/svg" width="20.2"
                                                            height="12.2" viewBox="0 0 6.2 6.2">
                                                            <path d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                                                  transform="translate(-4 -4)" fill="currentColor">
                                                            </path>
                                                      </svg>
                                                </span>
                                          </div>
                                    </a>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
      <!-- End banner section -->

      <!-- Start blog section -->
      <section class="blog__section section--padding pt-0">
            <div class="container-fluid">
                  <div class="section__heading text-center mb-40">
                        <h2 class="section__heading--maintitle">Bài viết</h2>
                  </div>
                  <div class="blog__section--inner blog__swiper--activation swiper">
                        <div class="swiper-wrapper">
                              @foreach($blogs as $blog)
                              <div class="swiper-slide">
                                    <div class="blog__items">
                                          <div class="blog__thumbnail">
                                                <a class="blog__thumbnail--link" href=""><img
                                                            class="blog__thumbnail--img"
                                                            src="{{asset('storage/' .$blog->image)}}"
                                                            alt="{{ $blog->name_blog }}"></a>
                                          </div>
                                          <div class="blog__content">
                                                <span
                                                      class="blog__content--meta">{{ date_format($blog->updated_at,"Y/m/d") }}</span>
                                                <h3 class="blog__content--title"><a
                                                            href="{{ route('blog',['slug' => $blog->slug_blog ]) }}">{{ $blog->name_blog }}</a>
                                                </h3>
                                                <a class="blog__content--btn primary__btn"
                                                      href="{{ route('blog',['slug' => $blog->slug_blog ]) }}">Read more
                                                </a>
                                          </div>
                                    </div>
                              </div>
                              @endforeach
                        </div>
                        <div class="swiper__nav--btn swiper-button-next"></div>
                        <div class="swiper__nav--btn swiper-button-prev"></div>
                  </div>
            </div>
      </section>
      <!-- End blog section -->

</main>

@endsection

@section('javascript')

@endsection
