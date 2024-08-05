@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <div class="card mb-5 mt-4">
    <div class="d-flex justify-content-center">
      <div class="modal-body text-start text-black p-4">
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Mã đơn hàng:{{$order->id}}</h5>
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">{{$order->created_at}}</h5>
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Tên: <b>{{$order->user->profile->name}}</b></h5>
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Địa chỉ: <b>{{$order->user->profile->address}}</b></h5>
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">SĐT: <b>{{$order->user->profile->phone}}</b></h5>
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

</div>


@endsection