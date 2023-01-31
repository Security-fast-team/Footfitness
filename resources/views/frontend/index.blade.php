@extends('frontend.layouts.app')
@push('custom-css')
    <style>
        .product-image {
            max-height: 100px;
        }

        #cart_mobile a {
            color: black;
        }
    </style>
@endpush
@section('page_conent')
    <div class="main-content-wrapper home-page">
        <div class="wrapper-container" style="padding-top: 59px;">
            {{-- Main banner  --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner carouser_image">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/frontend/images/slider/1.webp') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/frontend/images/slider/2.webp') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/frontend/images/slider/3.webp') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            {{-- End main banner  --}}


            {{--Product Deals products--}}
            <div class=" home-page">
                <div class="" style="padding-top: 7px;"><div class="main-home-banner"></div>
                    <div class="product-module best-deals">

                        <div class="d-flex justify-content-between category-title align-items-center" style="background-color: #ac1900; margin-bottom: 16px;">
                            <div class="">
                                <h3 class="" style="font-size: 16px;">Best Deals</h3>
                            </div>
                            <div class="">
                                <a class="btn text-white btn-sm" style="margin-right: 15px;" href="{{ url('all_product') }}"><span><i class="fa fa-eye"></i> See All</span></a>
                            </div>
                        </div>

                        <div class="product-listing bg-white">
                            @forelse($products as $product)
                                <div class="product-layout">
                                    <div class="product">
                                        <div class="marks">
                                            @if($product->discount == 0) @else <span class="mark">Save: ৳ {{ ($product->discount) }}</span> @endif
                                        </div>
                                        <a href="{{ route('product_details', [$product->id]) }}">
                                            <img class="thumb img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}">
                                            <div class="name title{{ $product->id }} mt-2">{{ $product->title }}</div>
                                        </a>
                                        <div class="price">

                                            @if($product->discount == 0.00)
                                                <span style="display: none;" class="special dis-price{{ $product->id }}">{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                                <span class="regular">৳</span><span class="regular price{{ $product->id }}">{{ en2bn($product->price) }}</span>
                                            @else
                                                <span class="special m-0">৳</span><span class="special dis-price{{ $product->id }}">{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                                <span class="regular" style="text-decoration: line-through;">৳</span><span style="text-decoration: line-through;" class="regular price{{ $product->id }}">{{ en2bn($product->price) }}</span>
                                            @endif

                                        </div>
                                        <div class="clear"></div>
                                        <div class="card-footer">
                                            <a href="" class=" add-to-cart add-cart-btn" id="{{ $product->id }}">
                                                <i class="fa fa-cart-plus"></i>
                                                <span>Add to Cart</span></a>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                @if (isset($category))
                                    <p class="w-100 text-center">There are no products in best deals</p>
                                @else
                                    <p class="w-100 text-center">There are no products</p>
                                @endif
                            @endforelse

                        </div>
                    </div>

                </div>
            </div>

            {{--Banner image show--}}
            <div id="collage-0" class="row collage p-top-15 d-flex flex-wrap justify-content-between">
                <div class="col-6 item add-banner">
                    <a href="{{ url('all_product') }}"><img src="banner/babycare-groceries-banner-2.jpg" alt="Banner 1" class="img-responsive"></a>
                </div>
                <div class="banner col-6 item add-banner">
                    <a href="{{ url('all_product') }}"><img src="banner/babycare-sanitizer-banner-2.jpg" alt="Banner 2" class="img-responsive"></a>
                </div>
            </div>

            {{-- BEST SELLING PRODUCTS products show--}}
            <div class="product-module Toys">
                <div class="d-flex justify-content-between category-title align-items-center">
                    <div class="">
                        <h3 class="" style="font-size: 20px;">Best Selling Products</h3>
                    </div>
                    <div class="">
                        <a class="btn text-white btn-sm" href="{{ url('all_product') }}"><span><i class="fa fa-eye"></i> See All</span></a>
                    </div>
                </div>
                <hr class="m-0 mb-3 py-1" style="background-color: #00b8d4;">


                <div class="product-listing bg-white">

                    @forelse($products_hot as $product)
                        <div class="product-layout">
                            <div class="product">
                                <div class="marks">
                                    @if($product->discount == 0) @else <span class="mark">Save: ৳ {{ ($product->discount) }}</span> @endif
                                </div>
                                <a href="{{ route('product_details', [$product->id]) }}">
                                    <img class="thumb img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}">
                                    <div class="name title{{ $product->id }} mt-2">{{ $product->title }}</div>
                                </a>
                                <div class="price">

                                    @if($product->discount == 0.00)
                                        <span style="display: none;" class="special dis-price{{ $product->id }}">{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                        <span class="regular">৳</span><span class="regular price{{ $product->id }}">{{ en2bn($product->price) }}</span>
                                    @else
                                        <span class="special m-0">৳</span><span class="special dis-price{{ $product->id }}">{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                        <span class="regular" style="text-decoration: line-through;">৳</span><span style="text-decoration: line-through;" class="regular price{{ $product->id }}">{{ en2bn($product->price) }}</span>
                                    @endif

                                </div>
                                <div class="clear"></div>
                                <div class="card-footer">
                                    <a href="" class=" add-to-cart add-cart-btn" id="{{ $product->id }}">
                                        <i class="fa fa-cart-plus"></i>
                                        <span>Add to Cart</span></a>
                                </div>
                            </div>
                        </div>

                    @empty
                        @if (isset($category))
                            <p class="w-100 text-center">There are no products in best deals</p>
                        @else
                            <p class="w-100 text-center">There are no products</p>
                        @endif
                    @endforelse

                </div>
            </div>

            {{--Banner two image show--}}
            <div id="collage-0" class="row collage p-top-15 d-flex flex-wrap justify-content-between">
                <div class="col-6 item add-banner">
                    <a href="{{ url('all_product') }}"><img src="banner/molfix-web-banner (1).jpg" alt="Banner 1" class="img-responsive"></a>
                </div>
                <div class="banner col-6 item add-banner">
                    <a href="{{ url('all_product') }}"><img src="banner/neocare-web-banner.jpg" alt="Banner 2" class="img-responsive"></a>
                </div>
            </div>

            {{--Diapering products show--}}
            <div class="product-module Toys">
                <div class="d-flex justify-content-between category-title align-items-center">
                    <div class="">
                        <h3 class="" style="font-size: 20px;">Featured Products</h3>
                    </div>
                    <div class="">
                        <a class="btn text-white btn-sm" href="{{ url('all_product') }}"><span><i class="fa fa-eye"></i> See All</span></a>
                    </div>
                </div>
                <hr class="m-0 mb-3 py-1" style="background-color: #00b8d4;">
                <div class="product-listing bg-white">

                    @forelse($products_default as $product)
                        <div class="product-layout">
                            <div class="product">
                                <div class="marks">
                                    @if($product->discount == 0) @else <span class="mark">Save: ৳ {{ ($product->discount) }}</span> @endif
                                </div>
                                <a href="{{ route('product_details', [$product->id]) }}">
                                    <img class="thumb img{{ $product->id }}" src='{{ asset("$product->photo") }}' alt="{{ $product->title }}" title="{{ $product->title }}">
                                    <div class="name title{{ $product->id }} mt-2">{{ $product->title }}</div>
                                </a>
                                <div class="price">

                                    @if($product->discount == 0.00)
                                        <span style="display: none;" class="special dis-price{{ $product->id }}">{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                        <span class="regular">৳</span><span class="regular price{{ $product->id }}">{{ en2bn($product->price) }}</span>
                                    @else
                                        <span class="special m-0">৳</span><span class="special dis-price{{ $product->id }}">{{ en2bn($product->price - ($product->discount ?? 0)) }}</span>
                                        <span class="regular" style="text-decoration: line-through;">৳</span><span style="text-decoration: line-through;" class="regular price{{ $product->id }}">{{ en2bn($product->price) }}</span>
                                    @endif

                                </div>
                                <div class="clear"></div>
                                <div class="card-footer">
                                    <a href="" class=" add-to-cart add-cart-btn" id="{{ $product->id }}">
                                        <i class="fa fa-cart-plus"></i>
                                        <span>Add to Cart</span></a>
                                </div>
                            </div>
                        </div>

                    @empty
                        @if (isset($category))
                            <p class="w-100 text-center">There are no products in best deals</p>
                        @else
                            <p class="w-100 text-center">There are no products</p>
                        @endif
                    @endforelse

                </div>
            </div>

            <div class="mt-3">
                <div class="bg-white p-15 m-t-15">
                    <p style="">Babycare.com.bd was found back in 2012 when there were only a few E-commerce sites operating in Bangladesh. Babycare.com.bd is the first ever Bangladeshi website specialized in baby care products, for the best care you can get for your baby.&nbsp;<span style="text-align: center;">We are the most t</span><span style="text-align: center;">rusted online shop for Diapering, Feeding, Baby Foods, Toys, Fashion, Cosmetics&nbsp;for Mother and Groceries.&nbsp;</span><span style="text-align: center;">Superfast n</span><span style="text-align: center;">ationwide cash on delivery&nbsp;</span><span style="text-align: center;">service brings the products at your doorstep. Happy Shopping!</span></p>
                </div>
            </div>
        </div>



    </div>
@endsection
@push('custom-js')

@endpush
