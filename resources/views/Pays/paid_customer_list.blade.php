@extends('master-layout')
@section('title','Danh sách đơn hàng')
@section('content')
<section id="loan-control-main" class="home-page">
			
	<main class="right-content list-customer-content">
		<!-- user info section -->
	
		<div class="container mt-5">
			<div class="list-customer-loan-header mt-4 d-flex justify-content-between">
				<h3>Danh sách đơn hàng đã thanh toán</h3>
				<form method="get">
					<input
					  type="search"
					  placeholder="Tìm kiếm ..."
					  class="search-box"
					  name="search"
					/>
					<button type="submit" class="btn btn-primary">Tìm kiếm</button>
				</form>
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
								Thành tiền
							</th>
							<th>
								Trạng thái
							</th>
							<th>
								Chi tiết
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order as $value)
						<tr>
							{{-- {{ dd($value) }} --}}
							<td>{{ $value->orderCustomer->name }}</td>
							<td>{{ $value->orderCustomer->address }}</td>
							<td>{{ number_format($value->sum_weight) }} kg</td>
							<td>{{ number_format($value->sum_money) }} đ</td>
							<td class="text-success">
								@if($value->total_money_paid == 0)
									Đã thanh toán
								@endif
							</td>
							<td><a href="{{route('pays.paid_List',['id'=>$value->orderCustomer->id])}}">View</a></td>
						</tr>
						@endforeach
					</tbody>
					@if (!$searching)
						<tfoot class="tfoot-light">
							<tr>
								<td class="font-weight-bold">Tổng</td>
								<td>-</td>
								<td class="font-weight-bold">{{ number_format($totalWeight) }} kg</td>
								<td class="font-weight-bold">{{ number_format($totalMoney - $totalMoneyPaid) }} đ</td>
								<td>-</td>
								<td>-</td>
							</tr>
						</tfoot>
					@endif
				</table>
			</div>
			<!-- add new customer section -->
		</div>
	</main>
</section>
@endsection
