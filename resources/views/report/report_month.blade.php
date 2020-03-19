@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="report-month" class="home-page">
			
			<main class="right-content list-customer-content">
				
				<!-- table info section -->
				<div class="container mt-3">
					<div class="list-customer-header pt-3 d-flex justify-content-between">
						<h3>Báo cáo thống kê tháng {{date('m/Y',strtotime($time))}}</h3>
						<form action="" class="form-inline" method="post">
							@csrf
							<input type="month" name="month" placeholder="Tháng" class="form-control mx-2">
							<button type="submit" class="btn btn-secondary btn btn-primary">Tìm</button>
						</form>
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
								<?php $sum_t = $sum_p = $sum_pp = 0; ?>
								@foreach($model as $m)
								<?php
									$sum_t+=$m['t'];
									$sum_p+=$m['p'];
									$sum_pp+=$m['pp'];
								?>
								<tr>
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

									<td>{{$sum_t}}kg</td>
									<td>{{number_format($sum_p)}}đ</td>
									<td>{{number_format($sum_pp)}}đ</td>
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
@endsection
