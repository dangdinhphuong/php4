@extends('client.pages.settings.master')
@section('title', 'Siêu thị thực phẩm')
@section('child-content')
    <!-- Start checkout page area -->
    <div class="checkout__page--area">
        <div class="container">
            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">
                    <header class="main__header checkout__mian--header mb-30">
                        <details class="order__summary--mobile__version">
                            <summary class="order__summary--toggle border-radius-5">
                                <span class="order__summary--toggle__inner">
                                    <span class="order__summary--toggle__icon">
                                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="order__summary--toggle__text show">
                                        <span>Order</span>
                                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                    </span>
                                    <span class="order__summary--final__price">{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</span>
                                </span>
                            </summary>
                            <div class="order__summary--section">
                                <div class="cart__table checkout__product--table">
                                    <table class="summary__table">
                                        <tbody class="summary__table--body">
                                        @foreach($Orders->order_detail as $Order)
                                        <tr class=" summary__table--items">
                                            <td class=" summary__table--list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a href="product-details.html"><img class="border-radius-5" src="assets/img/product/small-product7.png" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">{{$Order->quantity}}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h3 class="product__description--name h4"><a href="product-details.html">F{{$Order->name}}</a></h3>
                                                        <span class="cart__price">{{ number_format($Order->price * $Order->quantity, 0, ',', '.') . " VNĐ"   }}</span>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="checkout__total">
                                    <table class="checkout__total--table">
                                        <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Subtotal </td>
                                            <td class="checkout__total--amount text-right">{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Shipping</td>
                                            <td class="checkout__total--calculated__text text-right">{{ number_format(0, 0, ',', '.') . " VNĐ"   }}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </details>
                    </header>
                    <main class="main__content_wrapper">
                        <form action="#">
                            <div class="checkout__content--step section__shipping--address pt-0">
                                <div class="section__header checkout__header--style3 position__relative mb-25">
                                    <span class="checkout__order--number">Order #0{{$Orders->id}}</span>
                                    <h2 class="section__header--title h3">Thanks for ordering!</h2>
                                    <div class="checkout__submission--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25.995" height="25.979" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M416 128L192 384l-96-96"/></svg>
                                    </div>
                                </div>
                                <div class="order__confirmed--area border-radius-5 mb-15">
                                    <h3 class="order__confirmed--title h4">Note</h3>
                                    <p class="order__confirmed--desc">{{$Orders->note}}</p>
                                </div>
                                <div class="customer__information--area border-radius-5">
                                    <h3 class="customer__information--title h4">Customer Information</h3>
                                    <div class="customer__information--inner ">
                                        <div class="customer__information--list">
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Contact information</h4>
                                                <ul>
                                                    <li><a class="customer__information--text__link" href="#">{{ \Illuminate\Support\Facades\Auth::user()->email }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Payment method</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">Cod</span></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Shipping address</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">Name: {{$Orders->fullname}}</span></li>
                                                    <li><span class="customer__information--text">Phone:{{$Orders->phone}}</span></li>
                                                    <li><span class="customer__information--text">Address: {{$Orders->address}}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="previous__link--content" href="{{ route('order') }}">Return to shipping</a>
                            </div>
                        </form>
                    </main>
                </div>
                <aside class="checkout__sidebar sidebar">
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                            @foreach($Orders->order_detail as $Order)
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="product__image two  d-flex align-items-center">
                                        <div class="product__thumbnail border-radius-5">
                                            <a href="product-details.html"><img class="border-radius-5" src="assets/img/product/small-product7.png" alt="cart-product"></a>
                                            <span class="product__thumbnail--quantity">{{$Order->quantity}}</span>
                                        </div>
                                        <div class="product__description">
                                            <h3 class="product__description--name h4"><a href="product-details.html">{{$Order->name}}</a></h3>
                                            <span class="cart__price">{{ number_format($Order->price * $Order->quantity, 0, ',', '.') . " VNĐ"   }}</span>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="checkout__total">
                        <table class="checkout__total--table">
                            <tbody class="checkout__total--body">
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Subtotal </td>
                                <td class="checkout__total--amount text-right">{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</td>
                            </tr>
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Shipping</td>
                                <td class="checkout__total--calculated__text text-right">{{ number_format(0, 0, ',', '.') . " VNĐ"   }}</td>
                            </tr>
                            </tbody>
                            <tfoot class="checkout__total--footer">
                            <tr class="checkout__total--footer__items">
                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- End checkout page area -->
@endsection

@section('javascript')
<script>
    $("#submit-updateCarts").on("click", function(e) {
        $("form[name='updateCarts']").trigger("submit");
    });
    $("#checkout").on("click", function(e) {
        $("form[name='checkout']").trigger("submit");
    });
</script>
@endsection
