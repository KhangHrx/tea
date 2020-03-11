@extends('master-layout')
@section('title','Trang chủ')
@section('content')
<section id="list-type-tea" class="home-page">
	<aside class="left-content">
		<nav class="navbar bg-navbar ">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.html">Danh sách khách hàng</a>
				</li>
				<li class="nav-item">
					<a class="nav-link current" href="list_type_tea.html"
						>Danh sách loại chè</a
					>
				</li>
				<li class="dropdown nav-link">
					<a type="button" class="dropdown-toggle" data-toggle="dropdown"
						>Kiểm soát công nợ</a
					>
					<div class="dropdown-menu bg-navbar">
						<a class="dropdown-item" href="loan_control_main_ad.html">Chưa thanh toán</a>
						<a class="dropdown-item" href="loan_control_main_ad.html">Đã thanh toán</a>
					</div>
				</li>
				<li class="dropdown nav-link">
					<a type="button" class="dropdown-toggle" data-toggle="dropdown">
						Báo cáo
					</a>
					<div class="dropdown-menu bg-navbar">
						<a class="dropdown-item" href="report_day.html">Báo cáo ngày</a>
						<a class="dropdown-item" href="report_week.html"
							>Báo cáo tuần</a
						>
						<a class="dropdown-item" href="report_month.html"
							>Báo cáo tháng</a
						>
						<a class="dropdown-item" href="report_year.html">Báo cáo năm</a>
					</div>
				</li>
			</ul>
		</nav>
	</aside>
	<main class="right-content list-tea-content">
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

		<!-- table info section -->
		<div class="container text-center mt-5">
			<div class="order-header d-flex justify-content-between">
			<h3 class="list-tea-header text-left py-2">
				Danh sách các loại chè có sẵn
			</h3>
			<!-- add new tea type -->
			<!-- add new customer section -->
			<div class="add-new-customer">
				<button
					class="btn btn-primary"
					data-toggle="modal"
					data-target="#add-new-tea-type"
					type="button"
				>
					Tạo mới <i class="fas fa-plus"></i>
				</button>
				<!-- modal -->
				<div class="modal fade" id="add-new-tea-type" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Thêm mới loại chè</h4>
								<button type="button" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="" class="form-group-add-new-tea">
									<div class="form-group">
										<input
											type="text"
											class="form-control"
											placeholder="Tên loại chè"
										/>
									</div>
									<div class="form-group">
										<input
											type="text"
											class="form-control"
											placeholder="Khấu trừ tối đa"
										/>
									</div>
									<div class="form-group">
										<input
											type="text"
											class="form-control"
											placeholder="Đơn giá"
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
			<table class="table">
				<thead>
					<tr>
						<th>Các loại chè</th>
						<th>Đơn giá (vnđ/kg)</th>
						<th>Khấu trừ tối đa(%)</th>
						<th>Ngày áp dụng giá</th>
						<th>Chỉnh sửa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Chè búp 1</td>
						<td>100.000đ</td>
						<td>35%</td>
						<td>03/08/2020</td>
						<td>
							<div class="container d-inline">
								<button
									class="change-btn"
									type="button"
									data-toggle="modal"
									data-target="#change-tea-type"
								>
									<i class="fas fa-edit text-primary"></i>
								</button>
								<!-- Modal -->
								<div
									class="modal fade text-left"
									id="change-tea-type"
									role="dialog"
								>
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">
													Thay đổi thông tin loại chè
												</h4>
											</div>
											<div class="modal-body">
												<form action="">
													<div class="form-group">
														<input
															type="text"
															class="form-control"
															placeholder="Giá chỉnh sửa"
														/>
													</div>
													<div class="form-group">
														<input
															type="text"
															class="form-control"
															placeholder="Khấu trừ tối đa"
														/>
													</div>

													<div class="form-group">
														<label for="date-apply">Ngày áp dụng</label>
														<input
															id="date-apply"
															type="datetime-local"
															class="form-control"
														/>
													</div>
													<input
														type="submit"
														value="Chỉnh sửa"
														class="btn btn-primary"
													/>
												</form>
											</div>
											<div class="modal-footer">
												<button
													type="button"
													class="btn btn-default"
													data-dismiss="modal"
												>
													Hủy
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
						<!--  -->
					</tr>
					
				</tbody>
			</table>
		</div>
	</main>
</section>
@endsection
