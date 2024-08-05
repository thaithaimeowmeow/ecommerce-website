@extends('layouts.app')
@section('content')
    <div class="pt-5 text-center">
        <h1 class="display-4 fw-bolder ">Tất cả sản phẩm ({{ $product->count() }})</h1>
    </div>
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