@extends('master-layout')
@section('title','Chi tiết khách hàng')
@section('content')
<section id="customer-detail-page" class="home-page">
			
			<main class="right-content list-details-order-customer">
				<!-- user info section -->
				<div class="user-wrap">
					<div class="user-info">
						<a type="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fas fa-user-shield"></i> Admin</a
						>
						<div class="dropdown-menu">
							<div>
								<i class="fas fa-phone-alt"></i>
								<span class="admin-phone-number"> 0946284647</span>
							</div>
							<div class="py-1">
								Quản trị viên
							</div>
							<a href="signin.html">Đăng xuất</a>
						</div>
					</div>
				</div>
				<div class="container mt-3">
					<div class="list-customer-order-details mt-3 d-flex">
						<h3>
							<span class="customer-name">Danh sách đơn - Nông hộ A </span>-
							<span class="customer-address"> Thôn A</span>
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
										Khối lượng
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
								<tr>
									<td>
										#f475834
									</td>
									<td>3/9/2020</td>
									<td>200<span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td class="text-danger">10.000.000đ</td>
									<td><a href="order_paid_ad.html">View</a></td>
								</tr>
								<tr>
									<td>
										#f753363
									</td>
									<td>3/9/2020</td>
									<td>200<span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td class="text-danger">10.000.000đ</td>
									<td><a href="order_paid_ad.html">View</a></td>
								</tr>
								<tr>
									<td>
										#f753363
									</td>
									<td>3/9/2020</td>
									<td>200<span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td class="text-danger">10.000.000đ</td>
									<td><a href="order_paid_ad.html">View</a></td>
								</tr>
								<tr>
									<td>
										#f753363
									</td>
									<td>3/9/2020</td>
									<td>200<span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td class="text-danger">10.000.000đ</td>
									<td><a href="order_paid_ad.html">View</a></td>
								</tr>
								<tr>
									<td>
										#f753363
									</td>
									<td>3/9/2020</td>
									<td>200<span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td class="text-danger">10.000.000đ</td>
									<td><a href="order_paid_ad.html">View</a></td>
								</tr>
								<tr>
									<td>
										#f753363
									</td>
									<td>3/9/2020</td>
									<td>200<span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td class="text-danger">10.000.000đ</td>
									<td><a href="order_paid_ad.html">View</a></td>
								</tr>
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>-</td>
									<td>500kg</td>
									<td>120.000.000đ</td>
									<td class="text-danger">60.000.000đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</main>
		</section>
		@endsection