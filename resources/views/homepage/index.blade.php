@extends('layouts.app')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{route('product.show',$first->product->id)}}">
                <img src="/storage/{{$first->image}}" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100"
                    alt="">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$first->label}}</h5>
                <p>{{$first->paragraph}}</p>
            </div>
        </div>
        @foreach($banner->take(2) as $banner)
        <div class="carousel-item">
            <a href="{{route('product.show',$banner->product->id)}}">
                <img src="/storage/{{$banner->image}}" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100"
                    alt="">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$banner->label}}</h5>
                <p>{{$banner->paragraph}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($product->take(8) as $product)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <?php
                        if( $product->display_price!=NULL && ($product->display_price < $product->price))
                        echo('<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>')
                    ?>
                    <!-- Product image-->
                    <img class="img-fluid card-img-top" src="/storage/{{ $product->thumbnail }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"> {{ $product->name }} </h5>
                            <!-- Product price-->
                            {{-- $40.00 - $80.00 --}}
                            <?php
                                if( $product->display_price!=NULL && ($product->display_price < $product->price))
                                echo('<span class="text-muted text-decoration-line-through">' . number_format((float)$product->price) . '</span>')
                            ?>
                            {{ number_format((float)$product->display_price) }} ₫
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                href="{{ route('product.show',$product->id) }}">Xem sản phẩm</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection