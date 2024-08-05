@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col">
      <p><span class="h2">Giỏ hàng của bạn </span><span class="h4">({{$cart->cart_items->count()}} món hàng)</span></p>


      <?php $total = 0;?>

      @foreach( $cart->cart_items as $item )
      <div class="card mb-4 ">
        <div class="card-body p-4 ">
          <div class="row align-items-center">
            <div class="col-md-2">
              <a href="{{ route('product.show',$item->product->id) }}"><img
                  src="/storage/{{ $item->product->thumbnail }}" class="img-fluid" alt="Generic placeholder image">
              </a>
            </div>
            <div class="col-md-2 d-flex">
              <div>
                <p class="small text-muted mb-4 pb-2">Tên</p>
                <p title="{{$item->product->name}}" class="lead fw-normal mb-0">{{
                  \Illuminate\Support\Str::limit($item->product->name, $limit = 15,
                  $end = '...') }}</p>
              </div>
            </div>
            <div class="col-md-2 d-flex">
              <div>
                <p class="small text-muted mb-4 pb-2">Số lượng</p>
                <p class="lead fw-normal mb-0">{{ $item->quanity }}</p>
              </div>
            </div>
            <div class="col-md-2 d-flex">
              <div>
                <p class="small text-muted mb-4 pb-2">Giá</p>
                <p class="lead fw-normal mb-0">{{ number_format($item->product->display_price) }} ₫</p>
              </div>
            </div>
            <div class="col-md-2 d-flex">
              <div>
                <p class="small text-muted mb-4 pb-2">Thành tiền</p>
                <p class="lead fw-normal mb-0">{{ number_format($item->product->display_price*$item->quanity) }} ₫</p>
                <?php $total = $total + $item->product->display_price*$item->quanity ?>
              </div>
            </div>
            <div class="col-md-2 d-flex">
              <div>
                <p class="small text-muted mb-4 pb-2">REMOVE</p>
                <form method="POST" action="{{route('cart.delete',$item->id)}}">
                  @csrf
                  @method('DELETE')
                  <button type=submit><img src="/storage/icons/trash.svg" alt=""></button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
      @endforeach

      <div class="card mb-5">
        <div class="card-body p-4">

          <div class="float-end">
            <p class="mb-0 me-5 d-flex align-items-center">
              <span class="small text-muted me-2">Tổng tiền:</span> <span class="lead fw-normal">{{
                number_format($total) }} ₫</span>
            </p>
          </div>

        </div>
      </div>

      <div class="d-flex justify-content-end">
        <a href="{{route('home')}}">
          <button type="button" class="btn btn-dark btn-lg me-2">Tiếp tục mua hàng</button>
        </a>
        <form action="#" enctype="multipart/form-data" method="post">
          @csrf
          <button type="submit" class="btn btn-primary btn-lg">Thanh toán</button>
        </form>
      </div>

    </div>
  </div>
  <p><span class="h2">Lịch sử mua hàng</span></p>

  @foreach($orders as $order)
  <div class="card mb-5 mt-4">
    <div class="d-flex justify-content-center">
      <div class="modal-body text-start text-black p-4">
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Mã đơn hàng: <b>{{$order->id}}</b></h5>
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">{{$order->created_at}}</h5>
        <hr class="mb-4"
          style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
        @foreach($order->order_items as $item)
        <div class="d-flex justify-content-between">
          <p class="fw-bold mb-0">{{$item->product->name}} (x{{$item->quanity}})</p>
          <p class="text-muted mb-0">{{number_format($item->total)}} ₫</p>
        </div>
        @endforeach



        <div class="d-flex justify-content-between">
          <p class="fw-bold">Thành tiền</p>
          <p class="fw-bold" style="color: #35558a;">{{number_format($order->total)}} ₫</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach


</div>



@endsection