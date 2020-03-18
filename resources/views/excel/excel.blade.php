@extends('master-layout')
@section('title','Trang chủ')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-4">
				<form action="{{route('report.export')}}" method="post">
					@csrf
						<div class="font-weight-bold mb-3 text-center">Xuất báo cáo ra file excel</div>
						<div class="form-group">
							<label for="">Ngày bắt đầu:</label>
							<input name="start" type="date" class="form-control">
							@if($errors->has('start'))
							<div class="text-danger mt-2">{{$errors->first('start')}}</div>
							@endif
						</div>
						<div class="form-group">
							<label for="">Ngày kết thúc:</label>
							<input name="end" type="date" class="form-control">
							@if($errors->has('end'))
							<div class="text-danger mt-2">{{$errors->first('end')}}</div>
							@endif
						</div>
						<button type="submit" class="btn btn-primary">Tạo File Excell</button>
				</form>	
			</div>
		</div>
	</div>
</section>
@endsection
