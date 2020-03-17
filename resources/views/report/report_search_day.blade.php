@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="report-day" class="home-page">
			
			<main class="right-content list-customer-content">
				<!-- table info section -->
				<div class="container pt-4">
					<div class="list-customer-header mt-4 d-flex justify-content-between">
						<h3 >Báo cáo thống kê ngày {{date('d/m/Y',strtotime($date))}}</h3>
						<form action="{{route('report.search.day')}}" class="form-inline" method="post">
							@csrf
							<div class="form-group form-inline">
								<label for="" class="mr-2">Ngày </label>
								<input type="date" name="date" class="form-control" style="width:70%" value="{{$date}}">
							</div>
							<input type="submit" class="btn btn-secondary" value="Tìm kiếm">
						</form>
						
					</div>
					@if($model->count()==0)
					<div class="container">
						<div class="alert alert-danger mt-4">Không có kết quả tìm kiếm phù hợp</div>
					</div>
					@else
					<div class="customer-table mt-3">
						<table class="table text-center">
							<thead class="thead-light">
								<tr>
									<th>
										Nông hộ
									</th>
									<th>
										Địa chỉ
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
							<?php
								$sum_weight = 0;
								$sum_money = 0;
								$sum_money_paid = 0;
							?>
							@foreach($model as $m)
							<?php
								$sum_weight+=$m->t;
								$sum_money+=$m->p;
								$sum_money_paid+=$m->pp;
							?>
							<tr>
								<td>
									{{$m->orderCustomer->name}}
								</td>
								<td>{{$m->orderCustomer->address}}</td>
								<td>{{$m->t}} kg</td>
								<td>{{number_format($m->p)}}đ</td>
								<td>{{number_format($m->pp)}}đ</td>
								<td><a href="{{route('order.list_by_customer_today',['id'=>$m->customer_id])}}">View</a></td>
							</tr>
							@endforeach	
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">
										Tổng
									</td>
									<td>-</td>
									<td>{{$sum_weight}}kg</td>
									<td>{{number_format($sum_money)}}đ</td>
									<td>{{number_format($sum_money_paid)}}đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
					@endif
					<div class="get-info">
						<!-- <button class="btn btn-primary">Xuất ra excel</button> -->
					</div>
				</div>
			</main>
		</section>
@endsection
