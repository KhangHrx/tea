@extends('master-layout')
@section('title','Đổi mật khẩu')
@section('content')
<section>
    <div class="container d-flex justify-content-center mt-4">
        <div style="width: 600px">
            <form action="{{route('change_password')}}" method="post">
            @csrf
                <h4 class="text-center mb-4">Đổi mật khẩu</h4>
                <div class="text-primary mb-4 font-weight-bold">Lần đổi mật khẩu gần đây nhất: {{date('h:m:s - d/m/Y',strtotime(Auth::user()->updated_at))}}</div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Mật khẩu hiện tại:</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" name="old_password">
                    @if($errors->has('old_password'))
                    <div class="text-danger">{{$errors->first('old_password')}}</div>
                    @endif
                    @if (session('message'))
                        <div class="text-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Mật khẩu mới:</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" name="new_password">
                    @if($errors->has('new_password'))
                    <div class="text-danger">{{$errors->first('new_password')}}</div>
                    @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Xác nhận:</label>
                    <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" name="confirm_password">
                    @if($errors->has('confirm_password'))
                    <div class="text-danger">{{$errors->first('confirm_password')}}</div>
                    @endif
                    @if (session('message_confirm_password'))
                        <div class="text-danger">
                            {{ session('message_confirm_password') }}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection