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
                            <h1 class="breadcrumb__content--title text-white mb-25">Shopping Cart</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb__content--menu__items"><span
                                        class="text-white">Shopping Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container-fluid">
                <div class="cart__section--inner">

                    <h2 class="cart__title mb-40">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <form name="updateCarts" action="{{route('updateCarts')}}" method="post">
                                    @csrf
                                    <table class="cart__table--inner">
                                        <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Product</th>
                                            <th class="cart__table--header__list">Price</th>
                                            <th class="cart__table--header__list">Quantity</th>
                                            <th class="cart__table--header__list">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody class="cart__table--body">
                                        @foreach($carts as $cart)
                                            <input type="hidden" name="id[]" value="{{$cart->id}}">
                                            <tr class="cart__table--body__items" id="pro{{$cart->product_id }}">
                                                <td class="cart__table--body__list">
                                                    <div class="cart__product d-flex align-items-center">
                                                        <button class="cart__remove--btn"
                                                                onclick="removeCart({{$cart->product_id }})"
                                                                aria-label="search button" type="button">
                                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 24 24" width="16px" height="16px">
                                                                <path
                                                                    d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/>
                                                            </svg>
                                                        </button>
                                                        <div class="cart__thumbnail">
                                                            <a href="product-details.html">
                                                                <img class="border-radius-5"
                                                                     src="{{asset('storage/' .$cart->products->image)}}"
                                                                     alt="cart-product"></a>
                                                        </div>
                                                        <div class="cart__content">
                                                            <h4 class="cart__content--title"><a
                                                                    href="product-details.html">{{$cart->products->namePro}}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span
                                                        class="cart__price unit-price"
                                                        data-price="{{ ceil($cart->products->price-(($cart->products->price * $cart->products->discounts)/100)) }}">
                                                        {{ number_format(ceil($cart->products->price-(($cart->products->price * $cart->products->discounts)/100)), 0, ',', '.') . " VNĐ" }}
                                                    </span>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <div class="quantity__box">
                                                        <button type="button"
                                                                class="quantity__value decrease"
                                                                aria-label="quantity value">-
                                                        </button>
                                                        <label>
                                                            <input type="number"
                                                                   class="quantity__number"
                                                                   name="quantity[]"
                                                                   value="{{(int)$cart->quantity}}"
                                                                   min="1"/>
                                                        </label>
                                                        <button type="button"
                                                                class="quantity__value increase"
                                                                aria-label="quantity value">+
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price total-price">
                                                        {{ number_format(ceil($cart->products->price-(($cart->products->price * $cart->products->discounts)/100)) * (int)$cart->quantity, 0, ',', '.') . " VNĐ" }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </form>
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="{{ route('home') }}">Continue shopping</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                <form action="{{route('checkout')}}" method="post" name="checkout">
                                    @csrf
                                    <div class="cart__note mb-20">
                                        <h3 class="cart__note--title">Recipient name</h3>
                                        <input class="coupon__code--field__input border-radius-5"
                                               placeholder="Full name..." type="text" name="fullname"
                                               value="{{ old('fullname',auth()->user()->fullname ?? null) }}"
                                               style="width: 100%;">
                                        @error('fullname')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="cart__note mb-20">
                                        <h3 class="cart__note--title">Phone Number</h3>
                                        <input class="coupon__code--field__input border-radius-5" type="text"
                                               name="phone" value="{{ old('phone',auth()->user()->phone ?? null) }}"
                                               placeholder="Recipient phone number" style="width: 100%;">
                                        @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="cart__note mb-20">
                                        <h3 class="cart__note--title">Address</h3>
                                        <input class="coupon__code--field__input border-radius-5" type="text"
                                               name="address"
                                               value="{{ old('address',auth()->user()->address ?? null) }}"
                                               placeholder="Recipient address" style="width: 100%;">
                                        @error('address')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="cart__note mb-20">
                                        <h3 class="cart__note--title">Note</h3>
                                        <p class="cart__note--desc">Add special instructions for your seller...</p>
                                        <textarea class="cart__note--textarea border-radius-5"
                                                  name="note"> {{ old('note') }}</textarea>
                                        @error('note')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="cart__summary--total mb-20">
                                        <table class="cart__summary--total__table">
                                            <tbody>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right subtotal">{{ number_format(ceil($totalMoney), 0, ',', '.') . " VNĐ" }}</td>
                                            </tr>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SHIPPING FEES</td>
                                                <td class="cart__summary--amount text-right shipping-fees">0 VNĐ
                                                </td>
                                            </tr>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                <td class="cart__summary--amount text-right grand-total">{{ number_format(ceil($totalMoney + 0), 0, ',', '.') . " VNĐ" }}</td>
                                            </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="cart__summary--footer">

                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <button class="cart__summary--footer__btn primary__btn cart"
                                                        {{ $carts->count() <=0 ? "disabled" : "" }} id="submit-updateCarts">
                                                    Update Cart
                                                </button>
                                            </li>
                                            <li>
                                                <button class="cart__summary--footer__btn primary__btn checkout"
                                                        {{ $carts->count() <=0 ? "disabled" : "" }} id="{{ $carts->count() <=0 ? 'checkout1' : 'checkout' }}">
                                                    Check Out
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- cart section end -->


        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding">
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
            const shippingFees = 0; // Phí vận chuyển cố định

            // Xử lý sự kiện tăng/giảm số lượng
            $(".quantity__value").on("click", function () {
                let input = $(this).siblings("label").find(".quantity__number");
                let currentValue = parseInt(input.val()) || 1;

                if ($(this).hasClass("increase")) {
                    currentValue += 1;
                } else if ($(this).hasClass("decrease") && currentValue > 1) {
                    currentValue -= 1;
                }

                input.val(currentValue);
                updateTotal($(this).closest("tr"));
                updateSummary();
            });

            // Xử lý nhập trực tiếp vào input
            $(".quantity__number").on("input", function () {
                let value = parseInt($(this).val());
                if (isNaN(value) || value < 1) {
                    $(this).val(1);
                }
                updateTotal($(this).closest("tr"));
                updateSummary();
            });

            // Hàm cập nhật Total cho từng sản phẩm
            function updateTotal(row) {
                let unitPrice = parseFloat(row.find(".unit-price").data("price"));
                let quantity = parseInt(row.find(".quantity__number").val()) || 1;
                let total = unitPrice * quantity;

                row.find(".total-price").text(formatCurrency(total) + " VNĐ");
            }

            // Hàm cập nhật SUBTOTAL và GRAND TOTAL
            function updateSummary() {
                let subtotal = 0;

                // Tính tổng tiền của tất cả các sản phẩm
                $(".cart__table--body__items").each(function () {
                    let total = parseFloat($(this).find(".total-price").text().replace(/\./g, '').replace(" VNĐ", '')) || 0;
                    subtotal += total;
                });

                // Cập nhật SUBTOTAL
                $(".subtotal").text(formatCurrency(subtotal) + " VNĐ");

                // Cập nhật GRAND TOTAL
                let grandTotal = subtotal + shippingFees;
                $(".grand-total").text(formatCurrency(grandTotal) + " VNĐ");
            }

            // Hàm định dạng tiền tệ
            function formatCurrency(amount) {
                return amount.toLocaleString("vi-VN");
            }

        });


    </script>

    <script>
        $("#submit-updateCarts").on("click", function (e) {
            $("form[name='updateCarts']").trigger("submit");
        });
        $("#checkout").on("click", function (e) {
            $("form[name='checkout']").trigger("submit");
        });
    </script>
    @if($carts->count() <=0)
        <script>
            $("#checkout1").on("click", function (e) {
                swal("Giỏ hàng còn trống ", "Vui lòng thêm sản phẩm vào giỏ nhàng", "error", {
                    button: "OK",
                })
            });
        </script>
    @endif
@endsection
