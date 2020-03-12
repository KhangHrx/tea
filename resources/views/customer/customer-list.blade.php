@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="home-page-admin" class="home-page">
			
			<main class="right-content list-customer-content">
				
				<!-- table info section -->
				<div class="container mt-5">
					<div class="list-customer-header mt-4 d-flex">
						<h3>Danh sách nông hộ</h3>
						<input
							type="text"
							class="search-box search-box-list-customer"
							id=""
							placeholder="Tìm kiếm..."
						/>					
					</div>
					<div class="new-customer">
						<a href="customer_order_new.html" class="btn btn-primary">
							Tạo mới <i class="fas fa-plus"></i></a>
					</div>
					<div class="customer-table mt-3">
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
										Số điện thoại
									</th>
									<th>
										Tổng khối lượng
									</th>
									<th>
										Thành tiền
									</th>
									<th>
										Chi tiết
									</th>
									<th>

									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Nông hộ A
									</td>
									<td>Thôn A</td>
									<td>0837462632</td>
									<td>4000 <span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td><a href="customer_order_detail.html">View</a></td>
									<td><a href="order_add_by_customer.html" class="btn btn-success">Giao dịch mới
										 <i class="fas fa-plus"></i></a></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- add new customer section -->
					<div class="add-new-customer">
						<button
							class="btn btn-primary"
							data-toggle="modal"
							data-target="#add-customer"
							type="button"
						>
							Thêm khách hàng
						</button>
						<!-- modal -->
						<div class="modal fade" id="add-customer" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Thêm mới khách hàng</h4>
										<button type="button" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<form action="" class="form-group-add-customer">
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Tên nông hộ"
												/>
											</div>
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Địa chỉ"
												/>
											</div>
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Số điện thoại"
												/>
											</div>
											<input
												type="submit"
												class="btn btn-success d-block m-auto"
												value="Xác nhận"
											/>
										</form>
									</div>
									<div class="modal-footer">
										<button
											type="button"
											class="btn btn-secondary"
											data-dismiss="modal"
										>
											Đóng
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</section>
@endsection
