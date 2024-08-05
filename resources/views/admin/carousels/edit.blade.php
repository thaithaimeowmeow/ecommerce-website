@extends('layouts.admin')

@section('content')

<div class="container rounded bg-white mt-5 mb-5 justify-content-center p-5 border shadow-sm">
    <form action="{{ route('carousel.update',$carousel->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col">
                <div class="row">
                    {{-- LABEL --}}
                    <div class="row mb-3">
                        <label for="label" class="col-md-4 col-form-label text-md-end">{{ __('Label') }}</label>

                        <div class="col-md-6">
                            <input id="label" type="label" class="form-control @error('label') is-invalid @enderror"
                                name="label" value="{{ $carousel->label }}" autocomplete="label" autofocus>

                            @error('label')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- PARAGRAPH --}}
                    <div class="row mb-3">
                        <label for="paragraph" class="col-md-4 col-form-label text-md-end">{{ __('Paragraph') }}</label>

                        <div class="col-md-6">
                            <input id="paragraph" type="paragraph"
                                class="form-control @error('paragraph') is-invalid @enderror" name="paragraph"
                                value="{{ $carousel->paragraph }}" autocomplete="paragraph" autofocus>

                            @error('paragraph')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{-- IMAGE --}}
                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                        <div class="col-md-6">
                            <input class="form-control" type="file" id="image" name="image">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row pt-3">
                        <button class="btn btn-primary">Lưu thông tin</button>
                    </div>

                </div>
            </div>
            <div class="col">

                {{-- PARAGRAPH --}}
                <div class="row mb-3">
                    <label for="product_id" class="col-md-4 col-form-label text-md-end">{{ __('Product') }}</label>

                    <div class="col-md-6">
                        <select id="product_id" type="product_id"
                        class="form-control @error('product_id') is-invalid @enderror" name="product_id"
                        value="{{ $carousel->product_id }}" required autocomplete="product_id" autofocus>
                            <option value="{{$carousel->product_id}}">{{$carousel->product->name}}</option>
                            @foreach($product as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>

                        @error('product_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


            </div>
        </div>


    </form>
    <form action="{{ route('carousel.destroy',$product->id) }}" method="POST">
        @method('DELETE')
        @csrf
        <div class="row pt-3">
            <button class="btn btn-danger">Xóa Banner này</button>
        </div>
    </form>
</div>

@endsection