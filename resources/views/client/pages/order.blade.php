@extends('client.pages.settings.master')
@section('title', 'Siêu thị thực phẩm')
@section('child-content')
    <!-- my account section start -->
    <div class="account__wrapper">
        <div class="account__content">
            <h2 class="account__content--title h3 mb-20">Orders History</h2>
            <div class="account__table--area">
                <div id="product_list" class="tab_pane active show">
                    <div class="product__section--inner">
                        <div class="row row-cols-1 mb--n30">
                            @foreach($Orders as $Order )

                                @foreach($Order->order_detail as $orderDetail )
                                    <div class="col mb-30 "
                                         style=" background: var(--white-color); border-radius: 10px; -webkit-box-shadow: 0 7px 20px rgba(0, 0, 0, .16);  box-shadow: 0 7px 20px rgba(0, 0, 0, .16); padding: 2rem;">
                                        <i >{{ App\Common\Constants::STATUS_ORDER[$Order->status] }} </i>
                                        <hr>
                                        <div class="product__items product__list--items d-flex">
                                            <div class="product__items--thumbnail product__list--items__thumbnail"
                                                 style="   ">
                                                <a class="product__items--link" href="{{route('order_detail',['id'=>$Order->id])}}">

                                                    <img class="product__items--img product__primary--img"
                                                         src="{{asset('storage/' .$orderDetail->image)}}" alt="product-img">
                                                </a>
                                            </div>
                                            <div class="product__list--items__content">
                                                <h3 class="product__list--items__content--title h4 mb-10"><a
                                                        href="{{route('order_detail',['id'=>$Order->id])}}">{{$orderDetail->name}} </a>
                                                </h3>
                                                <div class="product__list--items__price mb-10">
                                                    <span><b>x{{$orderDetail->quantity}}</b></span>
                                                    <span class="current__price">{{ number_format($orderDetail->price * $orderDetail->quantity, 0, ',', '.') . " VNĐ"   }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <ul class="product__items--action d-flex">
                                            <a class="blog__content--btn primary__btn mr-1"
                                               style="    margin-right: 2%;" href="{{ route('product',['slug'=>$orderDetail->slug])  }}">Buy
                                                back</a>
                                            <a class="blog__content--btn primary__btn" href="{{route('order_detail',['id'=>$Order->id])}}">See
                                                details</a>
                                        </ul>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my account section end -->
@endsection

@section('javascript')
    <script>
        function previewFile(input) {
            var file = $("#avatar_image").get(0).files[0];
            $("#imgavatar2").css("display", "block");
            $("#imgavatar1").css("display", "none");
            console.log(file);
            if (file) {
                var reader = new FileReader();
                reader.onload = function () {
                    $('#previewimgavatar').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
