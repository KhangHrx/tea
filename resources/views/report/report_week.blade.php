@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="home-page-admin" class="home-page">
			<main class="right-content list-customer-content">
				

				<!-- table info section -->
				<div class="container mt-4">
					<div class="list-customer-header pt-3 d-flex justify-content-between">
						<h3>Báo cáo thống kê tuần 1/2/2020</h3>
						<div>
							<form action="" class="form-inline">
								<input type="text" placeholder="Tuần" class="form-control w-20">
								<input type="text" placeholder="Tháng" class="form-control mx-2">
								<input type="submit" value="Tìm kiếm" class="form-control btn btn-secondary">
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
								<tr>
									<td>
										3/5/2020
									</td>
									<td>300 kg</td>
									<td>100.000.000 đ</td>
									<td>30.000.000 đ</td>
									<td><a href="report_time_day.html">View</a></td>
								</tr>
								
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">
										Tổng
									</td>

									<td>300kg</td>
									<td>500.000.000đ</td>
									<td>300.000.000đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="get-info">
						<button class="btn btn-primary">Xuất ra excel</button>
					</div>
				</div>
			</main>
		</section>
@endsection
