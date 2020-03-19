@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="report-year" class="home-page">	
			<main class="right-content list-customer-content">
				
				<!-- table info section -->
				<div class="container mt-3">
					<div class="list-customer-header pt-3 d-flex justify-content-between">
						<h3>Báo cáo thống kê năm <span class="year-report">{{date('Y',strtotime($time))}}</span></h3>
						<form action="" class="form-inline" method="post" onsubmit="return searchSubmit()">
							@csrf
							<input type="number" class="form-control mx-2" name="year" id="year" <?php echo (isset($yearBack))?"value='$yearBack'":"" ?>>
							<button type="submit" class="btn btn-secondary">Tìm</button>
							<div class="text-danger mt-2 ml-2" id="yearMessage"></div>
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
								<?php $sum_t=$sum_p=$sum_pp=0; ?>
								@foreach($model as $m)
								<?php
									$sum_t+=$m['t'];
									$sum_p+=$m['p'];
									$sum_pp+=$m['pp'];
								?>
								<tr>
									<td>
										{{date('m/Y',strtotime($m['created_at']))}}
									</td>

									<td>{{$m['t']}} kg</td>
									<td>{{number_format($m['p'])}} đ</td>
									<td>{{number_format($m['pp'])}} đ</td>
									<td><a href="{{route('report.by_month',['m'=>date('m-Y',strtotime($m['created_at']))])}}">View</a></td>
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
					
				</div>
			</main>
		</section>
@endsection

@section('script')
<script>
	function searchSubmit(){
		var year = $('#year').val();
		$('#yearMessage').text("");
		var reg = /^\d{4}$/;
		if(year != "" && !reg.test(year)){
			$('#yearMessage').text("Năm nhập vào không hợp lệ");
			return false;
		}
	}
</script>
@endsection
