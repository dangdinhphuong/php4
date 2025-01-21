@extends('client2.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Blog Grid</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Blog Grid</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start blog section -->
        <section class="blog__section section--padding">
            <div class="container">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">From The Blog</h2>
                </div>
                <div class="blog__section--inner">
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-sm-u-2 row-cols-1 mb--n30">
                        @foreach($blogs as $blog)
                        <div class="col mb-30">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="{{ route('blog',['slug' => $blog->slug_blog ]) }}"><img style="height: 28rem;" class="blog__thumbnail--img" src="{{asset('storage/' .$blog->image)}}" alt="blog-img"></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">{{ $blog->updated_at->format('F d, Y') }}</span>
                                    <h3 class="blog__content--title"><a href="{{ route('blog',['slug' => $blog->slug_blog ]) }}">{{ $blog->name_blog }}</a></h3>
                                    <a class="blog__content--btn primary__btn" href="{{ route('blog',['slug' => $blog->slug_blog ]) }}">Read more </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination__area bg__gray--color">
                        <nav class="pagination justify-content-center">
                            <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                <!-- Previous Page Link -->
                                @if ($blogs->onFirstPage())
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
                                        <a href="{{ $blogs->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}" class="pagination__item--arrow link">
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
                                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                    <li class="pagination__list">
                                        @if ($page == $blogs->currentPage())
                                            <span class="pagination__item pagination__item--current">{{ $page }}</span>
                                        @else
                                            <a href="{{ $url . '&' . http_build_query(request()->except('page')) }}" class="pagination__item link">{{ $page }}</a>
                                        @endif
                                    </li>
                                @endforeach

                            <!-- Next Page Link -->
                                @if ($blogs->hasMorePages())
                                    <li class="pagination__list">
                                        <a href="{{ $blogs->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}" class="pagination__item--arrow link">
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
        </section>
        <!-- End blog section -->

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
<script>
    $(document).ready(function() {
            $(".page-link").on("click", function(e) {
                e.preventDefault();
                var rel = $(this).text();
                var page = parseInt(rel);
                // console.log( $("select[name='category_id']").val());
                $("input[name='page']").val(page);

                $("form[name='fillter_pro']").trigger("submit");
            });
            $("#fillter_pro").on("click", function(e) {
                e.preventDefault();
                $("input[name='page']").val(1);

                $("form[name='fillter_pro']").trigger("submit");
            });
        });
</script>
@endsection
