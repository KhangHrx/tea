@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="pay-order" class="order home-page">
			
			<main class="right-content">
				<div class="container pt-4">
					@if(session('message'))
					<div class="alert alert-danger">{{session('message')}}</div>
					@endif
					<!-- order header -->
					<div class="order-header d-flex justify-content-between">
						<div class="order-header-left">
							<p class="btn btn-danger">
								Mã đơn số : <span class="order-code">{{$model['id']}}</span>
							</p>
							<div class="order-date pb-1">
								Ngày : <span class="date-order">{{date('d/m/Y',strtotime($model['created_at']))}}</span>
							</div>
						</div>
						<!-- info customer -->
						<div class="order-header-right customer-info">
							<div class="customer-name">Tên nông hộ : <?php echo $model['customer_id']?($model->orderCustomer->name):($model['name']); ?></div>
							<div class="customer-phone-number py-2">
								Số điện thoại: <?php echo $model['customer_id']?($model->orderCustomer->phone):($model['phone']); ?>
							</div>
							<div class="customer-address">Địa chỉ : <?php echo $model['customer_id']?($model->orderCustomer->address):($model['address']); ?></div>
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
										Khối lượng
									</th>
									<th>
										Khấu trừ(%)
									</th>
									<th>
										Khấu trừ(kg)
                  </th>
                  <th>
										Khối lượng sau khấu trừ
									</th>
									<th>
										Đơn giá
									</th>
									<th>
										Ghi chú
									</th>
									<th>
										Thành tiền
									</th>
								</tr>
							</thead>
							<tbody>
							<?php $t=0;$d=0; ?>
							@foreach($model->orderdetail as $m)
								<tr>
									<td>
										{{$m->orderDetail->name}}
									</td>
									<td>{{($m['weight'])}}kg</td>
									<td>{{$m['deduction_per']}}%</td>
									<td>{{$m['deduction_kg']}}kg</td>
									<td>{{($m['weight_last'])}}kg</td>
									<td>{{number_format($m->orderDetail->price)}}đ</td>
									<td>{{$m['other']}}</td>
									<td>{{number_format($m['price'])}}đ</td>
								</tr>
								<?php $t+=$m['weight']; $d+=$m['deduction_kg']; ?>
							@endforeach
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>{{$t}}kg</td>
									<td>-</td>
									<td>{{$d}}kg</td>
									<td>{{$model['total_weight']}}kg</td>
									<td>-</td>
									<td>-</td>
									<td>{{number_format($model['total_money'])}}đ</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- order footer -->
					<!-- payment status -->
					<div class="d-flex payment-status justify-content-between">
						<div class="text-success font-weight-bold"><?php echo ($model['status']==0)?"Đơn chưa chuyển cho kế toán":"Đơn đã chuyển cho kế toán" ?></div>
						<div>
							<p class="text-medium text-success">
								Đã thanh toán : <span class="paid-money">{{number_format($model['total_money']-$model['total_money_paid'])}} đ</span>
							</p>
							<p class="text-medium text-danger">
								Còn nợ : <span class="loan-money">{{number_format($model['total_money_paid'])}} đ</span>
							</p>
						</div>
					</div>
				</div>
			</main>
		</section>
@endsection
