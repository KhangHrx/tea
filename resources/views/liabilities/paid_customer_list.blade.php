@extends('master-layout')
@section('title','Danh sách công nợ')
@section('content')
<section id="loan-control-main" class="home-page">
			
	<main class="right-content list-customer-content">
		<!-- user info section -->
	
		<div class="container mt-5">
			<div class="list-customer-loan-header mt-4 d-flex justify-content-between">
				<h3>Danh sách công nợ đã thanh toán</h3>
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
							<td><a href="{{route('liabilities.paid_List',['id'=>$value->orderCustomer->id])}}">View</a></td>
						</tr>
						@endforeach
						
						{{-- @php
							$t = 0;
						@endphp
						@foreach($modal as $row)
							@php
								$t += $row->total_money;
							@endphp
							
						@endforeach
						{{ $t }} --}}
					</tbody>
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
				</table>
			</div>
			<!-- add new customer section -->
		</div>
	</main>
</section>
@endsection