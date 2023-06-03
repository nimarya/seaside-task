@extends('layouts.app')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/images/bg_6.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Products</span></p>
                    <h1 class="mb-0 bread">Collection Products</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">

                    {{-- Section with dinamic view of products in the shop --}}

                    @if ($products->isNotEmpty())
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                                <div class="product">
                                    <a href="/products/{{$products->first()->id; }}" class="img-prod"><img class="img-fluid"
                                            src="assets/images/{{ $products->first()->cover; }}" alt="Colorlib Template">
                                        <span class="status">30%</span>
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 px-3">
                                        <h3><a href="/products/{{ $products->first()->id; }}">{{ $products->first()->name; }}</a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price"><span class="mr-2 price-dc">${{ $products->first()->cost; }}</span><span
                                                        class="price-sale">${{ $products->first()->cost*0.7; }}</span></p>
                                            </div>
                                            <div class="rating">
                                                <p class="text-right">
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                </p>
                                            </div>
                                        </div>

                                        {{-- Adding items to cart only to athenticated users --}}
                                        @auth
                                            <p class="bottom-area d-flex px-3">
                                                <a href="/cart/store/{{ $products->first()->id; }}" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                                            class="ion-ios-add ml-1"></i></span></a>
                                                <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                                            class="ion-ios-cart ml-1"></i></span></a>
                                            </p>
                                        @endauth
                                    </div>
                                </div>
                            </div>

                            @foreach ($products->skip(1) as $product)
                                
                                <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                                    <div class="product">
                                        <a href="/products/{{$product->id; }}" class="img-prod"><img class="img-fluid"
                                                src="assets/images/{{ $product->cover; }}" alt="Colorlib Template">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="text py-3 px-3">
                                            <h3><a href="/products/{{ $product->id; }}">{{ $product->name; }}</a></h3>
                                            <div class="d-flex">
                                                <div class="pricing">
                                                    <p class="price"><span>${{ $product->cost; }}</span></p>
                                                </div>
                                                <div class="rating">
                                                    <p class="text-right">
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- Adding items to cart only to athenticated users --}}
                                            @auth
                                                <p class="bottom-area d-flex px-3">
                                                    <a href="/cart/store/{{ $product->id; }}" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                                                class="ion-ios-add ml-1"></i></span></a>
                                                    <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                                                class="ion-ios-cart ml-1"></i></span></a>
                                                </p>
                                            @endauth
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    @endif
                        
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 sidebar">
                    <div class="sidebar-box-2">
                        {{-- Dinamic view of existing categories --}}

                        <h2 class="heading mb-4"><a href="{{ route('shop'); }}">Clothing</a></h2>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="/shop?category_id={{ $category->id; }}">{{ $category->name; }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
