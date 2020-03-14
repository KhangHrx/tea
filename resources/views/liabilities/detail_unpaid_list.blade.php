@extends('master-layout')
@section('title','Danh sách')
@section('content')
<section id="paid-order-admin" class="order home-page">
			<main class="right-content">
				<div class="container pt-4">
					<!-- change order top -->
					<h4 class="py-3">Thanh toán đơn hàng</h4>
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
								{{ empty($order->customer_id) ? $order->name : $order->orderCustomer->name}}
								</span>
							</div>
							@if(empty($order->customer_id))
								<div class="py-2">
									Số điện thoại:
									<span class="customer-phone-number">
										{{ $order->phone }}
									{{ empty($order->customer->phone) ? $order->phone : $order->orderCustomer->phone }}
									</span>
								</div>
								@else
								<div class="py-2">
									Số điện thoại:
									<span class="customer-phone-number">
										{{ $order->orderCustomer->phone }}
									</span>
								</div>
							@endif
							@if(empty($order->customer_id))
								<div class="">
									Địa chỉ:
									<span class="customer-phone-number">
										{{ $order->address }}
									</span>
								</div>
								@else
								<div class="">
									Địa chỉ:
									<span class="customer-phone-number">
										{{ $order->orderCustomer->address }}
									</span>
								</div>
							@endif
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
										Khối lượng(kg)
									</th>
									<th>
										Khấu trừ(%)
									</th>
									<th>
										Khấu trừ(kg)
									</th>
									<th>
										Khối lượng sau khấu trừ(kg)
									</th>
									<th>
										Đơn giá (Đ)
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
									<td>{{ $product->weight }}</td>
									<td>{{ $product->deduction_per }}</td>
									<td>{{ $product->deduction_kg }}</td>
									<td>{{ $product->weight - ($product->weight * $product->deduction_per / 100) - $product->deduction_kg }}</td>
									<td>{{ number_format($product->orderDetail->price).' '.'đ' }}</td>
									<td>{{ $product->note }}</td>
									<td>{{ number_format($product->price).' '.'đ' }}</td>
								</tr>
							@endforeach
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>{{ $weightfirst }}</td>
									<td>-</td>
									<td>-</td>
									<td>{{ $weightlast }}</td>
									<td>-</td>
									<td>-</td>
									<td>{{ number_format($total).' '.'đ' }}</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- order footer -->
					<div class="order-footer">
						<div class="pay-order mt-2">
							<button class="btn btn-primary" data-toggle="modal" data-target="#order-loan-payment" type="button" >
								Thanh toán nợ
							</button>
							<div class="modal fade text-dark" id="order-loan-payment" role="dialog" >
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Thanh toán nợ</h4>
											<button type="button" data-dismiss="modal">
												&times;
											</button>
										</div>
										<div class="modal-body">
											<form action="">
												<div class="form-group">
													Tổng giá trị đơn :
													<span class="order-value"> 20.000.000 đ</span>
												</div>
												<div class="form-group d-block">
													Còn nợ : <span class="order-loan">10.000.000 đ</span>
												</div>
												<div class="form-group">
													<label for="tea-paid-money">Tiền thanh toán : </label>
													<input type="text" id="tea-loan-money" class="form-control" />
												</div>
												<input type="submit" lass="btn btn-success d-block m-auto" value="Xác nhận thanh toán" />
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal" >
												Đóng
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</section>
@endsection