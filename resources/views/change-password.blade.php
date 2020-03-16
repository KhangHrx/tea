@extends('master-layout')
@section('title','Đổi mật khẩu')
@section('content')
<section>
    <div class="container d-flex justify-content-center mt-4">
        <div style="width: 600px">
            <form action="{{route('change_password')}}" method="post" onsubmit="return submitForm()">
            @csrf
                <h4 class="text-center mb-4">Đổi mật khẩu</h4>
                <div class="text-primary mb-4 font-weight-bold">Lần đổi mật khẩu gần đây nhất: {{date('h:m:s - d/m/Y',strtotime(Auth::user()->updated_at))}}</div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Mật khẩu hiện tại:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control old_password" id="inputPassword" name="old_password">
                        <div class="messageReturn">
                            @if($errors->has('old_password'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('old_password')}}
                                </div>
                            @endif
                            @if (session('message'))
                                <div class="text-danger mt-2">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-danger mt-2" id="oldPasswordMessage"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Mật khẩu mới:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control new_password" id="inputPassword" name="new_password">
                        <div class="messageReturn">
                            @if($errors->has('new_password'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('new_password')}}
                                </div>
                            @endif
                        </div>
                        <div class="text-danger mt-2" id="newPasswordMessage"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Xác nhận:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control confirm_password" id="inputPassword" name="confirm_password">
                        <div class="messageReturn">
                            @if($errors->has('confirm_password'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('confirm_password')}}
                                </div>
                            @endif
                            @if (session('message_confirm_password'))
                                <div class="text-danger mt-2">
                                    {{ session('message_confirm_password') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-danger mt-2" id="confirmPasswordMessage"></div>
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

<script>
    function submitForm(){
        var oldPassword = document.querySelector(".old_password");
        var newPassword = document.querySelector(".new_password");
        var confirmPassword = document.querySelector(".confirm_password");
        var oldPasswordMessage = document.getElementById("oldPasswordMessage");
        var newPasswordMessage = document.getElementById("newPasswordMessage");
        var confirmPasswordMessage = document.getElementById("confirmPasswordMessage");
        var messageReturn = document.getElementsByClassName("messageReturn");
        for(var i=0;i<messageReturn.length;i++){
            messageReturn[i].style.display = 'none';
        }
        oldPasswordMessage.innerText = "";
        newPasswordMessage.innerText = "";
        confirmPasswordMessage.innerText = "";
        var reg = /^[0-9a-zA-Z]{3,}$/
        if(oldPassword.value == ""){
            oldPasswordMessage.innerText = "Nhập mật khẩu hiện tại";
            return false;
        }else if(newPassword.value == ""){
            newPasswordMessage.innerText = "Nhập mật khẩu mới";
            return false;
        }else if(oldPassword.value == newPassword.value){
            newPasswordMessage.innerText = "Mật khẩu mới phải khác mật khẩu cũ";
            return false;
        }else if(!reg.test(newPassword.value)){
            newPasswordMessage.innerText = "Mật khẩu tối thiểu 3 ký tự và chỉ chứa 0-9, a-z, A-Z";
            return false;
        }else if(newPassword.value != confirmPassword.value){
            confirmPasswordMessage.innerText = "Mật khẩu xác nhận không đúng";
            return false;
        }
    }
</script>