@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="home-page-admin" class="home-page">	
			<main class="right-content list-customer-content">
				
				<!-- table info section -->
				<div class="container mt-3">
					<div class="list-customer-header pt-3 d-flex justify-content-between">
						<h3>Báo cáo thống kê năm <span class="year-report">{{date('Y',strtotime($time))}}</span></h3>
						<form action="" class="form-inline" method="post">
							@csrf
							<input type="text" class="form-control mx-2" name="year">
							<button type="submit" class="btn btn-primary">Tìm</button>
						</form>
					</div>
					<div class="customer-table mt-3">
						<table class="table text-center">
							<thead class="thead-light">
								<tr>
									<th>
										Tháng
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
								@foreach($model as $m)
								<tr>
									<td>
										1
									</td>

									<td>300 kg</td>
									<td>100.000.000 đ</td>
									<td>30.000.000 đ</td>
									<td><a href="report_time_month.html">View</a></td>
								</tr>
								@endforeach
							</tbody>

							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">
										Tổng
									</td>

									<td>2.500kg</td>
									<td>500.000.000đ</td>
									<td>300.000.000đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
					
				</div>
			</main>
		</section>
@endsection
