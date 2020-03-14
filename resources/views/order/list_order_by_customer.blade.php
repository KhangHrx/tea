@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="customer-detail-page" class="home-page">
			
			<main class="right-content list-details-order-customer">
				<!-- user info section -->
				<div class="user-wrap">
					<div class="user-info">
						
					</div>
				</div>
				<div class="container mt-3">
					<div class="list-customer-order-details mt-3 d-flex">
						<h3>
							<span class="customer-name">Nông hộ: {{$model[0]->orderCustomer->name}} </span> <br>
							<span class="customer-address">Địa chỉ: {{$model[0]->orderCustomer->address}}</span> <br>
							<span class="customer-address">Điện thoại: {{$model[0]->orderCustomer->phone}}</span>
						</h3>

						<div class="form-group">
							<input
								class="search-box search-box-list-order"
								placeholder="Tìm kiếm..."
							/>
						</div>
					</div>
					<!-- list order table -->
					<div class="list-order-table mt-3">
						<table class="table text-center">
							<thead class="thead-light">
								<tr>
									<th>
										Mã đơn
									</th>
									<th>
										Ngày giao dịch
									</th>
									<th>
										Tổng khối lượng
									</th>
									<th>
										Thành tiền
									</th>
									<th>
										Còn nợ
									</th>
									<th>
										Chi tiết
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$total_weight = 0;
									$total_money = 0;
									$total_money_paid = 0;
								?>
								@foreach($model as $m)
								<?php
								$total_weight+=$m['total_weight']; 
								$total_money+=$m['total_money'];
								$total_money_paid+=($m['total_money']-$m['total_money_paid']);
								?>
								<tr>
									<td>
										{{$m['id']}}
									</td>
									<td>{{date('d/m/Y',strtotime($m['created_at']))}}</td>
									<td>{{$m['total_weight']}}<span class="mass-digit">kg</span></td>
									<td>{{number_format($m['total_money'])}}đ</td>
									<td class="text-danger">{{number_format($m['total_money']-$m['total_money_paid'])}}đ</td>
									<td><a href="customer_order.html">View</a></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>-</td>
									<td>{{$total_weight}}kg</td>
									<td>{{number_format($total_money)}}đ</td>
									<td class="text-danger">{{number_format($total_money_paid)}}đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</main>
		</section>
		@endsection
