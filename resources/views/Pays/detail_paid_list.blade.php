@extends('master-layout')
@section('title','Chi tiết đơn hàng')
@section('content')
<section id="paid-order-admin" class="order home-page">
			<main class="right-content">
				<div class="container pt-4">
					<!-- change order top -->
					<h4 class="py-3">Chi tiết đơn hàng</h4>
					<!-- order header -->
					<div class="order-header d-flex justify-content-between">
						<div class="order-header-left">
							<p class="btn btn-danger">
								Mã đơn số : <span class="order-code">#{{ $order->id }}</span>
							</p>
						</div>
						<!-- info customer -->
						<div class="order-header-right customer-info">
							<div>
								Tên nông hộ :
								<span class="customer-name">
								{{ $order->orderCustomer->name}}
								</span>
							</div>
							
							<div class="py-2">
								Số điện thoại:
								<span class="customer-phone-number">
									{{ $order->orderCustomer->phone }}
								</span>
							</div>
						
							<div class="">
								Địa chỉ:
								<span class="customer-phone-number">
									{{ $order->orderCustomer->address }}
								</span>
							</div>
							
						</div>
					</div>
					<!-- order body -->
					<div class="create-order-body mt-3 bg-light">
						<table class="table text-center">
							<thead>
								<tr>
									<th>
										Tên loại chè
									</th>
									<th>
										Khối lượng<br>(kg)
									</th>
									<th>
										Khấu trừ<br>(%)
									</th>
									<th>
										Khấu trừ<br>(kg)
									</th>
									<th>
										Khối lượng sau khấu trừ<br>(kg)
									</th>
									<th>
										Đơn giá<br>(Đ)
									</th>
									<th>
										Ghi chú
									</th>
									<th>
										Thành tiền
									</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach($toproduct as $product)
								<tr>
									<td>{{ $product->orderDetail->name }}</td>
									<td>{{ $product->weight }} kg</td>
									<td>{{ $product->deduction_per }} %</td>
									<td>{{ $product->deduction_kg }} kg</td>
									<td>{{ $product->weight - ($product->weight * $product->deduction_per / 100) - $product->deduction_kg }} kg</td>
									<td>{{ number_format($product->orderDetail->price).' '.'đ' }}</td>
									<td>{{ $product->note }}</td>
									<td>{{ number_format($product->price).' '.'đ' }}</td>
								</tr>
							@endforeach
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td class="font-weight-bold">{{ $weightfirst }} kg</td>
									<td>-</td>
									<td>-</td>
									<td class="font-weight-bold">{{ $weightlast }} kg</td>
									<td>-</td>
									<td>-</td>
									<td class="font-weight-bold">{{ number_format($totalPrice).' '.'đ' }}</td>
								</tr>
								
							</tfoot>
							
						</table>
					</div>
				</div>
			</main>
		</section>
@endsection