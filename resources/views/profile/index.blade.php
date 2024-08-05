@extends('layouts.app')

@section('content')

<div class="container rounded bg-white mt-5 mb-5 shadow">
    <form action="{{route('profile.edit')}}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="img-fluid rounded-circle mt-5 w-50 mb-3"
                        src="/storage/{{ Auth::user()->profile->avatar }}" alt="">
                    <span class="font-weight-bold">{{ Auth::user()->profile->name }}</span><span
                        class="text-black-50">{{
                        Auth::user()->email }}</span><span>
                    </span>
                    <div class="row mb-3">
                        {{-- <div class="d-flex"> --}}
                            <div class="row justify-content-center mt-3">
                                <div class="col-9 ms-3">
                                    <input class="form-control" type="file" id="avatar" name="avatar">
                                </div>
                            </div>
                            {{--
                        </div> --}}

                        @error('avatar')
                        <strong>{{ $message }}</strong>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Tài khoản của tôi</h4>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col col-form-label"><strong>{{ __('Họ và tên')
                                }}</strong></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ Auth::user()->profile->name }}" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        {{-- <div class="d-flex"> --}}
                            <label for="address" class="col col-form-label"><strong>{{ __('Địa chỉ')
                                    }}</strong></label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ Auth::user()->profile->address }}" autofocus>
                            {{--
                        </div> --}}
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col col-form-label"><strong>{{ __('SĐT')
                                }}</strong></label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ Auth::user()->profile->phone }}" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu thông
                            tin</button></div>
                </div>
    </form>

</div>


</div>
</div>

</div>

    


@endsection