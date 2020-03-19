@extends('master-layout')
@section('title','Trang chủ')
@section('content')
<section id="tai-khoan" class="mt-5">
	<div class="container">
		<div class="row mt-4">
			<div class="col-sm-12">
				@if(session('message'))
				<div class="alert alert-success">{{session('message')}}</div>
				@endif
				<table class="table table-bordered rounded" >
					<thead>
						<tr>
							<th>Loại tài khoản</th>
							<th>Họ tên</th>
							<th>Email</th>
							<th>SĐT</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($model as $m)
						<tr>
							<td><?php echo ($m['permission']==1)?"Nhân viên":"Kế toán" ?></td>
							<td>{{$m['name']}}</td>
							<td>{{$m['email']}}</td>
							<td>{{$m['phone']}}</td>
							<td>
								<a href="{{route('user.reset_password',['id'=>$m['id']])}}" class="btn btn-warning">Reset Mật khẩu</a>
								<a href="{{route('user.delete',['id'=>$m['id']])}}" class="btn btn-danger">Xóa</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-sm-4">
				<form action="{{route('user.insert')}}" method="post">
				@csrf
					<div class="font-weight-bold mb-3 text-center">Thêm tài khoản</div>
					<div class="form-group">
						<label for="">Loại tài khoản:</label>
						<select name="permission" id="" class="form-control">
							<option value="1">Nhân viên</option>
							<option value="2">Kế toán</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Họ tên:</label>
						<input name="name" type="text" class="form-control">
						@if($errors->has('name'))
						<div class="text-danger mt-2">{{$errors->first('name')}}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Email:</label>
						<input name="email" type="email" class="form-control">
						@if($errors->has('email'))
						<div class="text-danger mt-2">{{$errors->first('email')}}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<input name="phone" type="text" class="form-control">
						@if($errors->has('phone'))
						<div class="text-danger mt-2">{{$errors->first('phone')}}</div>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">Thêm</button>
				</form>	
			</div>
		</div>
	</div>
</section>
@endsection
