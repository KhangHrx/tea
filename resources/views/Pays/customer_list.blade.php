@extends('master-layout')
@section('title','Danh sách đơn hàng')
@section('content')
<section id="loan-control-main" class="home-page">
			
	<main class="right-content list-customer-content">
		<!-- user info section -->
	
		<div class="container mt-5">
			<div class="list-customer-loan-header mt-4 d-flex justify-content-between">
				<h3>Danh sách đơn hàng</h3>
				<input
					type="text"
					class="search-box search-box-list-customer"
					id=""
					placeholder="Tìm kiếm..."
				/>
			</div>
			<!-- table info section -->
			<div class="customer-table pt-3">
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
								Tổng khối lượng
							</th>
							<th>
								Tổng Tiền
							</th>
							<th>
								Thanh toán
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
						@if($order->toArray() != [])
							@foreach($order as $value)
							<tr>
								<td>{{ $value->orderCustomer->name }}</td>
								<td>{{ $value->orderCustomer->address }}</td>
								<td>{{ $value->sum_weight }} kg</td>
								<td>{{ number_format($value->sum_money) }} đ</td>
								<td class="text-success">{{ number_format($value->sum_money - $value->sum_money_paid) }} đ</td>
								<td class="text-danger">{{ number_format($value->sum_money_paid) }} đ</td>
								<td><a href="{{route('pays.unpaid_list',['id'=>$value->orderCustomer->id])}}">View</a></td>
							</tr>
							@endforeach
						@else
						<tr>
							<td>
								<div style="margin: 50px;">
									<span style="color: red; font-weight: bold">Thông báo :</span>
									<span>Không có đơn hàng nào chưa thanh toán!</span>
								</div>
							</td>
						</tr>
						@endif
					</tbody>
					<tfoot class="tfoot-light">
						<tr>
							<td class="font-weight-bold">Tổng</td>
							<td>-</td>
							<td>{{ $totalWeight }} đ</td>
							<td>{{ number_format($totalMoney) }} kg</td>
							<td class="text-success font-weight-bold">{{ number_format($totalMoney - $totalMoneyPaid) }} đ</td>
							<td class="text-danger font-weight-bold">{{ number_format($totalMoneyPaid) }} đ</td>
							<td>-</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- add new customer section -->
		</div>
	</main>
</section>
@endsection
