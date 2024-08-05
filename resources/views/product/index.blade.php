@extends('layouts.app')

@section('content')
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="img-fluid card-img-top mb-5 mb-md-0" src="/storage/{{ $product->displayImage }} "
                    alt="..." />
            </div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: {{ $product->sku }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                @if( $product->quanity )
                    @if($product->quanity < 10)
                     <p class="text-warning">Chỉ còn {{$product->quanity}}sản phẩm</p>
                    @endif
                @else
                    <p class="text-danger">Sản phẩm hiện không còn hàng</p>
                @endif
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">
                            <?php
                        if( $product->display_price!=NULL && ($product->display_price < $product->price))
                            echo(number_format((float)$product->price))
                    ?>
                        </span>
                        <span>{{ number_format((float)$product->display_price) }} ₫</span>
                    </div>
                    @if($product->cpu)
                    <p class="lead">- CPU: {{ $product->cpu}} </p>
                    @endif
                    @if($product->monitor)
                    <p class="lead">- Màn hình: {{ $product->monitor}} </p>
                    @endif
                    @if($product->ram)
                    <p class="lead">- RAM: {{ $product->ram}} </p>
                    @endif
                    @if($product->gpu)
                    <p class="lead">- Đồ họa: {{ $product->gpu}} </p>
                    @endif
                    @if($product->storage)
                    <p class="lead">- Lưu trữ: {{ $product->storage}} </p>
                    @endif
                    @if($product->os)
                    <p class="lead">- Hệ điều hành: {{ $product->os}} </p>
                    @endif
                    @if($product->battery)
                    <p class="lead">- Pin: {{ $product->battery}} </p>
                    @endif
                    @if($product->weight)
                    <p class="lead">- Khối lượng: {{ $product->weight}} </p>
                    @endif

                    @if( $product->quanity)
                         <form action="{{route('cart.add',$product->id)}}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="quanity" name="quanity" type="number"
                                value="0" min="0" max="{{$product->quanity}}" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <img src="/storage/icons/cart.svg" alt="">
                                Thêm vào giỏ hàng
                            </button>
                        </div>
                        </form>
                     @else
                    @endif


            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Sản phẩm khác</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ($allProduct->take(4) as $allProduct)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <?php
                        if( $allProduct->display_price!=NULL && ($allProduct->display_price < $allProduct->price))
                        echo('<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>')
                    ?>
                    <!-- Product image-->
                    <img class="img-fluid card-img-top" src="/storage/{{ $allProduct->thumbnail }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"> {{ $allProduct->name }} </h5>
                            <!-- Product price-->
                            {{-- $40.00 - $80.00 --}}
                            <?php
                                if( $allProduct->display_price!=NULL && ($allProduct->display_price < $allProduct->price))
                                echo('<span class="text-muted text-decoration-line-through">' . number_format((float)$allProduct->price) . '</span>')
                            ?>
                            {{ number_format((float)$allProduct->display_price) }} ₫
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                href="{{ route('product.show',$allProduct->id) }}">Xem sản phẩm</a></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection