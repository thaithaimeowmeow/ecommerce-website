@extends('layouts.app')

@section('content')

<div class="container rounded bg-white mt-5 mb-5 shadow">
<div class="p-3 py-5">
        <form action="{{route('profile.password')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="d-flex justify-content-between align-items-center experience"><span>Mật khẩu</span>
            </div><br>
            <div class="col-md-12"><label for="current_password" class="col col-form-label"><strong>{{ __('Mật khẩu hiện tại')
                        }}</strong></label>
                <input id="current_password" type="password"
                    class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                    autofocus>
                @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> <br>
            <div class="col-md-12"><label for="new_password" class="col col-form-label"><strong>{{ __('Mật khẩu mới')
                        }}</strong></label>
                <input id="new_password" type="password"
                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                    autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> <br>
            <div class="col-md-12"><label for="re_new_password" class="col col-form-label"><strong>{{ __('Nhập lại mật khẩu mới')
                        }}</strong></label>
                <input id="re_new_password" type="password" class="form-control @error('re_new_password') is-invalid @enderror"
                    name="re_new_password" autofocus>
                @error('re_new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> <br>
        <div class="text-center"><button class="btn btn-primary profile-button" type="submit">Lưu</button></div>
        </form>
    </div>

</div>



</div>
</div>

</div>

    


@endsection