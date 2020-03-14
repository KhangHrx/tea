@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="pay-order" class="order home-page">
			
			<main class="right-content">
				<div class="container pt-4">
					<!-- order header -->
					<div class="order-header d-flex justify-content-between">
						<div class="order-header-left">
							<p class="btn btn-danger">
								Mã đơn số : <span class="order-code">#f847574</span>
							</p>
							<div class="order-date pb-1">
								Ngày : <span class="date-order">12/2/2020</span>
							</div>
						</div>
						<!-- info customer -->
						<div class="order-header-right customer-info">
							<div class="customer-name">Tên nông hộ : Trần Đại Nghĩa</div>
							<div class="customer-phone-number py-2">
								Số điện thoại: 0726828733
							</div>
							<div class="customer-address">Địa chỉ : Thôn A - Yên Bái</div>
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
								<tr>
									<td>
										Chè thái nguyên
									</td>
									<td>300kg</td>
									<td>5%</td>
                  <td>10kg</td>
                  <td>270kg</td>
									<td>300.000đ</td>
									<td>Đất, nước, sỏi</td>
									<td>20.000.000đ</td>
								</tr>
								
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>200kg</td>
									<td>-</td>
                  <td>30kg</td>
                  <td>270kg</td>
									<td>-</td>
									<td>-</td>
									<td>60.000.000đ</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- order footer -->
					<!-- payment status -->
					<div class="d-flex payment-status justify-content-between">
						<div class="employee-info">
							Nhân viên thu mua : <span class="employee-name">Trần Văn Tú</span>
						</div>
						<div>
							<p class="text-medium text-success">
								Đã thanh toán : <span class="paid-money">20.000.000 đ</span>
							</p>
							<p class="text-medium text-danger">
								Còn nợ : <span class="loan-money">40.000.000 đ</span>
							</p>
						</div>
					</div>
				</div>
			</main>
		</section>
@endsection
