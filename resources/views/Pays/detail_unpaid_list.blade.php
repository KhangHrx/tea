@extends('master-layout')
@section('title','Danh sách chi tiết đơn hàng')
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
									<td>{{ $weightfirst }} kg</td>
									<td>-</td>
									<td>-</td>
									<td>{{ $weightlast }} kg</td>
									<td>-</td>
									<td>-</td>
									<td>{{ number_format($totalPrice).' '.'đ' }}</td>
								</tr>
								<tr>
									<td class="font-weight-bold">Đã thanh toán: </td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td class="text-success font-weight-bold">{{ number_format($totalPay).' '.'đ' }}</td>
								</tr>
								<tr>
									<td class="font-weight-bold">Số tiền còn nợ: </td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td class="text-danger font-weight-bold">{{ number_format($totalPrice-$totalPay).' '.'đ' }}</td>
								</tr>
							</tfoot>
							
						</table>
					</div>
					<!-- order footer -->
					<div class="order-footer">
						<form method="post" action="{{route('pays.pay_unpaid',['id' => $order->id])}}" id="" enctype="multipart/form-data">
						@csrf
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
														<span class="order-value font-weight-bold"> {{ number_format($totalPrice).' '.'đ' }}</span>
													</div>
													<div class="form-group d-block">
														Còn nợ : <span class="order-loan font-weight-bold text-danger">{{ number_format($totalPrice-$totalPay).' '.'đ' }}</span>
													</div>
													<div class="form-group">
														<label for="tea-paid-money">Tiền thanh toán : </label>
														<input type="text" id="tea-loan-money" name="pay" class="form-control" />
													</div>
													@if ($errors->has('pay'))
														<div class="alert alert-danger">
															{{ $errors->first('pay') }}
														</div>
													@endif
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
						</form>
					</div>
				</div>
			</main>
		</section>
@endsection