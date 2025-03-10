@extends('client.pages.settings.master')
@section('title', 'Siêu thị thực phẩm')
@section('child-content')
<div class="container">
    <div class="section__heading text-center mb-40">
        <h2 class="section__heading--maintitle">Thông tin cá nhân</h2>
    </div>
    <div class="main__contact--area position__relative">

        <div class="">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <form action="{{route('UpdateProfile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact__form--list mb-20">
                            <label class="contact__form--label" for="input1">Họ và tên <span
                                    class="contact__form--label__star">*</span></label>
                            <input class="contact__form--input" id="input1" placeholder="Họ và tên "
                                type="text" value="{{auth()->user()->fullname}}" name="fullname">
                            @error('fullname')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact__form--list mb-20">
                            <label class="contact__form--label" for="input3">Điện thoại <span
                                    class="contact__form--label__star">*</span></label>
                            <input class="contact__form--input" name="phone" id="input3"
                                placeholder="Số điện thoại..." type="phone"
                                value="{{auth()->user()->phone}}">
                            @error('phone')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact__form--list mb-20">
                            <label class="contact__form--label" for="input4">Email <span
                                    class="contact__form--label__star">*</span></label>
                            <input class="contact__form--input" name="email" id="input4"
                                placeholder="Email" value="{{auth()->user()->email}}" type="email">
                            @error('email')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact__form--list mb-20">
                            <label class="contact__form--label" for="input5">Địa chỉ<span
                                    class="contact__form--label__star">*</span></label>
                            <input class="contact__form--input" id="input5" placeholder="Địa chỉ..."
                                type="text" value="{{auth()->user()->address}}" name="address">
                            @error('address_detail')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="contact__form--btn primary__btn" type="submit">Thay đổi</button>
            </form>
        </div>
    </div>
</div>
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
            reader.onload = function() {
                $('#previewimgavatar').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection