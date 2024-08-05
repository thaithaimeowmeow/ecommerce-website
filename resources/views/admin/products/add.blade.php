@extends('layouts.admin')

@section('content')

<div class="container rounded bg-white mt-5 mb-5 justify-content-center p-5 border shadow-sm">
    <form action="#" enctype="multipart/form-data" method="post">
        @csrf


        <div class="row">
            <div class="col">
                <div class="row">
                    {{-- SKU --}}
                    <div class="row mb-3">
                        <label for="sku" class="col-md-4 col-form-label text-md-end">{{ __('SKU') }}</label>
            
                        <div class="col-md-6">
                            <input id="sku" type="sku" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') }}" required autocomplete="name" autofocus>
            
                            @error('sku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- PRODUCT NAME --}}
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tên sản phẩm') }}</label>
            
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- QUANITY --}}
                    <div class="row mb-3">
                        <label for="quanity" class="col-md-4 col-form-label text-md-end">{{ __('Số lượng') }}</label>
            
                        <div class="col-md-6">
                            <input id="quanity" type="number" class="form-control @error('quanity') is-invalid @enderror" name="quanity" value="{{ old('quanity') }}" required autocomplete="quanity" autofocus>
            
                            @error('quanity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- PRODUCT PRICE --}}
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Giá') }}</label>
            
                        <div class="col-md-6">
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
            
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- DISPLAY PRICE --}}
                    <!-- <div class="row mb-3">
                        <label for="display_price" class="col-md-4 col-form-label text-md-end">{{ __('Giá hiển thị') }}</label>
            
                        <div class="col-md-6">
                            <input id="display_price" type="number" class="form-control @error('display_price') is-invalid @enderror" name="display_price" value="{{ old('display_price') }}" autocomplete="display_price" autofocus>
            
                            @error('display_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->
                    {{-- THUMBNAIL --}}
                    <div class="row mb-3">
                        <label for="thumbnail" class="col-md-4 col-form-label text-md-end">{{ __('Thumbnail') }}</label>
            
                        <div class="col-md-6">
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
            
                            @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                    {{-- DISPLAY IMAGE  --}}
                    <div class="row mb-3">
                        <label for="displayImage" class="col-md-4 col-form-label text-md-end">{{ __('Ảnh hiển thị') }}</label>
            
                        <div class="col-md-6">
                            <input class="form-control" type="file" id="displayImage" name="displayImage">
            
                            @error('displayImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>

                    
                    <div class="row pt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
            </div>
            <div class="col">
                {{-- CPU --}}
                <div class="row mb-3">
                    <label for="cpu" class="col-md-4 col-form-label text-md-end">{{ __('CPU') }}</label>
        
                    <div class="col-md-6">
                        <input id="cpu" type="cpu" class="form-control @error('cpu') is-invalid @enderror" name="cpu" value="{{ old('cpu') }}"  autocomplete="cpu" autofocus>
        
                        @error('cpu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- MONITOR --}}
                <div class="row mb-3">
                    <label for="monitor" class="col-md-4 col-form-label text-md-end">{{ __('Màn hình') }}</label>
        
                    <div class="col-md-6">
                        <input id="monitor" type="monitor" class="form-control @error('monitor') is-invalid @enderror" name="monitor" value="{{ old('monitor') }}"  autocomplete="monitor" autofocus>
        
                        @error('monitor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- RAM --}}
                <div class="row mb-3">
                    <label for="ram" class="col-md-4 col-form-label text-md-end">{{ __('RAM') }}</label>
        
                    <div class="col-md-6">
                        <input id="ram" type="ram" class="form-control @error('ram') is-invalid @enderror" name="ram" value="{{ old('ram') }}"  autocomplete="ram" autofocus>
        
                        @error('ram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- GRAPHIC CARD --}}
                <div class="row mb-3">
                    <label for="gpu" class="col-md-4 col-form-label text-md-end">{{ __('Đồ họa') }}</label>
        
                    <div class="col-md-6">
                        <input id="gpu" type="gpu" class="form-control @error('gpu') is-invalid @enderror" name="gpu" value="{{ old('gpu') }}"  autocomplete="gpu" autofocus>
        
                        @error('gpu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- STORAGE --}}
                <div class="row mb-3">
                    <label for="storage" class="col-md-4 col-form-label text-md-end">{{ __('Lưu trữ') }}</label>
        
                    <div class="col-md-6">
                        <input id="storage" type="storage" class="form-control @error('storage') is-invalid @enderror" name="storage" value="{{ old('storage') }}"  autocomplete="storage" autofocus>
        
                        @error('storage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- OPERATION SYSTEM --}}
                <div class="row mb-3">
                    <label for="os" class="col-md-4 col-form-label text-md-end">{{ __('Hệ điều hành') }}</label>
        
                    <div class="col-md-6">
                        <input id="os" type="os" class="form-control @error('os') is-invalid @enderror" name="os" value="{{ old('os') }}"  autocomplete="os" autofocus>
        
                        @error('os')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- BATTERY --}}
                <div class="row mb-3">
                    <label for="battery" class="col-md-4 col-form-label text-md-end">{{ __('Pin') }}</label>
        
                    <div class="col-md-6">
                        <input id="battery" type="battery" class="form-control @error('battery') is-invalid @enderror" name="battery" value="{{ old('battery') }}"  autocomplete="battery" autofocus>
        
                        @error('battery')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- WEIGHT --}}
                <div class="row mb-3">
                    <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Khối lượng') }}</label>
        
                    <div class="col-md-6">
                        <input id="weight" type="weight" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}"  autocomplete="weight" autofocus>
        
                        @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


            </div>
        </div>


    </form>
</div>

@endsection