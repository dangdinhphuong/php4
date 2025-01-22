@extends('client.master')
@section('title', 'Suruchi - Fashion')
@section('content')



    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Suruchi - Fashion</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white"
                                                                                href="{{route('home')}}">Home</a></li>
                                @if($categories_slug != "")

                                    <li class="breadcrumb__content--menu__items"><span
                                            class="text-white">{{ $categories_slug->nameCate }}</span></li>
                                @else
                                    <li class="breadcrumb__content--menu__items"><span class="text-white">All products of the store</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start shop section -->
        <section class="shop__section section--padding">
            <div class="container-fluid">
                <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">

                    <div class="product__view--mode d-flex align-items-center">
                        <div class="product__view--mode__list product__short--by align-items-center d-lg-flex">
                            <div class="select shop__header--select">
                                <select class="product__view--select" onchange="filterSort(this)">
                                    <option selected value="">Sort by price</option>
                                    <option value="ASC" {{ request('sort') == 'ASC' ? 'selected' : '' }}>Price increases
                                        gradually
                                    </option>
                                    <option value="DESC" {{ request('sort') == 'DESC' ? 'selected' : '' }}>Price
                                        decreasing
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="product__view--mode__list">
                            <div class="product__grid--column__buttons d-flex justify-content-center">
                                <button class="product__grid--column__buttons--icons active"
                                        aria-label="product grid button" data-toggle="tab" data-target="#product_grid">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                        <g transform="translate(-1360 -479)">
                                            <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4"
                                                  transform="translate(1360 479)" fill="currentColor"/>
                                            <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4"
                                                  transform="translate(1360 484)" fill="currentColor"/>
                                            <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4"
                                                  transform="translate(1365 479)" fill="currentColor"/>
                                            <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4"
                                                  transform="translate(1365 484)" fill="currentColor"/>
                                        </g>
                                    </svg>
                                </button>
                                <button class="product__grid--column__buttons--icons" aria-label="product list button"
                                        data-toggle="tab" data-target="#product_list">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                        <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                            <g transform="translate(12 -2)">
                                                <g id="Group_1326" data-name="Group 1326">
                                                    <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3"
                                                          height="2" transform="translate(1364 483)"
                                                          fill="currentColor"/>
                                                    <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9"
                                                          height="2" transform="translate(1368 483)"
                                                          fill="currentColor"/>
                                                </g>
                                                <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                    <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3"
                                                          height="2" transform="translate(1364 483)"
                                                          fill="currentColor"/>
                                                    <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9"
                                                          height="2" transform="translate(1368 483)"
                                                          fill="currentColor"/>
                                                </g>
                                                <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                    <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3"
                                                          height="2" transform="translate(1364 487)"
                                                          fill="currentColor"/>
                                                    <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9"
                                                          height="2" transform="translate(1368 487)"
                                                          fill="currentColor"/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                            <div class="single__widget price__filter widget__bg">
                                <h2 class="widget__title h3">Filter By Price</h2>
                                <form class="price__filter--form" id="filter-form" method="get">
                                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">$</span>
                                                <label>
                                                    <input class="price__filter--input__field border-0"
                                                           name="min" type="number" placeholder="10.000"
                                                           value="{{request('min') ? request('min') : 10000 }}"
                                                           min="10000">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="price__divider">
                                            <span>-</span>
                                        </div>
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">$</span>
                                                <label>
                                                    <input class="price__filter--input__field border-0"
                                                           name="max" type="number" min="50000"
                                                           value="{{request('max') ? request('max') : 5000000 }}"
                                                           placeholder="50.000">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="price__filter--btn primary__btn" type="submit">Filter</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop__product--wrapper">
                            <div class="tab_content">
                                <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner product__grid--inner">
                                        <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">
                                            @foreach($products as $product)
                                                <div class="col mb-30">
                                                    <div class="product__items ">
                                                        <div class="product__items--thumbnail">
                                                            <a class="product__items--link"
                                                               href="{{ route('product',['slug'=>$product->slug]) }}">
                                                                <img class="product__items--img product__primary--img"
                                                                     src="{{asset('storage/' .$product->image)}}"
                                                                     alt="product-img">
                                                                <img class="product__items--img product__secondary--img"
                                                                     src="{{asset('assets/img/product/product15.png')}}"
                                                                     alt="product-img">
                                                            </a>
                                                            <div class="product__badge">
                                                                <span class="product__badge--items sale">Sale</span>
                                                            </div>
                                                        </div>
                                                        <div class="product__items--content">
                                                            <span
                                                                class="product__items--content__subtitle"> </span>
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
                                                                    <span
                                                                        class="current__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }} </span>
                                                                @endif
                                                            </div>
                                                            <ul class="rating product__rating d-flex">
                                                                <li class="rating__list">
                                                                <span class="rating__list--icon">
                                                                    <svg class="rating__list--icon__svg"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         width="14.105"
                                                                         height="14.732" viewBox="0 0 10.105 9.732">
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
                                                                         width="14.105"
                                                                         height="14.732" viewBox="0 0 10.105 9.732">
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
                                                                         width="14.105"
                                                                         height="14.732" viewBox="0 0 10.105 9.732">
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
                                                                         width="14.105"
                                                                         height="14.732" viewBox="0 0 10.105 9.732">
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
                                                                         width="14.105"
                                                                         height="14.732" viewBox="0 0 10.105 9.732">
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
                                                                    <div
                                                                        class="product__items--action__btn add__to--cart"
                                                                        onclick="addCart({{$product->id}})">
                                                                        <svg class="product__items--action__btn--svg"
                                                                             xmlns="http://www.w3.org/2000/svg"
                                                                             width="22.51"
                                                                             height="20.443"
                                                                             viewBox="0 0 14.706 13.534">
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
                                                                        <span
                                                                            class="add__to--cart__text"> + Add to cart</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div id="product_list" class="tab_pane">
                                    <div class="product__section--inner">
                                        <div class="row row-cols-1 mb--n30">
                                            @foreach($products as $product)
                                                <div class="col mb-30">
                                                    <div class="product__items product__list--items d-flex">
                                                        <div
                                                            class="product__items--thumbnail product__list--items__thumbnail">
                                                            <a class="product__items--link"
                                                               href="{{ route('product',['slug'=>$product->slug]) }}">
                                                                <img class="product__items--img product__primary--img"
                                                                     src="{{asset('storage/' .$product->image)}}"
                                                                     alt="product-img">
                                                                <img class="product__items--img product__secondary--img"
                                                                     src="{{asset('assets/img/product/product10.png')}}"
                                                                     alt="product-img">
                                                            </a>
                                                            <div class="product__badge">
                                                                <span class="product__badge--items sale">Sale</span>
                                                            </div>
                                                        </div>
                                                        <div class="product__list--items__content">
                                                            <span
                                                                class="product__items--content__subtitle mb-5"></span>
                                                            <h3 class="product__list--items__content--title h4 mb-10"><a
                                                                    href="{{ route('product',['slug'=>$product->slug]) }}">{{$product->namePro}}</a>
                                                            </h3>
                                                            <div class="product__list--items__price mb-10">
                                                                @if($product->discounts > 0)
                                                                    <span
                                                                        class="current__price">{{ number_format(($product->price-(($product->price * $product->discounts )/100)), 0, ',', '.') . " VNĐ"   }}</span>
                                                                    <span class="price__divided"></span>
                                                                    <span
                                                                        class="old__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }}</span>
                                                                @else
                                                                    <span
                                                                        class="current__price">{{ number_format($product->price, 0, ',', '.') . " VNĐ" }} </span>
                                                                @endif

                                                            </div>
                                                            <ul class="product__items--action d-flex">
                                                                <li class="product__items--action__list">
                                                                    <div
                                                                        class="product__items--action__btn add__to--cart"
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
                                                                        <span
                                                                            class="add__to--cart__text"> + Add to cart</span>
                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination__area bg__gray--color">
                                <nav class="pagination justify-content-center">
                                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                        <!-- Previous Page Link -->
                                        @if ($products->onFirstPage())
                                            <li class="pagination__list disabled">
                                                <span class="pagination__item--arrow link">
                                                    <!-- Left Arrow SVG -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                                                              d="M244 400L100 256l144-144M120 256h292"/>
                                                    </svg>
                                                    <span class="visually-hidden">pagination arrow</span>
                                                </span>
                                            </li>
                                        @else
                                            <li class="pagination__list">
                                                <a href="{{ $products->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}" class="pagination__item--arrow link">
                                                    <!-- Left Arrow SVG -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                                                              d="M244 400L100 256l144-144M120 256h292"/>
                                                    </svg>
                                                    <span class="visually-hidden">pagination arrow</span>
                                                </a>
                                            </li>
                                        @endif

                                    <!-- Pagination Numbers -->
                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                            <li class="pagination__list">
                                                @if ($page == $products->currentPage())
                                                    <span class="pagination__item pagination__item--current">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url . '&' . http_build_query(request()->except('page')) }}" class="pagination__item link">{{ $page }}</a>
                                                @endif
                                            </li>
                                        @endforeach

                                    <!-- Next Page Link -->
                                        @if ($products->hasMorePages())
                                            <li class="pagination__list">
                                                <a href="{{ $products->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}" class="pagination__item--arrow link">
                                                    <!-- Right Arrow SVG -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                                                              d="M268 112l144 144-144 144M392 256H100"/>
                                                    </svg>
                                                    <span class="visually-hidden">pagination arrow</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="pagination__list disabled">
                                                <span class="pagination__item--arrow link">
                                                    <!-- Right Arrow SVG -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
                                                              d="M268 112l144 144-144 144M392 256H100"/>
                                                    </svg>
                                                    <span class="visually-hidden">pagination arrow</span>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        $(document).ready(function () {
            $(".page-link").on("click", function (e) {
                e.preventDefault();
                var rel = $(this).text();
                var page = parseInt(rel);
                // console.log( $("select[name='category_id']").val());
                $("input[name='page']").val(page);

                $("form[name='fillter_pro']").trigger("submit");
            });
            $("#fillter_pro").on("click", function (e) {
                e.preventDefault();
                $("input[name='page']").val(1);

                $("form[name='fillter_pro']").trigger("submit");
            });
        });
    </script>

    <script>
        // Lấy các tham số hiện tại từ URL
        const urlParams = new URLSearchParams(window.location.search);

        // Lặp qua tất cả các tham số trong URL và thêm chúng vào form
        const form = document.getElementById('filter-form');
        urlParams.forEach((value, key) => {
            // Tránh việc thêm lại các tham số đã có trong form (min, max)
            if (key !== 'min' && key !== 'max') {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = key;
                hiddenInput.value = value;
                form.appendChild(hiddenInput);
            }
        });
    </script>

    <script>
        function filterSort(selectElement) {
            const sortValue = selectElement.value; // Lấy giá trị được chọn
            const currentUrl = new URL(window.location.href); // Lấy URL hiện tại
            if (sortValue) {
                currentUrl.searchParams.set('sort', sortValue); // Thêm hoặc cập nhật tham số sort
            } else {
                currentUrl.searchParams.delete('sort'); // Nếu giá trị rỗng, xóa tham số sort
            }
            window.location.href = currentUrl.toString(); // Điều hướng tới URL mới
        }
    </script>

@endsection
