@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')
<main class="main__content_wrapper" style="background: rgb(245 245 245);">
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white"
                                    href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span
                                    class="text-white">{{$Product->category->nameCate}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start product details section -->
    <section class="product__details--section section--padding">
        <div class="container p-2" style="background-color: #fff;">
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="product__details--media">
                        <div class="product__media--preview  swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="{{asset('storage/' .$Product->image)}}"><img
                                                class="product__media--preview__items--img"
                                                src="{{asset('storage/' .$Product->image)}}"
                                                alt="product-media-img"></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="{{asset('storage/' .$Product->image)}}"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-miterlimit="10"
                                                        stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @foreach($Product->images as $image)
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="{{ asset('storage/' . ($image->image_path ?? '')) }}"><img
                                                class="product__media--preview__items--img"
                                                src="{{ asset('storage/' . ($image->image_path ?? '')) }}"
                                                alt="product-media-img"></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="{{ asset('storage/' . ($image->image_path ?? '')) }}"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-miterlimit="10"
                                                        stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product__media--nav swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('storage/' .$Product->image)}}"
                                            alt="product-nav-img">
                                    </div>
                                </div>
                                @foreach($Product->images as $image)
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{ asset('storage/' . ($image->image_path ?? '')) }}"
                                            alt="product-nav-img">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper__nav--btn swiper-button-next"></div>
                            <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="product__details--info">
                        <form action="#">
                            <h2 class="product__details--info__title mb-15">{{$Product->namePro}}</h2>
                            <div class="product__details--info__price mb-10 p-2"
                                style="background-color: var(--secondary-color);     border-radius: 5px;">

                                @if($Product->discounts > 0)
                                <span class="current__price"
                                    style="color: var(--white-color);">{{ number_format(($Product->price-(($Product->price * $Product->discounts )/100)), 0, ',', '.') . " VNĐ"   }}</span>
                                <span class="price__divided"
                                    style="background: var(--white-color);"></span>
                                <span class="old__price"
                                    style="color: var(--white-color);">{{ number_format($Product->price, 0, ',', '.') . " VNĐ" }}</span>
                                @else
                                <span class="current__price"
                                    style="color: var(--white-color);">{{ number_format($Product->price, 0, ',', '.') . " VNĐ" }}
                                </span>
                                @endif
                            </div>
                            <div class="product__details--info__rating d-flex align-items-center mb-15">
                                <ul class="rating d-flex justify-content-center">
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
                                <span class="product__items--rating__count--number">(24)</span>
                            </div>

                            <div class="product__variant">
                                <div class="product__details--info__meta">
                                    <p class="product__details--info__meta--list"><strong>Shock Deal
                                            :</strong> <span>Buy to receive gifts</span> </p>
                                    <p class="product__details--info__meta--list"><strong>Shop with
                                            confidence :</strong> <span>Order Processing by Famous
                                            Brands · 15-Day Free Returns ·</span> </p>

                                </div>
                                <div
                                    class="product__variant--list quantity d-flex align-items-center mb-20">
                                    @csrf
                                    <div class="quantity__box">
                                        <button type="button" onclick="updateQuantity(-1)"
                                            class="quantity__value quickview__value--quantity decrease"
                                            aria-label="quantity value"
                                            value="Decrease Value">-</button>
                                        <label>
                                            <input type="number"
                                                class="quantity__number quickview__value--number"
                                                id="quantity" value="1" />
                                        </label>
                                        <button type="button" onclick="updateQuantity(1)"
                                            class="quantity__value quickview__value--quantity increase"
                                            aria-label="quantity value"
                                            value="Increase Value">+</button>
                                    </div>
                                    <button class="quickview__cart--btn primary__btn"
                                        onclick="addToCart({{$Product->id}})"
                                        {{$Product->quantity <= 0 ? "disabled" : "" }}>{{$Product->quantity <= 0 ? "Product is out of stock" : "Thêm giỏ hàng" }}</button>
                                </div>
                            </div>
                            <div class="quickview__social d-flex align-items-center mb-15">
                                <label class="quickview__social--title">Social Share:</label>
                                <ul class="quickview__social--wrapper mt-0 d-flex">
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
                                            href="https://www.facebook.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.667"
                                                height="16.524" viewBox="0 0 7.667 16.524">
                                                <path data-name="Path 237"
                                                    d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                    transform="translate(-960.13 -345.407)"
                                                    fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
                                            href="https://twitter.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.489"
                                                height="13.384" viewBox="0 0 16.489 13.384">
                                                <path data-name="Path 303"
                                                    d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                    transform="translate(-951.23 -1140.849)"
                                                    fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
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
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
                                            href="https://www.youtube.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.49"
                                                height="11.582" viewBox="0 0 16.49 11.582">
                                                <path data-name="Path 321"
                                                    d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                    transform="translate(-951.269 -1359.8)"
                                                    fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Youtube</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="guarantee__safe--checkout">
                                <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout
                                </h5>
                                <img class="guarantee__safe--checkout__img"
                                    src="{{asset('assets/img/other/safe-checkout.png')}}"
                                    alt="Payment Image">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product details section -->

    <!-- Start product details tab section -->
    <section class="product__details--tab__section section--padding">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <ul class="product__details--tab d-flex mb-30">
                        <li class="product__details--tab__list active" data-toggle="tab"
                            data-target="#description">Description</li>
                        {{-- <li class="product__details--tab__list" data-toggle="tab" data-target="#reviews">Product Reviews</li>--}}

                    </ul>
                    <div class="product__details--tab__inner border-radius-10">
                        <div class="tab_content">
                            <div id="description" class="tab_pane active show">
                                <div class="product__tab--content">
                                    {!! $Product->Description !!}
                                </div>
                            </div>
                            <div id="reviews" class="tab_pane">
                                <div class="product__reviews">
                                    <div class="product__reviews--header">
                                        <h2 class="product__reviews--header__title h3 mb-20">
                                            Customer Reviews</h2>
                                        <div class="reviews__ratting d-flex align-items-center">
                                            <ul class="rating d-flex">
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
                                            <span class="reviews__summary--caption">Based on 2
                                                reviews</span>
                                        </div>
                                        <a class="actions__newreviews--btn primary__btn"
                                            href="#writereview">Write A Review</a>
                                    </div>
                                    <div class="reviews__comment--area">
                                        <div class="reviews__comment--list d-flex">
                                            <div class="reviews__comment--thumb">
                                                <img src="{{asset('assets/img/other/comment-thumb1.png')}}"
                                                    alt="comment-thumb">
                                            </div>
                                            <div class="reviews__comment--content">
                                                <div
                                                    class="reviews__comment--top d-flex justify-content-between">
                                                    <div class="reviews__comment--top__left">
                                                        <h3
                                                            class="reviews__comment--content__title h4">
                                                            Richard Smith</h3>
                                                        <ul
                                                            class="rating reviews__comment--rating d-flex">
                                                            <li class="rating__list">
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                    </div>
                                                    <span
                                                        class="reviews__comment--content__date">February
                                                        18, 2022</span>
                                                </div>
                                                <p class="reviews__comment--content__desc">Lorem
                                                    ipsum, dolor sit amet consectetur
                                                    adipisicing elit. Eos ex repellat officiis
                                                    neque. Veniam, rem nesciunt. Assumenda
                                                    distinctio, autem error repellat eveniet
                                                    ratione dolor facilis accusantium amet
                                                    pariatur, non eius!</p>
                                            </div>
                                        </div>
                                        <div class="reviews__comment--list margin__left d-flex">
                                            <div class="reviews__comment--thumb">
                                                <img src="{{asset('assets/img/other/comment-thumb2.png')}}"
                                                    alt="comment-thumb">
                                            </div>
                                            <div class="reviews__comment--content">
                                                <div
                                                    class="reviews__comment--top d-flex justify-content-between">
                                                    <div class="reviews__comment--top__left">
                                                        <h3
                                                            class="reviews__comment--content__title h4">
                                                            Laura Johnson</h3>
                                                        <ul
                                                            class="rating reviews__comment--rating d-flex">
                                                            <li class="rating__list">
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                    </div>
                                                    <span
                                                        class="reviews__comment--content__date">February
                                                        18, 2022</span>
                                                </div>
                                                <p class="reviews__comment--content__desc">Lorem
                                                    ipsum, dolor sit amet consectetur
                                                    adipisicing elit. Eos ex repellat officiis
                                                    neque. Veniam, rem nesciunt. Assumenda
                                                    distinctio, autem error repellat eveniet
                                                    ratione dolor facilis accusantium amet
                                                    pariatur, non eius!</p>
                                            </div>
                                        </div>
                                        <div class="reviews__comment--list d-flex">
                                            <div class="reviews__comment--thumb">
                                                <img src="{{asset('assets/img/other/comment-thumb3.png')}}"
                                                    alt="comment-thumb">
                                            </div>
                                            <div class="reviews__comment--content">
                                                <div
                                                    class="reviews__comment--top d-flex justify-content-between">
                                                    <div class="reviews__comment--top__left">
                                                        <h3
                                                            class="reviews__comment--content__title h4">
                                                            John Deo</h3>
                                                        <ul
                                                            class="rating reviews__comment--rating d-flex">
                                                            <li class="rating__list">
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                                <span
                                                                    class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="14.105"
                                                                        height="14.732"
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
                                                    </div>
                                                    <span
                                                        class="reviews__comment--content__date">February
                                                        18, 2022</span>
                                                </div>
                                                <p class="reviews__comment--content__desc">Lorem
                                                    ipsum, dolor sit amet consectetur
                                                    adipisicing elit. Eos ex repellat officiis
                                                    neque. Veniam, rem nesciunt. Assumenda
                                                    distinctio, autem error repellat eveniet
                                                    ratione dolor facilis accusantium amet
                                                    pariatur, non eius!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="writereview" class="reviews__comment--reply__area">
                                        <form action="#">
                                            <h3 class="reviews__comment--reply__title mb-15">Add a
                                                review </h3>
                                            <div
                                                class="reviews__ratting d-flex align-items-center mb-20">
                                                <ul class="rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                width="14.105"
                                                                height="14.732"
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
                                                                width="14.105"
                                                                height="14.732"
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
                                                                width="14.105"
                                                                height="14.732"
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
                                                                width="14.105"
                                                                height="14.732"
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
                                                                width="14.105"
                                                                height="14.732"
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
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mb-10">
                                                    <textarea
                                                        class="reviews__comment--reply__textarea"
                                                        placeholder="Your Comments...."></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mb-15">
                                                    <label>
                                                        <input class="reviews__comment--reply__input"
                                                            placeholder="Your Name...."
                                                            type="text">
                                                    </label>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mb-15">
                                                    <label>
                                                        <input class="reviews__comment--reply__input"
                                                            placeholder="Your Email...."
                                                            type="email">
                                                    </label>
                                                </div>
                                            </div>
                                            <button
                                                class="reviews__comment--btn text-white primary__btn"
                                                data-hover="Submit"
                                                type="submit">SUBMIT</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product details tab section -->

    <!-- Start product section -->
    <section class="product__section product__section--style3 section--padding">
        <div class="container product3__section--container pt-2" style="background-color: #fff; ">
            <div class="section__heading text-center mb-50">
                <h2 class="section__heading--maintitle">You may also like</h2>
            </div>
            <div class="product__section--inner product__swiper--column4__activation swiper">
                <div class="swiper-wrapper">
                    @foreach($RelatedProducts as $product)
                    <div class="swiper-slide">
                        <div class="product__items ">
                            <div class="product__items--thumbnail">
                                <a class="product__items--link"
                                    href="{{ route('product',['slug'=>$product->slug]) }}">
                                    <img class="product__items--img product__primary--img"
                                        src="{{asset('storage/' .$product->image)}}"
                                        alt="product-img">
                                    <img class="product__items--img product__secondary--img"
                                        src="{{asset('storage/' .(!empty($product->images[0]) ? $product->images[0]->image_path: ''))}}"
                                        alt="product-img">
                                </a>
                                <div class="product__badge">
                                    <span class="product__badge--items sale">Sale</span>
                                </div>
                            </div>
                            <div class="product__items--content">
                                <span class="product__items--content__subtitle">
                                    {{$category->nameCate ?? ''}}</span>
                                <h4 class="product__items--content__title"><a
                                        href="{{ route('product',['slug'=>$product->slug]) }}">{{$product->namePro}}</a>
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
                    @endforeach
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- End product section -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding pt-0">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{asset('assets/img/other/shipping1.png')}}" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{asset('assets/img/other/shipping2.png')}}" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{asset('assets/img/other/shipping3.png')}}" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="{{asset('assets/img/other/shipping4.png')}}" alt="">
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
<script>
    function updateQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value) || 1;

        // Tăng/giảm giá trị
        currentValue += change;

        // Đảm bảo giá trị không nhỏ hơn 1
        if (currentValue < 1) {
            currentValue = 1;
        }

        quantityInput.value = currentValue;
    }
</script>
@endsection