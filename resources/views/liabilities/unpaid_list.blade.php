@extends('master-layout')
@section('title','Danh sách công nợ')
@section('content')
<section id="loan-control-customer" class="home-page">
			
	<main class="right-content list-customer-content">
		
		<div class="container mt-5">
			<div class="list-customer-loan-header mt-4 d-flex justify-content-between">
				<h3>Công nợ của nông hộ X - thôn X</h3>
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
								Mã đơn
							</th>
							<th>
								Ngày
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
							<th>
								Lựa chọn
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order_list as $row)
							<tr>
								<td>{{ $row->id }}</td>
								<td>{{ $row->created_at->format('d/m/Y') }}</td>
								<td>13/8/2020</td>
								<td>4000 kg</span></td>
								<td>20.000.000 đ</td>
								<td>11.500.000 đ</td>
								<td><input type="checkbox" name="" id="" ></td>
								<td><a href="">View</a></td>
							</tr>
						@endforeach
						{{-- <tr>
							<td>#f487583</td>
							<td>13/8/2020</td>
							<td>4000 kg</span></td>
							<td>20.000.000 đ</td>
							<td>11.500.000 đ</td>
							<td><a href="loan_customer_pay.html">View</a></td>
							<td><input type="checkbox" name="" id="" ></td>
						</tr> --}}
						
						
					</tbody>
					<tfoot class="tfoot-light">
						<tr>
							<td class="font-weight-bold">Tổng</td>
							<td>-</td>
							<td>12.000kg</td>
							<td>50.000.000 đ</td>
							<td>30.000.000 đ</td>
							<td>-</td>
							<td>-</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- pay many order same time -->
			<!-- payment section -->
			<div class="pay-order mt-2 d-flex justify-content-end">
				<button
					class="btn btn-primary"
					data-toggle="modal"
					data-target="#order-loan-payment"
					type="button"
				>
					Thanh toán đơn đã chọn
				</button>
				<div
					class="modal fade text-dark"
					id="order-loan-payment"
					role="dialog"
				>
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
										Tổng nợ các đơn đã chọn :
										<span class="order-value"> 20.000.000 đ</span>
									</div>
								
									<input
										type="submit"
										class="btn btn-success d-block m-auto"
										value="Xác nhận thanh toán"
									/>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</section>
@endsection
