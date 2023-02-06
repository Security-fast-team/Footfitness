@extends('frontend.layouts.app')
@push('custom-css')
@endpush
@section('page_conent')
    <!--///////-header-section-start-///////-->


    <div class="header-section">
        <div class="container">
            <div class="header-main-column">
                <h1 class="header-title"><span>যারা নিজের এবং পরিবারের সুস্বাস্থ্যের জন্য নিয়মিত ফলমূল-শাকসবজি খান,</span>
                    তাদের জন্য
                    <span class="hlight">অত্যন্ত কার্যকরী একটি ডিভাইস</span>
                </h1>
            </div>
            <h2 class="extra-title"><span>কোন রকম স্বাদ ও মানের পরিবর্তন ছাড়াই মাত্র ৮ মিনিটে</span> ফলমূল-শাকসবজি থেকে সকল
                প্রকার
                <span class="text-red">ক্ষতিকারক ফরমালিন/প্রিজারভেটিভস দূর করে গ্যারান্টি সহকারে</span>
            </h2>

        </div>
    </div>
    <!--///////-header-section-End-///////-->


    <!--///////-video-section-start-///////-->

    <div class="video-section">
        <div class="container">
            <div class="video-main-column">
                <h2 class="video-title">
                    {{-- মধুময় বাদাম এর উপকারিতা জানতে <span>নিচের সম্পূর্ণ ভিডিও দেখুন..</span> --}}
                </h2>
                <div class="video-column">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/QvbuDAaaQ6Y"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    <!--///////-video-section-End-///////-->

    <!--///////-service-section-start-///////-->

    <div class="service-section ">
        {{-- <div class="container"> --}}
        <div class="btn-column" style="margin-top: 15px">
            <a class="order-btn" href="#order-sec">পরিবারকে সুস্থ রাখতে অর্ডার করুন </a>
        </div>
        <div class="service-main-column bg-s">

            <div class="service-title bg-color">
                <h2 class="white">
                    ভেজাল খাদ্য গ্রহণের ফলে দেশে প্রতি বছর প্রায় ৩ লাখ লোক ক্যান্সারে আক্রান্ত হচ্ছে। ডায়াবেটিস আক্রান্তের
                    সংখ্যা ১ লাখ ৫০ হাজার, কিডনি রোগে আক্রান্তের সংখ্যা ২ লাখ। এ ছাড়া গর্ভবতী মায়ের শারীরিক জটিলতাসহ গর্ভজাত
                    বিকলাঙ্গ শিশুর সংখ্যা দেশে প্রায় ১৫ লাখ।
                </h2>
            </div>

            <div class="service-title bg-color">
                <h2 class="white">
                    কেন আপনার এই <span class="hlight">পিউরিফায়ার ডিভাইসটি</span> ব্যাবহার করা উচিৎ
                </h2>
            </div>

            {{-- clsess have to remove flex-column  --}}
            <div class="flex-column row">
                <div class="service-single-column col-md-6">
                    <div class="content">
                        <div class="service-img">
                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                        </div>
                        <h2>
                            এর Deep Purification সিস্টেম ৯৯% এরও বেশি জীবাণু, কেমিক্যাল এবং ফরমালিনসহ সব ধরণের ক্ষতিকারক
                            উপাদান দূর করতে সক্ষম খাবারের কোন প্রকার স্বাদ পরিবর্তন করা ছাড়াই.
                        </h2>
                    </div>
                </div>

                <div class="service-single-column col-md-6 ">
                    <div class="content">
                        <div class="service-img">
                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                        </div>
                        <h2> FRUITS & VEGETABLE PURIFIER ক্যাপসুল ডিভাইসটি আপনার পরিবারকে খাবার পরিষ্কার করার ক্লান্তিকর কাজ
                            থেকে দিবে, সময় বাঁচিয়ে পরিবার এবং স্বাস্থ্যের প্রতি আরও যত্নশীল হতে সাহায্য করবে</h2>
                    </div>
                </div>

                <div class="service-single-column col-md-6">
                    <div class="content">
                        <div class="service-img">
                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                        </div>
                        <h2>
                            অতিরিক্ত প্রিজারভেটিভস সেবনের ফলে শারীরিক ক্ষতি করতে পারে। এটি ক্যান্সারের অন্যতম কারণ। এই
                            FRUITS & VEGETABLE PURIFIER ডিভাইসটি ব্যবহার করার পরে, আপনি অনেকটাই নিরাপদ বোধ করবেন
                        </h2>
                    </div>
                </div>

                <div class="service-single-column col-md-6">
                    <div class="content">
                        <div class="service-img">
                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                        </div>
                        <h2>
                            সাধারণ পানি, ভিনেগার, সোডা দিয়ে ফলমূল ভিজিয়ে রেখে ফরমালিন/প্রিজারভেটিভস দূর করা সময় সাপেক্ষ
                            ব্যাপার যা এই ডিভাইসটি করে দিবে মাত্র ১০ মিনিটে সম্পূর্ণ আধুনিক পদ্দতিতে
                        </h2>
                    </div>
                </div>
            </div>
            <div class="div-btn">
                <span>ব্যবহারের নিয়ম</span>
            </div>
            <div class="service-title bg-color">
                <h2 class="white">
                    এই FRUITS & VEGETABLE PURIFIER ডিভাইসটি বালতি বা বউলে ৩ লিটার পানি নিয়ে আপনার ফলমূল কিংবা শাকসবজির সাথে
                    ডুবিয়ে রেখে দিন ১০ মিনিটের জন্য। ১০ মিনিট পর ডিভাইসটি অটোমেটিক্যালি বন্ধ হয়ে যাবে। যদি পানি এবং ফলমূল
                    কিংবা শাকসবজির পরিমান বেশি হয় তাহলে ২-৩ বার ডিভাইসটি অন করে পুনরায় পানির মধ্যে ছেড়ে দিন।
                </h2>
            </div>
        </div>
        {{-- </div> --}}
    </div>


    <!--///////-service-section-End-///////-->

    <!--///////-sefty-device-section-start-///////-->

    <div class="sefty-device-section">
        <div class="container">
            <div class="sefty-device-main box-shadow border border-ra">
                <div class="flex-column">
                    <div class="product-column">
                        <img class="sefty-device-img" src="{{ asset('images/1.jpg') }}" alt="sefty-device">
                    </div>
                    <div class="product-details-column">
                        {{-- <h2>Honey Nuts - <span>মধুময় বাদাম</span>
                            এর উপকারিতা।</h2>
                        <p>✔️ রক্তে কোলেস্টেরল কমানোর পাশাপাশি ক্যান্সার সৃষ্টি হওয়া থেকে বাধা দেয় এটি।</p>
                        <p>✔️ শরীরের রোগ প্রতিরোধ ক্ষমতা বৃদ্ধিসহ হার্ট অ্যাটাক ও স্টোকের আশংকা কমায়। </p>
                        <p>✔️ চেহারায় লাবণ্য ধরে রাখতে খুবই কার্যক</p>
                        <p>✔️ যারা শরী’র ফি’ট রাখতে চান তাদের জন্য খুবই উ’পকারী</p>
                        <p>✔️ স্মৃতিশক্তি বৃদ্ধি করে এবং তীক্ষ্ণ মেধা সম্পন্ন হতে সাহায্য করে।</p>
                        <p>✔️ অকাল বা’র্ধক্য রোধে অত্যন্ত কার্যকর ভূমিকা রাখে।</p> --}}
                        <div class="btn-column" style="margin-top:0px;">
                            <a class="order-btn" href="#order-sec"> পরিবারকে সুস্থ রাখতে অর্ডার করুন </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--///////-sefty-device-section-End-///////-->

    <!--///////-DELEVERY-section-START-///////-->
    {{-- <div class="delevery-charg-section">
        <div class="container">
            <div class="main">
                <h2 class="title">ডেলিভারি চার্জ</h2>
                <div class="flex-column">
                    <div class="left-col">
                        <h2> ঢাকার ভিতরে- <span>৬০ টাকা</span></h2>
                    </div>
                    <div class="left-col">
                        <h2> ঢাকার বাহিরে- <span> ১২০ টাকা</span></h2>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    <!--///////-DELEVERY-section-End-///////-->

    <!--///////-why-choose-section-START-///////-->
    <div class="why-choose-section">
        <div class="container">
            <div class="main">
                <h2 class="title">
                    কেন আমাদের পন্যটাই <span>অর্ডার করবেন ?</span></h2>
                <div class="flex-column why-order">
                    <div class="left-col">
                        <h2> ১. আমাদের পেজ এবং গ্রুপে পাবেন এই মধুময় বাদাম এর শতশত পজেটিভ রিভিউ আলহামদুলিল্লাহ, যারা হাতে
                            পেয়ে চেক করে খেয়ে রিভিউগুলো দিয়েছেন।</h2>
                    </div>
                    <div class="left-col option2">
                        <h2> ২. যেহেতু পন্য হাতে পেয়ে চেক করে এমনকি খেয়ে মুল্য পরিশোধ করতে পারছেন, তাই নিশ্চিতে অর্ডার করতে
                            পারেন।</span></h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="btn-column">
            <a class="order-btn" href="#order-sec">পরিবারকে সুস্থ রাখতে অর্ডার করুন </a>
        </div>
    </div>
    <!--///////-why-choose-section-End-///////-->

    <!--///////-order-section-start-///////-->
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="order-section">
            <div class="container" id="order-sec">
                <div class="order-main">
                    <h2 class="order-title">অর্ডার করতে আপনার সঠিক তথ্য দিয়ে নিচের ফর্মটি সম্পূর্ণ পূরন করুন। (আগে থেকে কোন
                        টাকা দেয়া লাগবে না। প্রোডাক্ট হাতে পাবার পর টাকা দিবেন)</h2>
                    <div class="flex-column">
                        <div class="billing-details-column">
                            <div class="billing-form">
                                <h2 class="main-title">Billing details</h2>
                                <form action="">
                                    <label for="name">আপনার সম্পূর্ন নাম: <abbr class="required"
                                            title="required">*</abbr></label><br>
                                    <input type="text" id="name" name="name" value=""
                                        placeholder="পুরো নাম" required><br>
                                    <label for="address">আপনার ঠিকানা: <abbr class="required"
                                            title="required">*</abbr></label><br>
                                    <input type="text" id="address" name="address" value=""
                                        placeholder="বাসা নং, রোড নং, জেলা, থানা" required><br>
                                    <label for="phn-number">আপনার মোবাইল নাম্বার: <abbr class="required"
                                            title="required">*</abbr></label><br>
                                    <input type="tel" id="phn-number" name="phone" value=""
                                        placeholder="017xxxxxxxx" required><br><br>
                                </form>
                            </div>
                        </div>
                        <div class="your-order-column">
                            <h2 class="main-title">Your order</h2>
                            <div class="order-cart">
                                <table>
                                    <thead class="order-heading">
                                        <tr>
                                            <th>
                                                <h3>Product</h3>
                                            </th>
                                            <th>
                                                <h3>Subtotal</h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-details">
                                        <tr class="order-product">
                                            <td><span><img src="img/product-img01.jpg" alt=""></span><span>মধুময়
                                                    বাদাম ৫০০ গ্রাম।</span></td>
                                            <td>
                                                <h3><span>x1</span>{{ $price }}</h3>
                                            </td>
                                        </tr>
                                        <tr class="total-bill">
                                            <td class="shipping-td">
                                                <h4>Subtotal</h4>
                                                <h4>Shipping</h4>
                                            </td>
                                            <td>
                                                <h4><span>৳</span><span id="sub-total">{{ $price }}</span></h4>
                                                @foreach ($shipping as $key => $ship)
                                                    <input type="radio" id="html{{ $ship->id }}" class="shipping"
                                                        data-price="{{ $ship->price }}" name="shipping_id"
                                                        value="{{ $ship->id }}"
                                                        @if ($loop->first) checked @endif>
                                                    <label for="html{{ $ship->id }}">{{ $ship->type }}-:
                                                        <br><span>৳{{ $ship->price }}</span></label><br>
                                                @endforeach

                                            </td>
                                        </tr>
                                        <tr class="total-bill">
                                            <td>
                                                <h3>Total</h3>
                                            </td>
                                            <td>
                                                <h3><span>৳</span><span class="total-bills">{{ $price }}</span>
                                                </h3>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="payment-column">
                                <div class="payment-box">
                                    <h3>Cash on delivery</h3>
                                    <div class="pay">
                                        <h3>Pay with cash upon delivery.</h3>
                                    </div>
                                </div>
                                <p>Your personal data will be used to process your order, support your experience throughout
                                    this website, and for other purposes described in our <span><a href="#">privacy
                                            policy</a></span>.</p>
                                <div class="place-order">
                                    <button type="submit">Place order ৳<span class="total-bills">500</span></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--///////-order-section-end-///////-->
@endsection
@push('js')
    {{-- //===================== jquery link --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let sub_total = Number($('#sub-total').text());
            // $('.shipping:eq(0)').on('click',function(){
            let shipping_price = Number($('.shipping:eq(0)').attr('data-price'));
            $('.total-bills').html(shipping_price + sub_total);
            console.log(shipping_price + sub_total);
            // });

            $('.shipping').on('click', function() {
                let shipping_price = Number($(this).attr('data-price'));
                $('.total-bills').html(shipping_price + sub_total);
            })
            let bg = true;
            $('.service-section .service-single-column').hover(function(){
                if(bg){
                    $(this).css({backgroundColor:'white'})
                    $(this).find('h2').css({color:'red'});
                    bg = false;
                }else{
                    $(this).css({backgroundColor:'red'})
                    $(this).find('h2').css({color:'white'});
                    bg = true;
                }
            })

        });
    </script>
@endpush
