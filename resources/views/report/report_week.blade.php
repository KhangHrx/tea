@extends('master-layout')
@section('title','Trang chủ')
@section('content')
@if(session('message'))
<div class="container">
	<div class="list-customer-header pt-3 d-flex justify-content-between">
		<h3></h3>
		<div>
			<form action="" class="form-inline" method="post">
				@csrf
				<input type="number" min="1" max="5" value="1" class="form-control w-20" name="week">
				<input type="month" class="form-control mx-2" name="month">
				<button type="submit">Tìm</button>
			</form>
		</div>
	</div>
	<div class="alert alert-danger mt-4">{{session('message')}}</div>
</div>
@else
		<section id="home-page-admin" class="home-page">
			<main class="right-content list-customer-content">
				

				<!-- table info section -->
				<div class="container mt-4">
					<div class="list-customer-header pt-3 d-flex justify-content-between">
						<h3>Báo cáo thống kê tuần từ {{date('d/m/Y',strtotime($start))}} đến {{date('d/m/Y',strtotime($end))}}</h3>
						<div>
							<form action="" class="form-inline" method="post">
								@csrf
								<input type="number" min="1" max="5" value="1" class="form-control w-20" name="week">
								<input type="month" class="form-control mx-2" name="month">
								<button type="submit">Tìm</button>
							</form>
						</div>
					</div>
					<div class="customer-table mt-3">
						<table class="table text-center">
							<thead class="thead-light">
								<tr>
									<th>
										Ngày
									</th>
									<th>
										Khối lượng sau khấu trừ
									</th>

									<th>
										Tiền giao dịch
									</th>
									<th>
										Dư nợ
									</th>
									<th>
										Chi tiết
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $sum_t = 0; $sum_p = 0; $sum_pp =0; ?>
								@foreach($model as $m)
								<tr>
									<?php 
										$sum_t+=$m['t']; 
										$sum_p+=$m['p']; 
										$sum_pp+=$m['pp']; 
									?>
									<td>
										{{date('d/m/Y',strtotime($m['created_at']))}}
									</td>
									<td>{{$m['t']}} kg</td>
									<td>{{number_format($m['p'])}} đ</td>
									<td>{{number_format($m['pp'])}} đ</td>
									<td><a href="{{route('report.day',['d'=>date('d-m-Y',strtotime($m['created_at']))])}}">View</a></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">
										Tổng
									</td>

									<td>{{$sum_t}} kg</td>
									<td>{{number_format($sum_p)}} đ</td>
									<td>{{number_format($sum_pp)}} đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="get-info">
						<!-- <button class="btn btn-primary">Xuất ra excel</button> -->
					</div>
				</div>
			</main>
		</section>
@endif
@endsection
